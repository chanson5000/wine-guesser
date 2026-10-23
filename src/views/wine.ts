import { findWine, WINES } from '../data/wines';
import { el, type View } from '../dom';
import { WINE_TYPE_LABELS } from '../traits';
import { WINE_TYPES, type WineType } from '../types';
import { profileText, profileTraits, worldBadge } from './profile';

export function wineView(type: WineType, id: string, query: string): View {
  const wine = findWine(type, id);
  if (!wine) return notFoundView();

  const from = new URLSearchParams(query).get('from');
  const back =
    from !== null
      ? el('a', { href: `#/results/${type}?${from}` }, '← Back to matches')
      : el('a', { href: `#/wines/${type}` }, `← All ${WINE_TYPE_LABELS[type].toLowerCase()} varietals`);

  return {
    title: `${wine.varietal} (${wine.region}) | Wine Guesser`,
    content: el(
      'article',
      { class: 'wine-profile' },
      el('p', { class: 'back' }, back),
      el('h1', { tabindex: -1 }, wine.varietal),
      el('p', { class: 'region' }, wine.region, ' ', worldBadge(wine)),
      profileTraits(type, wine),
      profileText(wine),
    ),
  };
}

export function browseView(type: WineType): View {
  return {
    title: `${WINE_TYPE_LABELS[type]} varietals | Wine Guesser`,
    content: el(
      'section',
      { class: 'browse' },
      el('h1', { tabindex: -1 }, 'Varietal profiles'),
      el(
        'nav',
        { class: 'tabs', 'aria-label': 'Wine type' },
        WINE_TYPES.map((t) =>
          el('a', { href: `#/wines/${t}`, 'aria-current': t === type ? 'page' : false }, WINE_TYPE_LABELS[t]),
        ),
      ),
      el(
        'ul',
        { class: 'wine-list' },
        [...WINES[type]]
          .sort((a, b) => a.varietal.localeCompare(b.varietal) || a.region.localeCompare(b.region))
          .map((w) =>
            el(
              'li',
              {},
              el('a', { href: `#/wine/${type}/${w.id}` }, el('strong', {}, w.varietal), el('span', { class: 'region' }, w.region)),
              worldBadge(w),
            ),
          ),
      ),
    ),
  };
}

export function notFoundView(): View {
  return {
    title: 'Not found | Wine Guesser',
    content: el(
      'section',
      {},
      el('h1', { tabindex: -1 }, 'Page not found'),
      el('p', {}, el('a', { href: '#/' }, 'Return to Wine Guesser'), '.'),
    ),
  };
}
