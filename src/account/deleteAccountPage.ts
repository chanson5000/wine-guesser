import '../static.css';
import { el } from '../dom';
import { AccountError, deleteAccount, sendPasswordReset, signIn, type Session } from './firebase';

function messageOf(error: unknown): string {
  return error instanceof AccountError ? error.message : 'Something went wrong. Try again.';
}

/** Disables the form's buttons while `task` runs, and shows any error it throws. */
async function busy(form: HTMLFormElement, error: HTMLElement, task: () => Promise<void>): Promise<void> {
  const buttons = [...form.querySelectorAll('button')];
  for (const b of buttons) b.disabled = true;
  error.textContent = '';
  try {
    await task();
  } catch (e) {
    error.textContent = messageOf(e);
  } finally {
    for (const b of buttons) b.disabled = false;
  }
}

function field(id: string, label: string, input: HTMLInputElement): HTMLElement {
  return el('p', { class: 'field' }, el('label', { for: id }, label), input);
}

function show(root: HTMLElement, ...nodes: HTMLElement[]): void {
  root.replaceChildren(...nodes);
  root.querySelector<HTMLElement>('h2, input')?.focus();
}

function signInStep(root: HTMLElement): void {
  const error = el('p', { class: 'form-error', role: 'alert' });
  const status = el('p', { class: 'form-status', role: 'status' });
  const email = el('input', { id: 'email', name: 'email', type: 'email', autocomplete: 'email', required: true });
  const password = el('input', {
    id: 'password',
    name: 'password',
    type: 'password',
    autocomplete: 'current-password',
    required: true,
  });
  const forgot = el('button', { type: 'button', class: 'button' }, 'Forgot password?');
  const form = el(
    'form',
    { class: 'account-form', novalidate: true },
    el('p', {}, 'Sign in with the email and password you use in the app.'),
    field('email', 'Email', email),
    field('password', 'Password', password),
    error,
    status,
    el(
      'div',
      { class: 'form-actions' },
      el('button', { type: 'submit', class: 'button primary' }, 'Continue'),
      forgot,
    ),
  );

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    status.textContent = '';
    void busy(form, error, async () => {
      if (!email.value.trim() || !password.value) throw new AccountError('Enter your email and password.');
      confirmStep(root, await signIn(email.value.trim(), password.value));
    });
  });

  forgot.addEventListener('click', () => {
    status.textContent = '';
    void busy(form, error, async () => {
      if (!email.checkValidity() || !email.value.trim()) throw new AccountError('Enter your email address first.');
      await sendPasswordReset(email.value.trim());
      status.textContent = `If ${email.value.trim()} has an account, a password reset email is on its way.`;
    });
  });

  show(root, el('h2', { tabindex: -1 }, 'Sign in'), form);
  email.focus();
}

function confirmStep(root: HTMLElement, session: Session): void {
  const error = el('p', { class: 'form-error', role: 'alert' });
  const cancel = el('button', { type: 'button', class: 'button' }, 'Cancel');
  const form = el(
    'form',
    { class: 'account-form' },
    el('p', {}, 'Signed in as ', el('strong', {}, session.email), '.'),
    el('p', {}, 'This permanently deletes your account and all of your saved tasting history. It cannot be undone.'),
    error,
    el(
      'div',
      { class: 'form-actions' },
      el('button', { type: 'submit', class: 'button danger' }, 'Delete my account'),
      cancel,
    ),
  );

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    void busy(form, error, async () => {
      await deleteAccount(session);
      show(
        root,
        el('h2', { tabindex: -1 }, 'Account deleted'),
        el('p', {}, 'Your Deductive Wine Taster account and tasting history have been permanently deleted.'),
      );
    });
  });
  cancel.addEventListener('click', () => signInStep(root));

  show(root, el('h2', { tabindex: -1 }, 'Delete your account?'), form);
}

const root = document.getElementById('delete-account');
// GitHub Pages cannot send frame-ancestors or X-Frame-Options, so refuse to run inside a frame to
// rule out clickjacking the delete button.
if (root && window.top !== window.self) {
  root.replaceChildren(el('p', {}, 'Open this page directly to delete your account.'));
} else if (root) {
  signInStep(root);
}
