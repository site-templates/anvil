@props([
    'heading' => 'The questions procurement asks.',
    'items' => [],
])
<!--
    Disclosures on the mist band. Native details and summary elements, so they
    open without script and remain readable when JavaScript never arrives.
    Questions come from resources/data/collections/faq.json.
-->
<section class="bg-mist px-6 py-20 sm:px-8 sm:py-28 lg:py-32">
    <div class="mx-auto grid max-w-[88rem] gap-x-6 gap-y-10 lg:grid-cols-[5fr_7fr]">

        <h2 class="display-section max-w-[14ch] text-balance text-ink" data-reveal>{{ $heading }}</h2>

        <div data-reveal>
            @foreach ($items as $item)
            <details class="border-t border-line last:border-b">
                <summary class="flex cursor-pointer items-start justify-between gap-6 py-6 text-lg/7 font-medium text-ink sm:text-xl/8">
                    {{ $item->question }}
                    <svg viewBox="0 0 16 16" class="disclosure-mark size-4 h-lh shrink-0 fill-ink" aria-hidden="true">
                        <path d="M8.75 3.25a.75.75 0 0 0-1.5 0v4h-4a.75.75 0 0 0 0 1.5h4v4a.75.75 0 0 0 1.5 0v-4h4a.75.75 0 0 0 0-1.5h-4v-4Z"/>
                    </svg>
                </summary>
                <div class="disclosure">
                    <div>
                        <p class="max-w-[70ch] pb-6 text-base/7 text-pretty text-muted">{{ $item->answer }}</p>
                    </div>
                </div>
            </details>
            @endforeach
        </div>
    </div>
</section>
