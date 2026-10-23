import { WINES } from '../data/wines';
import { el, type View } from '../dom';
import { decodeObservation, hasObservations, rankWines } from '../scoring';
import { WINE_TYPE_LABELS } from '../traits';
import type { MatchResult, WineType } from '../types';
import { traitChip, worldBadge } from './profile';

const TOP_N = 5;

function scoreBar(percent: number): HTMLElement {
  const fill = el('span', { class: 'bar-fill' });
  fill.style.width = `${percent}%`;
  return el(
    'span',
    { class: 'bar', role: 'meter', 'aria-valuemin': 0, 'aria-valuemax': 100, 'aria-valuenow': percent, 'aria-label': 'Match' },
    fill,
  );
}

function resultCard(type: WineType, result: MatchResult, rank: number, query: string): HTMLElement {
  const { wine } = result;
  return el(
    'li',
    { class: `result ${rank === 1 ? 'result-top' : ''}`.trim() },
    el(
      'div',
      { class: 'result-head' },
      el('span', { class: 'rank', 'aria-label': `Rank ${rank}` }, `#${rank}`),
      el(
        'div',
        { class: 'result-title' },
        el('h2', {}, el('a', { href: `#/wine/${type}/${wine.id}?from=${encodeURIComponent(query)}` }, wine.varietal)),
        el('p', { class: 'region' }, wine.region, ' ', worldBadge(wine)),
      ),
      el('div', { class: 'result-score' }, el('strong', {}, `${result.percent}%`), el('span', { class: 'muted' }, `${result.score} / ${result.maxScore} pts`)),
    ),
    scoreBar(result.percent),
    el(
      'details',
      { open: rank === 1 },
      el('summary', {}, 'Why this match?'),
      el('h3', {}, `Shares ${result.matched.length}`),
      result.matched.length
        ? el('ul', { class: 'chips' }, result.matched.map((m) => traitChip(type, m.trait, m.profile, m.profile === m.observed ? 'chip-exact' : '')))
        : el('p', { class: 'muted' }, 'Nothing in common.'),
      el('h3', {}, `Lacks ${result.missing.length}`),
      result.missing.length
        ? el('ul', { class: 'chips' }, result.missing.map((m) => traitChip(type, m.trait, m.observed, 'chip-missing')))
        : el('p', { class: 'muted' }, 'Nothing you observed is missing.'),
    ),
  );
}

export function resultsView(type: WineType, query: string): View {
  const observed = decodeObservation(type, query);
  const title = `${WINE_TYPE_LABELS[type]} wine matches | Wine Guesser`;

  if (!hasObservations(observed)) {
    return {
      title,
      content: el(
        'section',
        {},
        el('h1', { tabindex: -1 }, 'No observations'),
        el('p', {}, 'There is nothing to match yet. ', el('a', { href: `#/guess/${type}` }, 'Fill in the tasting grid'), '.'),
      ),
    };
  }

  const ranked = rankWines(observed, WINES[type]).slice(0, TOP_N);
  const yourNotes = Object.entries(observed).filter(([, v]) => v > 0);

  return {
    title,
    content: el(
      'section',
      { class: 'results' },
      el('h1', { tabindex: -1 }, 'Closest varietal matches'),
      el(
        'details',
        { class: 'your-notes' },
        el('summary', {}, `Your notes (${yourNotes.length})`),
        el('ul', { class: 'chips' }, yourNotes.map(([trait, value]) => traitChip(type, trait, value))),
      ),
      el('ol', { class: 'result-list' }, ranked.map((r, i) => resultCard(type, r, i + 1, query))),
      el(
        'div',
        { class: 'form-actions' },
        el('a', { class: 'button primary', href: `#/guess/${type}?${query}` }, 'Edit observations'),
        el('a', { class: 'button', href: `#/guess/${type}` }, 'Start over'),
      ),
    ),
  };
}
