import { el, type View } from '../dom';

export function homeView(): View {
  return {
    title: 'Wine Guesser',
    content: el(
      'section',
      { class: 'home' },
      el('h1', { tabindex: -1 }, 'Guess a wine'),
      el(
        'p',
        { class: 'lede' },
        'Work through the deductive tasting grid, record what you see, smell and taste, and Wine Guesser will rank the classic varietals that best fit your notes.',
      ),
      el(
        'div',
        { class: 'type-choice' },
        el('a', { class: 'type-button type-red', href: '#/guess/red' }, 'Red'),
        el('a', { class: 'type-button type-white', href: '#/guess/white' }, 'White'),
      ),
      el(
        'p',
        { class: 'secondary-links' },
        'Or browse the ',
        el('a', { href: '#/wines/red' }, 'red'),
        ' and ',
        el('a', { href: '#/wines/white' }, 'white'),
        ' varietal profiles.',
      ),
    ),
  };
}
