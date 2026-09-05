@props([
    'heading' => 'Three things it does, and nothing it does not.',
    'items' => [],
])
<!--
    The capability set. Three entries in a description list, each with a mark
    drawn from the same flat block language as the header logo — no cards, no
    containers, just the mark, the term and the detail. Entries come from
    resources/data/collections/capabilities.json.
-->
<section class="on-block bg-block pb-4 text-invert" data-dark>
    <div class="mx-auto max-w-[88rem] px-6 pt-20 pb-24 sm:px-8 sm:pt-28 sm:pb-32">

        <h2 class="display-section max-w-[20ch] text-balance" data-reveal>{{ $heading }}</h2>

        <dl class="stagger mt-16 grid gap-x-6 gap-y-14 sm:grid-cols-3" data-reveal>
            @foreach ($items as $item)
            <div>
                @if ($item->mark == 'read')
                <svg viewBox="0 0 64 64" class="h-14 w-16" aria-hidden="true">
                    <rect class="fill-mint" x="0" y="6" width="52" height="9"/>
                    <rect class="fill-invert" x="0" y="24" width="64" height="9"/>
                    <rect class="fill-invert" x="0" y="42" width="38" height="9"/>
                </svg>
                @elseif ($item->mark == 'decide')
                <svg viewBox="0 0 64 64" class="h-14 w-16" aria-hidden="true">
                    <rect class="fill-invert" x="0" y="24" width="22" height="9"/>
                    <path class="fill-invert" d="M22 24h10l10-16h8v9h-3l-9 16H22z"/>
                    <path class="fill-mint" d="M22 33h10l10 16h8v-9h-3l-9-16H22z"/>
                    <rect class="fill-invert" x="52" y="4" width="12" height="12"/>
                    <rect class="fill-mint" x="52" y="46" width="12" height="12"/>
                </svg>
                @else
                <svg viewBox="0 0 64 64" class="h-14 w-16" aria-hidden="true">
                    <path class="fill-invert" d="M6 4h52v14H16z"/>
                    <path class="fill-invert" d="M22 22h20l6 20H16z"/>
                    <rect class="fill-volt" x="0" y="50" width="64" height="8"/>
                </svg>
                @endif

                <dt class="display-block mt-8">{{ $item->title }}</dt>
                <dd class="mt-4 max-w-[42ch] text-base/7 text-pretty text-smoke">{{ $item->body }}</dd>
            </div>
            @endforeach
        </dl>
    </div>
</section>
