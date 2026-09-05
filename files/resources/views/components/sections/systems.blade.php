@props([
    'heading' => 'It already speaks to what you run.',
    'body' => 'Twenty years of implementation work, encoded as agents that operate inside your system of record instead of politely integrating with it.',
    'items' => [],
])
<!--
    The systems row. Eight black tiles on the warm canvas, four to a row on
    desktop and two on a phone, so no row is ever left short. Logos come from
    resources/data/collections/systems.json.
-->
<section class="px-6 py-20 sm:px-8 sm:py-28 lg:py-32">
    <div class="mx-auto max-w-[88rem]">

        <h2 class="display-section max-w-[18ch] text-balance text-ink" data-reveal>{{ $heading }}</h2>
        <p class="reveal-1 mt-6 max-w-[60ch] text-base/7 text-pretty text-muted sm:text-lg/8" data-reveal>{{ $body }}</p>

        <ul role="list" class="stagger mt-14 grid grid-cols-2 gap-6 sm:grid-cols-4" data-reveal>
            @foreach ($items as $item)
            <li class="flex items-center justify-center rounded-2xl bg-block px-6 py-10">
                <img src="{{ $item->image }}" alt="{{ $item->name }}" height="26" class="h-6 w-auto">
            </li>
            @endforeach
        </ul>
    </div>
</section>
