import { el, type View } from '../dom';

export function aboutView(): View {
  return {
    title: 'About Wine Guesser',
    content: el(
      'section',
      { class: 'prose' },
      el('h1', { tabindex: -1 }, 'What is Wine Guesser?'),
      el('p', {}, 'Wine Guesser is a practice tool for anyone working on their blind tasting.'),
      el(
        'p',
        {},
        'It uses the varietals and tasting criteria from the ',
        el('a', { href: 'https://www.mastersommeliers.org/', target: '_blank', rel: 'noopener noreferrer' }, 'Court of Master Sommeliers'),
        ' Certified Sommelier examination. While blind tasting, enter what you observe and see which classic profiles your notes point to, and why.',
      ),
      el('h2', {}, 'How matching works'),
      el(
        'p',
        {},
        'Every observation you mark Yes or Key is compared with each profile. An exact match scores 2 points, a Yes against a Key (or the reverse) scores 1, and a trait the profile does not have costs 1. Anything you leave at No or Unsure is ignored. The percentage is your score out of the best possible score for your notes.',
      ),
      el('h2', {}, 'Choosing wines to practice with'),
      el(
        'p',
        {},
        'Not every bottle is a textbook example. Wines in the $20–$30 range from the classic regions are the most likely to fit these profiles. The exam lists show which grapes and regions to look for:',
      ),
      el(
        'ul',
        {},
        el('li', {}, el('a', { href: 'files/Examinable_Red_Wines.pdf', target: '_blank' }, 'Examinable red wines (PDF)')),
        el('li', {}, el('a', { href: 'files/Examinable_White_Wines.pdf', target: '_blank' }, 'Examinable white wines (PDF)')),
      ),
    ),
  };
}
