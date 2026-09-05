@props([
    'heading' => 'Agents that finish the ticket. Not suggest a fix.',
    'body' => 'Anvil runs agents inside the systems your back office already uses. They read the real record, decide against your rules, and execute with a human on the approval.',
    'ctaText' => 'Book a demo',
    'ctaLink' => '/plans',
    'secondaryText' => 'See the work',
    'secondaryLink' => '/use-cases',
    'stageOne' => 'Read',
    'stageTwo' => 'Decide',
    'stageThree' => 'Execute',
    'meta' => 'Live in 14 days · Runs in your tenant · Every action logged',
])
<!--
    The opening. A four-line condensed headline holds the left seven columns;
    the right five carry the mark taken apart — the same anvil that sits in the
    header, cut into the three things the agent actually does. The diagram is
    drawn, not photographed: it is sharp at any size and costs nothing to load.
-->
<section class="px-6 pt-36 pb-20 sm:px-8 sm:pt-44 sm:pb-28">
    <div class="mx-auto grid max-w-[88rem] items-center gap-x-6 gap-y-16 lg:grid-cols-[7fr_5fr]">

        <div>
            <h1 class="display-hero max-w-[16ch] text-balance text-ink" data-reveal>{{ $heading }}</h1>

            <p class="reveal-1 mt-8 max-w-[52ch] text-lg/7 text-pretty text-muted sm:text-xl/8" data-reveal>{{ $body }}</p>

            <div class="reveal-2 mt-10 flex flex-wrap items-center gap-3" data-reveal>
                <a href="{{ $ctaLink }}" class="btn-filled">{{ $ctaText }}</a>
                <a href="{{ $secondaryLink }}" class="btn-outline">{{ $secondaryText }}</a>
            </div>

            <p class="mono-label reveal-3 mt-10 text-faint" data-reveal>{{ $meta }}</p>
        </div>

        <div class="reveal-1" data-reveal>
            <svg viewBox="0 0 560 380" class="w-full" role="img" aria-label="The Anvil mark taken apart into three stages: {{ $stageOne }}, {{ $stageTwo }}, {{ $stageThree }}">
                <path class="fill-ink" fill-rule="evenodd" d="M59 67.1h297v50.6H136Z"/>
                <path class="fill-mint" fill-rule="evenodd" d="M174.5 149.6h132l18.4 70.4H156.1Zm66 22 26 48.4h-52Z"/>
                <path class="fill-ink" fill-rule="evenodd" d="M156.1 251.9h168.8l20.1 77H136Zm58.4 0h52l21.3 39.6h-94.6Z"/>

                <path class="stroke-line" fill="none" stroke-width="1.5" d="M356 92.4h34"/>
                <path class="stroke-line" fill="none" stroke-width="1.5" d="M316.4 184.8h73.6"/>
                <path class="stroke-line" fill="none" stroke-width="1.5" d="M334 290.4h56"/>
                <rect class="fill-volt" x="384" y="284.4" width="12" height="12"/>

                <text class="fill-faint font-mono text-[0.8125rem]" x="402" y="97">01</text>
                <text class="fill-ink font-display text-xl uppercase" x="430" y="99">{{ $stageOne }}</text>

                <text class="fill-faint font-mono text-[0.8125rem]" x="402" y="189.4">02</text>
                <text class="fill-ink font-display text-xl uppercase" x="430" y="191.4">{{ $stageTwo }}</text>

                <text class="fill-faint font-mono text-[0.8125rem]" x="402" y="295">03</text>
                <text class="fill-ink font-display text-xl uppercase" x="430" y="297">{{ $stageThree }}</text>
            </svg>
        </div>

    </div>
</section>
