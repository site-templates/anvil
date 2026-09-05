@props([
    'heading' => 'The library of runs.',
    'body' => 'Every agent starts from a run that already exists — written by the engineers who implemented these systems for twenty years. Pick one, point it at your tenant, watch it work.',
    'linkText' => 'Browse every run',
    'linkUrl' => '/use-cases',
    'items' => [],
])
<!--
    A white block with rounded shoulders, holding a rail of runs that breaks
    the page container and scrolls sideways with snap points. Each card leads
    to its own dynamic page. Entries come from
    resources/data/collections/useCases.json.
-->
<section class="rounded-t-[2.5rem] bg-surface sm:rounded-t-[4rem]">
    <div class="mx-auto max-w-[88rem] px-6 pt-20 sm:px-8 sm:pt-28 lg:pt-32">
        <div class="grid gap-x-6 gap-y-8 lg:grid-cols-[7fr_5fr] lg:items-end">
            <div>
                <h2 class="display-section max-w-[16ch] text-balance text-ink" data-reveal>{{ $heading }}</h2>
                <p class="reveal-1 mt-6 max-w-[56ch] text-base/7 text-pretty text-muted sm:text-lg/8" data-reveal>{{ $body }}</p>
            </div>
            <div class="reveal-2 lg:text-right" data-reveal>
                <a href="{{ $linkUrl }}" class="btn-outline">{{ $linkText }}</a>
            </div>
        </div>
    </div>

    <div data-rail>
        <ul role="list" class="rail mt-14 flex gap-6 overflow-x-auto scroll-pl-6 px-6 sm:scroll-pl-8 sm:px-8">
            @foreach ($items as $item)
            <li class="w-[19rem] shrink-0 sm:w-[23rem]">
            <a href="{{ $item->link }}" data-tone="{{ $item->tone }}" class="group flex h-full flex-col overflow-hidden rounded-3xl bg-canvas">
                <div class="card-head flex aspect-16/9 flex-col justify-between p-6">
                    <p class="mono-label text-muted">{{ $item->system }}</p>
                    <div>
                        <p class="display-block text-ink">{{ $item->metric }}</p>
                        <p class="mono-label mt-1 text-faint">{{ $item->metricWas }}</p>
                    </div>
                </div>

                <div class="flex flex-1 flex-col p-6">
                    <h3 class="heading-alt text-xl text-ink">{{ $item->title }}</h3>
                    <p class="mt-3 text-base/7 text-pretty text-muted">{{ $item->blurb }}</p>
                    <p class="mt-auto pt-8 text-base font-medium text-ink">
                        <span class="border-b-2 border-transparent pb-0.5 group-hover:border-ink">{{ $item->linkText }}</span>
                    </p>
                </div>
            </a>
            </li>
            @endforeach
        </ul>

        <div class="rail-controls mt-10 justify-center gap-3 pb-20 sm:pb-28 lg:pb-32">
            <button type="button" data-rail-prev aria-label="Previous runs" class="rail-button">
                <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true">
                    <path fill-rule="evenodd" d="M17 10a.75.75 0 0 1-.75.75H5.56l3.72 3.72a.75.75 0 1 1-1.06 1.06l-5-5a.75.75 0 0 1 0-1.06l5-5a.75.75 0 0 1 1.06 1.06L5.56 9.25H16.25A.75.75 0 0 1 17 10Z" clip-rule="evenodd"/>
                </svg>
            </button>
            <button type="button" data-rail-next aria-label="More runs" class="rail-button">
                <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.69l-3.72-3.72a.75.75 0 0 1 1.06-1.06l5 5a.75.75 0 0 1 0 1.06l-5 5a.75.75 0 1 1-1.06-1.06l3.72-3.72H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
</section>
