@props([
    'leftHeading' => 'Book a demo',
    'leftBody' => 'Bring one process you dread. We will run it against a sandbox copy of your tenant and show you the ledger.',
    'leftLink' => '/plans',
    'rightHeading' => 'Read the work',
    'rightBody' => 'Five runs written by the engineers who implemented these systems, with the numbers they actually moved.',
    'rightLink' => '/use-cases',
])
<!--
    The close: one full-bleed row cut in half, black against voltage yellow.
    It is the only place on the page where yellow owns a whole surface, which
    is what makes it read as the end of the argument.
-->
<section class="grid sm:grid-cols-2">
    <a href="{{ $leftLink }}" class="on-block group flex min-h-[22rem] flex-col justify-between bg-block px-6 py-12 text-invert sm:px-10 sm:py-16">
        <div class="flex items-start justify-between gap-6">
            <h2 class="display-section max-w-[8ch] text-balance">{{ $leftHeading }}</h2>
            <span class="flex size-14 shrink-0 items-center justify-center rounded-lg border-[1.5px] border-smoke group-hover:border-invert group-hover:bg-invert group-hover:text-ink" aria-hidden="true">
                <svg viewBox="0 0 20 20" class="size-5 fill-current">
                    <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 0 0 1.06 0l7.22-7.22v5.69a.75.75 0 0 0 1.5 0v-7.5a.75.75 0 0 0-.75-.75h-7.5a.75.75 0 0 0 0 1.5h5.69l-7.22 7.22a.75.75 0 0 0 0 1.06Z" clip-rule="evenodd"/>
                </svg>
            </span>
        </div>
        <p class="mt-12 max-w-[42ch] text-base/7 text-pretty text-smoke">{{ $leftBody }}</p>
    </a>

    <a href="{{ $rightLink }}" class="group flex min-h-[22rem] flex-col justify-between bg-volt px-6 py-12 text-accent-ink sm:px-10 sm:py-16">
        <div class="flex items-start justify-between gap-6">
            <h2 class="display-section max-w-[8ch] text-balance">{{ $rightHeading }}</h2>
            <span class="flex size-14 shrink-0 items-center justify-center rounded-lg border-[1.5px] border-ink group-hover:bg-ink group-hover:text-volt" aria-hidden="true">
                <svg viewBox="0 0 20 20" class="size-5 fill-current">
                    <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 0 0 1.06 0l7.22-7.22v5.69a.75.75 0 0 0 1.5 0v-7.5a.75.75 0 0 0-.75-.75h-7.5a.75.75 0 0 0 0 1.5h5.69l-7.22 7.22a.75.75 0 0 0 0 1.06Z" clip-rule="evenodd"/>
                </svg>
            </span>
        </div>
        <p class="mt-12 max-w-[42ch] text-base/7 text-pretty">{{ $rightBody }}</p>
    </a>
</section>
