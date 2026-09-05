@props([
    'items' => [],
])
<!--
    Every run as a card grid — the same card the homepage rail carries, laid
    out three across. Entries come from resources/data/collections/useCases.json.
-->
<section class="px-6 pb-24 sm:px-8 sm:pb-32">
    <div class="mx-auto max-w-[88rem]">
        <ul role="list" class="stagger grid gap-6 sm:grid-cols-2 lg:grid-cols-3" data-reveal>
            @foreach ($items as $item)
            <li>
                <a href="{{ $item->link }}" data-tone="{{ $item->tone }}" class="group flex h-full flex-col overflow-hidden rounded-3xl bg-surface">
                    <div class="card-head flex aspect-16/9 flex-col justify-between p-6">
                        <p class="mono-label text-muted">{{ $item->system }}</p>
                        <div>
                            <p class="display-block text-ink">{{ $item->metric }}</p>
                            <p class="mono-label mt-1 text-faint">{{ $item->metricWas }}</p>
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h2 class="heading-alt text-xl text-ink">{{ $item->title }}</h2>
                        <p class="mt-3 text-base/7 text-pretty text-muted">{{ $item->blurb }}</p>
                        <p class="mt-auto pt-8 text-base font-medium text-ink">
                            <span class="border-b-2 border-transparent pb-0.5 group-hover:border-ink">{{ $item->linkText }}</span>
                        </p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
