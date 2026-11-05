import { describe, expect, it, vi } from 'vitest';
import { AccountError, authErrorMessage, deleteAccount, sendPasswordReset, signIn } from '../src/account/firebase';

const json = (status: number, body: unknown) =>
  new Response(JSON.stringify(body), { status, headers: { 'Content-Type': 'application/json' } });

const authError = (message: string) => json(400, { error: { code: 400, message } });

const session = { userId: 'uid/1', idToken: 'token&x', email: 'a@example.com' };

describe('signIn', () => {
  it('returns the session from a successful sign in', async () => {
    const fetcher = vi.fn().mockResolvedValue(json(200, { localId: 'u1', idToken: 't1', email: 'a@example.com' }));
    await expect(signIn('a@example.com', 'pw', fetcher)).resolves.toEqual({
      userId: 'u1',
      idToken: 't1',
      email: 'a@example.com',
    });
    const [url, init] = fetcher.mock.calls[0] as [string, RequestInit];
    expect(url).toContain('accounts:signInWithPassword?key=');
    expect(JSON.parse(init.body as string)).toEqual({ email: 'a@example.com', password: 'pw', returnSecureToken: true });
  });

  it('gives the same message for an unknown email and a wrong password', async () => {
    for (const code of ['EMAIL_NOT_FOUND', 'INVALID_PASSWORD', 'INVALID_LOGIN_CREDENTIALS']) {
      const fetcher = vi.fn().mockResolvedValue(authError(code));
      await expect(signIn('a@example.com', 'pw', fetcher)).rejects.toThrow('That email and password do not match an account.');
    }
  });

  it('reports network failures as an AccountError', async () => {
    const fetcher = vi.fn().mockRejectedValue(new TypeError('Failed to fetch'));
    await expect(signIn('a@example.com', 'pw', fetcher)).rejects.toBeInstanceOf(AccountError);
  });
});

describe('deleteAccount', () => {
  it('deletes the tasting history and user record before the account', async () => {
    const fetcher = vi
      .fn()
      .mockResolvedValueOnce(json(200, null))
      .mockResolvedValueOnce(json(200, null))
      .mockResolvedValueOnce(json(200, {}));
    await deleteAccount(session, fetcher);
    const calls = fetcher.mock.calls as [string, RequestInit][];
    expect(calls).toHaveLength(3);
    expect(calls[0]?.[0]).toBe('https://deductive-wine-taster.firebaseio.com/conclusions/uid%2F1.json?auth=token%26x');
    expect(calls[0]?.[1].method).toBe('DELETE');
    expect(calls[1]?.[0]).toBe('https://deductive-wine-taster.firebaseio.com/users/uid%2F1.json?auth=token%26x');
    expect(calls[1]?.[1].method).toBe('DELETE');
    expect(calls[2]?.[0]).toContain('accounts:delete?key=');
    expect(JSON.parse(calls[2]?.[1].body as string)).toEqual({ idToken: 'token&x' });
  });

  it('keeps the account if the history cannot be deleted', async () => {
    const fetcher = vi.fn().mockResolvedValue(json(401, { error: 'Permission denied' }));
    await expect(deleteAccount(session, fetcher)).rejects.toBeInstanceOf(AccountError);
    expect(fetcher).toHaveBeenCalledTimes(1);
  });
});

describe('sendPasswordReset', () => {
  it('does not reveal whether an address has an account', async () => {
    const fetcher = vi.fn().mockResolvedValue(authError('EMAIL_NOT_FOUND'));
    await expect(sendPasswordReset('nobody@example.com', fetcher)).resolves.toBeUndefined();
  });

  it('still reports rate limiting', async () => {
    const fetcher = vi.fn().mockResolvedValue(authError('TOO_MANY_ATTEMPTS_TRY_LATER : Try again later.'));
    await expect(sendPasswordReset('a@example.com', fetcher)).rejects.toThrow('Too many attempts');
  });
});

describe('authErrorMessage', () => {
  it('falls back to a generic message', () => {
    expect(authErrorMessage(undefined)).toMatch(/Something went wrong/);
    expect(authErrorMessage('SOMETHING_NEW')).toMatch(/Something went wrong/);
  });
});
