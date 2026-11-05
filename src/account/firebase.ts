// Talks to the Deductive Wine Taster mobile app's Firebase project through its REST APIs, so the
// account deletion page needs no Firebase SDK. Deletion mirrors the app's Profile > Delete Account:
// the user's database records first (the database only lets a signed-in user remove their own
// records), then the account itself.

// Firebase web API keys identify the project; they are not secrets. Access is enforced by
// Firebase Auth and the database rules. This is the project's browser key, restricted to
// www.wineguesser.com referrers, so the page fails when served from anywhere else (including
// localhost) unless that origin is added to the key's allowed referrers.
const API_KEY = 'AIzaSyBqXTyIYHW9tusCZmb42qsXm2tQwhmTdhw';
const AUTH_URL = 'https://identitytoolkit.googleapis.com/v1/accounts';
const DATABASE_URL = 'https://deductive-wine-taster.firebaseio.com';

/** Origins the deletion page must be allowed to connect to (used for its Content-Security-Policy). */
export const FIREBASE_ORIGINS = [new URL(AUTH_URL).origin, DATABASE_URL];

export interface Session {
  userId: string;
  idToken: string;
  email: string;
}

/** An error whose message is safe to show to the person using the page. */
export class AccountError extends Error {}

const AUTH_MESSAGES: Record<string, string> = {
  INVALID_LOGIN_CREDENTIALS: 'That email and password do not match an account.',
  EMAIL_NOT_FOUND: 'That email and password do not match an account.',
  INVALID_PASSWORD: 'That email and password do not match an account.',
  INVALID_EMAIL: 'Enter a valid email address.',
  MISSING_PASSWORD: 'Enter your password.',
  USER_DISABLED: 'This account has been disabled.',
  TOO_MANY_ATTEMPTS_TRY_LATER: 'Too many attempts. Wait a few minutes and try again.',
};

const GENERIC_MESSAGE = 'Something went wrong. Check your connection and try again.';

/** Maps a Firebase Auth error code (e.g. "TOO_MANY_ATTEMPTS_TRY_LATER : ...") to a readable message. */
export function authErrorMessage(code: string | undefined): string {
  const key = code?.split(/[\s:]/)[0] ?? '';
  return AUTH_MESSAGES[key] ?? GENERIC_MESSAGE;
}

async function request(fetcher: typeof fetch, url: string, init: RequestInit): Promise<unknown> {
  let response: Response;
  try {
    response = await fetcher(url, init);
  } catch {
    throw new AccountError(GENERIC_MESSAGE);
  }
  const body: unknown = await response.json().catch(() => null);
  if (!response.ok) {
    const code = (body as { error?: { message?: string } } | null)?.error?.message;
    throw new AccountError(authErrorMessage(code));
  }
  return body;
}

function authRequest(fetcher: typeof fetch, method: string, payload: object): Promise<unknown> {
  return request(fetcher, `${AUTH_URL}:${method}?key=${API_KEY}`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload),
  });
}

export async function signIn(email: string, password: string, fetcher: typeof fetch = fetch): Promise<Session> {
  const body = (await authRequest(fetcher, 'signInWithPassword', { email, password, returnSecureToken: true })) as {
    localId?: string;
    idToken?: string;
    email?: string;
  };
  if (!body.localId || !body.idToken) throw new AccountError(GENERIC_MESSAGE);
  return { userId: body.localId, idToken: body.idToken, email: body.email ?? email };
}

// Per-user records: tasting history, and the email-verification flag the original Android app
// kept under users/{uid}.
const USER_DATA_PATHS = ['conclusions', 'users'];

/** Permanently deletes the signed-in user's database records, then their account. */
export async function deleteAccount(session: Session, fetcher: typeof fetch = fetch): Promise<void> {
  const auth = encodeURIComponent(session.idToken);
  for (const path of USER_DATA_PATHS) {
    await request(fetcher, `${DATABASE_URL}/${path}/${encodeURIComponent(session.userId)}.json?auth=${auth}`, {
      method: 'DELETE',
    });
  }
  await authRequest(fetcher, 'delete', { idToken: session.idToken });
}

/** Sends Firebase's password reset email. Firebase does not reveal whether the address has an account. */
export async function sendPasswordReset(email: string, fetcher: typeof fetch = fetch): Promise<void> {
  try {
    await authRequest(fetcher, 'sendOobCode', { requestType: 'PASSWORD_RESET', email });
  } catch (error) {
    // Unknown addresses are reported as success so the page cannot be used to find accounts.
    if (error instanceof AccountError && error.message === AUTH_MESSAGES.EMAIL_NOT_FOUND) return;
    throw error;
  }
}
