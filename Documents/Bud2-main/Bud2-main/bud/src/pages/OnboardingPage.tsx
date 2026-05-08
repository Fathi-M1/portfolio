import { Link } from "react-router-dom";
import { colors, radius, shadows } from "../styles/tokens";

export function OnboardingPage() {
  return (
    <div
      className="h-full min-h-0 overflow-y-auto px-5 pt-10 pb-10"
      style={{ background: colors.background }}
    >
      <div className="mx-auto w-full" style={{ maxWidth: 430 }}>
        <h1
          className="font-headline text-[28px] leading-tight font-extrabold"
          style={{ color: colors.onSurface }}
        >
          Onboarding
        </h1>
        <p className="mt-2 font-body" style={{ color: colors.onSurfaceVariant }}>
          This is a placeholder route so sign-up can navigate to{" "}
          <span className="font-semibold" style={{ color: colors.onSurface }}>
            /onboarding
          </span>
          .
        </p>

        <Link
          to="/"
          className="mt-6 inline-flex w-full justify-center font-headline font-extrabold py-3"
          style={{
            background: colors.primary,
            color: colors.onPrimary,
            borderRadius: radius.full,
            boxShadow: shadows.card,
          }}
        >
          Continue to app
        </Link>
      </div>
    </div>
  );
}

