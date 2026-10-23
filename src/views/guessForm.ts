import { el, type View } from '../dom';
import { decodeObservation, encodeObservation, hasObservations, observationToTraits } from '../scoring';
import { SECTIONS, WINE_TYPE_LABELS, type Section, type TraitGroup } from '../traits';
import type { Traits, WineType } from '../types';

const SCALE = [
  { value: 0, label: 'No' },
  { value: 1, label: 'Yes' },
  { value: 2, label: 'Key' },
] as const;

const UNSURE = '';

function singleGroup(group: TraitGroup, prefill: Traits, showLabel: boolean): HTMLElement {
  const selected = group.options.find((o) => prefill[o.id])?.id ?? UNSURE;
  const choices = [{ id: UNSURE, label: 'Unsure' }, ...group.options];
  return el(
    'div',
    { class: 'choice-row', role: 'radiogroup', 'aria-label': group.label },
    showLabel && el('span', { class: 'row-label', 'aria-hidden': 'true' }, group.label),
    el(
      'div',
      { class: 'segmented' },
      choices.map((choice) => {
        const id = `${group.id}-${choice.id || 'unsure'}`;
        return el(
          'span',
          { class: 'segment' },
          el('input', { type: 'radio', name: group.id, id, value: choice.id, checked: choice.id === selected }),
          el('label', { for: id }, choice.label),
        );
      }),
    ),
  );
}

function pickSection(section: Section, prefill: Traits): HTMLElement[] {
  const max = section.max ?? Infinity;
  const hintId = `${section.id}-hint`;
  return section.groups.map((group) => {
    const boxes = group.options.map((o) =>
      el('input', { type: 'checkbox', name: o.id, id: o.id, value: 1, checked: prefill[o.id] === 1, 'aria-describedby': hintId }),
    );
    const sync = () => {
      const full = boxes.filter((b) => b.checked).length >= max;
      for (const b of boxes) b.disabled = full && !b.checked;
    };
    const row = el(
      'div',
      { class: 'segmented wrap', onchange: sync },
      group.options.map((o, i) => el('span', { class: 'segment' }, boxes[i], el('label', { for: o.id }, o.label))),
    );
    row.addEventListener('reset-sync', sync);
    sync();
    return row;
  });
}

function scaleGroup(group: TraitGroup, prefill: Traits): HTMLElement {
  return el(
    'div',
    { class: 'scale' },
    group.options.map((o) =>
      el(
        'div',
        { class: 'scale-row', role: 'radiogroup', 'aria-labelledby': `${o.id}-label` },
        el('span', { class: 'scale-label', id: `${o.id}-label` }, o.label),
        SCALE.map((s) => {
          const id = `${o.id}-${s.value}`;
          return el(
            'span',
            { class: 'scale-cell' },
            el('input', { type: 'radio', name: o.id, id, value: s.value, checked: (prefill[o.id] ?? 0) === s.value }),
            el('label', { for: id }, el('span', { class: 'visually-hidden' }, `${o.label}: `), s.label),
          );
        }),
      ),
    ),
  );
}

function sectionFieldset(section: Section, prefill: Traits): HTMLElement {
  let body: HTMLElement[];
  let hint: string | undefined;
  switch (section.kind) {
    case 'single':
      body = section.groups.map((g) => singleGroup(g, prefill, section.groups.length > 1));
      break;
    case 'pick':
      body = pickSection(section, prefill);
      hint = `Select up to ${section.max}.`;
      break;
    case 'scale':
      body = section.groups.map((g) => scaleGroup(g, prefill));
      hint = 'Key marks a defining characteristic.';
      break;
  }
  return el(
    'fieldset',
    { class: `section section-${section.kind}` },
    el('legend', {}, section.title),
    hint && el('p', { class: 'hint', id: `${section.id}-hint` }, hint),
    body,
  );
}

function readForm(form: HTMLFormElement, type: WineType): Traits {
  const raw: Record<string, unknown> = {};
  const singleGroups = new Set(
    SECTIONS[type].filter((s) => s.kind === 'single').flatMap((s) => s.groups.map((g) => g.id)),
  );
  for (const [name, value] of new FormData(form)) {
    if (typeof value !== 'string') continue;
    if (singleGroups.has(name)) {
      if (value !== UNSURE) raw[value] = 1;
    } else {
      raw[name] = value;
    }
  }
  return observationToTraits(type, raw);
}

export function guessFormView(type: WineType, query: string): View {
  const prefill = decodeObservation(type, query);
  const error = el('p', { class: 'form-error', role: 'alert' });

  const form = el(
    'form',
    { class: 'guess-form', novalidate: true },
    SECTIONS[type].map((s) => sectionFieldset(s, prefill)),
    error,
    el(
      'div',
      { class: 'form-actions' },
      el('button', { type: 'submit', class: 'button primary' }, 'Guess the wine'),
      el('button', { type: 'reset', class: 'button' }, 'Clear'),
    ),
  );

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const observed = readForm(form, type);
    if (!hasObservations(observed)) {
      error.textContent = 'Mark at least one characteristic before guessing.';
      return;
    }
    location.hash = `#/results/${type}?${encodeObservation(observed)}`;
  });

  form.addEventListener('reset', () => {
    error.textContent = '';
    // Defaults are restored after the event, so re-sync the pick limits on the next tick.
    setTimeout(() => {
      for (const row of form.querySelectorAll('.segmented.wrap')) row.dispatchEvent(new Event('reset-sync'));
    });
  });

  const other: WineType = type === 'red' ? 'white' : 'red';
  return {
    title: `${WINE_TYPE_LABELS[type]} wine | Wine Guesser`,
    content: el(
      'section',
      { class: `guess guess-${type}` },
      el('h1', { tabindex: -1 }, `${WINE_TYPE_LABELS[type]} wine characteristics`),
      el('p', { class: 'lede' }, 'Mark what you observe. Leave anything you are unsure of; it will not count for or against a match.'),
      form,
      el(
        'p',
        { class: 'secondary-links' },
        `Did you mean to guess a `,
        el('a', { href: `#/guess/${other}` }, `${WINE_TYPE_LABELS[other].toLowerCase()} wine`),
        '?',
      ),
    ),
  };
}
