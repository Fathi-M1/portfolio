import { Link, useNavigate } from "react-router-dom";
import { colors, radius, shadows } from "../../styles/tokens";

function BudMark() {
  return (
    <div className="flex items-center justify-center gap-2">
      <span aria-hidden style={{ color: colors.primary }}>
        <svg className="w-9 h-9" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2c-1.5 0-2.8.4-3.9 1.1A4.5 4.5 0 005 3.5C3.5 3.5 2 5 2 7v1c0 3.5 3 7 4 8s2.5 2 6 2 5-1 6-2 4-4.5 4-8V7c0-2-1.5-3.5-3-3.5-.6 0-1.2.2-1.7.6A6.3 6.3 0 0012 2zm-1 5.5c.8 0 1.5.7 1.5 1.5S11.8 10.5 11 10.5 9.5 9.8 9.5 9s.7-1.5 1.5-1.5zm3 0c.8 0 1.5.7 1.5 1.5S15.8 10.5 15 10.5 13.5 9.8 13.5 9s.7-1.5 1.5-1.5z" />
        </svg>
      </span>
      <span
        className="font-headline text-3xl font-extrabold tracking-tight"
        style={{ color: colors.onSurface }}
      >
        Bud
      </span>
    </div>
  );
}

export function SignUpPage() {
  const navigate = useNavigate();

  return (
    <div
      className="h-full min-h-0 overflow-y-auto px-5 pt-10 pb-10"
      style={{ background: colors.background }}
    >
      <div className="mx-auto w-full" style={{ maxWidth: 430 }}>
        <div className="text-center">
          <BudMark />
          <h1
            className="mt-8 font-headline text-[28px] leading-tight font-extrabold"
            style={{ color: colors.onSurface }}
          >
            Create your account
          </h1>
        </div>

        <form
          className="mt-7 space-y-3"
          onSubmit={(e) => {
            e.preventDefault();
            navigate("/onboarding");
          }}
        >
          <label className="block">
            <span
              className="block mb-1 font-body text-sm font-semibold"
              style={{ color: colors.onSurface }}
            >
              Full name
            </span>
            <input
              type="text"
              name="fullName"
              autoComplete="name"
              required
              className="w-full font-body px-4 py-3 outline-none"
              style={{
                background: colors.surfaceContainerHighest,
                borderRadius: radius.xl,
                color: colors.onSurface,
              }}
              placeholder="Jane Doe"
            />
          </label>

          <label className="block">
            <span
              className="block mb-1 font-body text-sm font-semibold"
              style={{ color: colors.onSurface }}
            >
              Email
            </span>
            <input
              type="email"
              name="email"
              autoComplete="email"
              required
              className="w-full font-body px-4 py-3 outline-none"
              style={{
                background: colors.surfaceContainerHighest,
                borderRadius: radius.xl,
                color: colors.onSurface,
              }}
              placeholder="you@example.com"
            />
          </label>

          <label className="block">
            <span
              className="block mb-1 font-body text-sm font-semibold"
              style={{ color: colors.onSurface }}
            >
              Password
            </span>
            <input
              type="password"
              name="password"
              autoComplete="new-password"
              required
              className="w-full font-body px-4 py-3 outline-none"
              style={{
                background: colors.surfaceContainerHighest,
                borderRadius: radius.xl,
                color: colors.onSurface,
              }}
              placeholder="••••••••"
            />
          </label>

          <label className="block">
            <span
              className="block mb-1 font-body text-sm font-semibold"
              style={{ color: colors.onSurface }}
            >
              Confirm password
            </span>
            <input
              type="password"
              name="confirmPassword"
              autoComplete="new-password"
              required
              className="w-full font-body px-4 py-3 outline-none"
              style={{
                background: colors.surfaceContainerHighest,
                borderRadius: radius.xl,
                color: colors.onSurface,
              }}
              placeholder="••••••••"
            />
          </label>

          <button
            type="submit"
            className="w-full font-headline font-extrabold py-3"
            style={{
              background: colors.primary,
              color: colors.onPrimary,
              borderRadius: radius.full,
              boxShadow: shadows.card,
            }}
          >
            Create Account
          </button>
        </form>

        <div className="mt-6">
          <div
            className="rounded-full px-4 py-2 text-center font-body text-sm font-semibold"
            style={{
              background: colors.surfaceContainerLow,
              color: colors.onSurfaceVariant,
            }}
          >
            or
          </div>
        </div>

        <button
          type="button"
          className="mt-4 w-full font-body font-semibold py-3 flex items-center justify-center gap-2"
          style={{
            background: colors.surfaceCard,
            color: colors.onSurface,
            borderRadius: radius.full,
            boxShadow: shadows.card,
          }}
          onClick={() => window.alert("Google sign-up (demo).")}
        >
          <svg
            width="18"
            height="18"
            viewBox="0 0 48 48"
            aria-hidden
          >
            <path
              fill="#FFC107"
              d="M43.611 20.083H42V20H24v8h11.303C33.974 32.658 29.403 36 24 36c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.968 3.032l5.657-5.657C34.058 6.053 29.256 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.651-.389-3.917z"
            />
            <path
              fill="#FF3D00"
              d="M6.306 14.691l6.571 4.819C14.655 16.108 19.001 12 24 12c3.059 0 5.842 1.154 7.968 3.032l5.657-5.657C34.058 6.053 29.256 4 24 4 16.318 4 9.656 8.337 6.306 14.691z"
            />
            <path
              fill="#4CAF50"
              d="M24 44c5.155 0 9.86-1.977 13.409-5.197l-6.19-5.238C29.211 35.091 26.715 36 24 36c-5.383 0-9.941-3.316-11.282-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"
            />
            <path
              fill="#1976D2"
              d="M43.611 20.083H42V20H24v8h11.303a12.06 12.06 0 01-4.084 5.565l.003-.002 6.19 5.238C36.973 39.179 44 34 44 24c0-1.341-.138-2.651-.389-3.917z"
            />
          </svg>
          Continue with Google
        </button>

        <div
          className="mt-7 text-center font-body text-sm"
          style={{ color: colors.onSurfaceVariant }}
        >
          Already have an account?{" "}
          <Link
            to="/auth/sign-in"
            className="font-semibold"
            style={{ color: colors.tertiary }}
          >
            Sign in
          </Link>
        </div>
      </div>
    </div>
  );
}

