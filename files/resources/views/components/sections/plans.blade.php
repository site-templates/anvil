@props([
    'heading' => 'Priced per run, not per seat.',
    'body' => 'A run is one workflow, live in your tenant, with as many people watching it as you like. Add the second when the first has paid for itself.',
    'items' => [],
    'includedLabel' => 'Every plan includes',
    'included' => [],
])
<!--
    Three plans as grid siblings. The recommended one is marked in words and by
    its filled button, never by a different card colour — a coloured card reads
    as a different kind of object rather than a stronger option. Plans come
    from resources/data/collections/tiers.json and the shared list from
    included.json.
-->
<section class="px-6 py-20 sm:px-8 sm:py-28 lg:py-32">
    <div class="mx-auto max-w-[88rem]">

        <div class="grid gap-x-6 gap-y-6 lg:grid-cols-[7fr_5fr] lg:items-end">
            <h2 class="display-section max-w-[16ch] text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="reveal-1 max-w-[48ch] text-base/7 text-pretty text-muted sm:text-lg/8" data-reveal>{{ $body }}</p>
        </div>

        <div class="stagger mt-14 grid gap-6 lg:grid-cols-3" data-reveal>
            @foreach ($items as $tier)
            <div class="flex flex-col justify-between rounded-3xl bg-surface p-8">
                <div>
                    <div class="flex items-baseline justify-between gap-4">
                        <h3 class="heading-alt text-xl text-ink">{{ $tier->name }}</h3>
                        <p class="mono-label text-faint">{{ $tier->badge }}</p>
                    </div>

                    <p class="display-block mt-8 tabular-nums text-ink">{{ $tier->price }}</p>
                    <p class="mono-label mt-2 text-faint">{{ $tier->period }}</p>

                    <p class="mt-6 text-base/7 text-pretty text-muted">{{ $tier->body }}</p>

                    <ul role="list" class="mt-8 flex flex-col gap-4 border-t border-line pt-8">
                        <li class="flex items-start gap-3 text-base/7 text-ink">
                            <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-ink" aria-hidden="true">
                                <path fill-rule="evenodd" d="M13.28 4.22a.75.75 0 0 1 0 1.06l-6.5 6.5a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06L6.25 10.19l5.97-5.97a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $tier->lineOne }}
                        </li>
                        <li class="flex items-start gap-3 text-base/7 text-ink">
                            <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-ink" aria-hidden="true">
                                <path fill-rule="evenodd" d="M13.28 4.22a.75.75 0 0 1 0 1.06l-6.5 6.5a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06L6.25 10.19l5.97-5.97a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $tier->lineTwo }}
                        </li>
                        <li class="flex items-start gap-3 text-base/7 text-ink">
                            <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-ink" aria-hidden="true">
                                <path fill-rule="evenodd" d="M13.28 4.22a.75.75 0 0 1 0 1.06l-6.5 6.5a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06L6.25 10.19l5.97-5.97a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $tier->lineThree }}
                        </li>
                    </ul>
                </div>

                <div class="mt-10" data-emphasis="{{ $tier->emphasis }}">
                    <a href="{{ $tier->ctaLink }}" class="tier-action w-full">{{ $tier->ctaText }}</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-16 border-t border-line pt-10">
            <p class="mono-label text-faint" data-reveal>{{ $includedLabel }}</p>
            <ul role="list" class="mt-6 grid gap-x-6 gap-y-4 sm:grid-cols-2 lg:grid-cols-3" data-reveal>
                @foreach ($included as $item)
                <li class="flex items-start gap-3 text-base/7 text-muted">
                    <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-faint" aria-hidden="true">
                        <path fill-rule="evenodd" d="M13.28 4.22a.75.75 0 0 1 0 1.06l-6.5 6.5a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06L6.25 10.19l5.97-5.97a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                    </svg>
                    {{ $item->text }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
