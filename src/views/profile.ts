import { el } from '../dom';
import { SECTIONS, traitLabel } from '../traits';
import type { TraitValue, Wine, WineType } from '../types';

export function worldBadge(wine: Wine): HTMLElement {
  return el('span', { class: `badge ${wine.newWorld ? 'badge-new' : 'badge-old'}` }, wine.newWorld ? 'New World' : 'Old World');
}

function chip(label: string, value: TraitValue, extraClass = ''): HTMLElement {
  return el(
    'li',
    { class: ['chip', value === 2 && 'chip-key', extraClass].filter(Boolean).join(' ') },
    label,
    value === 2 && el('span', { class: 'chip-tag' }, 'key'),
  );
}

export function traitChip(type: WineType, trait: string, value: TraitValue, extraClass = ''): HTMLElement {
  return chip(traitLabel(type, trait), value, extraClass);
}

/** The profile's characteristics, grouped the same way as the guess form. */
export function profileTraits(type: WineType, wine: Wine): HTMLElement {
  return el(
    'dl',
    { class: 'profile-traits' },
    SECTIONS[type].flatMap((section) =>
      section.groups.flatMap((group) => {
        const present = group.options.filter((o) => wine.traits[o.id]);
        const label = section.groups.length > 1 ? group.label : section.title;
        return [
          el('dt', {}, label),
          el(
            'dd',
            {},
            present.length === 0
              ? el('span', { class: 'muted' }, 'None')
              : el(
                  'ul',
                  { class: 'chips' },
                  present.map((o) => chip(o.label, wine.traits[o.id] ?? 0)),
                ),
          ),
        ];
      }),
    ),
  );
}

export function profileText(wine: Wine): HTMLElement[] {
  return [
    el('h2', {}, 'Description'),
    el('p', {}, wine.description),
    el('h2', {}, 'Notes'),
    el('p', {}, wine.notes),
    el('h2', {}, 'Common confusions'),
    el('p', {}, wine.confusion),
  ];
}
