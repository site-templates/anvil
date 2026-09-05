@props([
    'heading' => 'Every department runs on the same 30%.',
    'body' => 'Configuration, reporting, compliance, close. The work your platform never shipped out of the box and your team does by hand.',
    'items' => [],
])
<!--
    Departments as hairline rows rather than cards — the lightest separation
    that still works, and the shape that lets a name, a sentence and a figure
    sit on one baseline. Rows come from resources/data/collections/roles.json.
-->
<section class="bg-mist px-6 py-20 sm:px-8 sm:py-28 lg:py-32">
    <div class="mx-auto max-w-[88rem]">

        <div class="grid gap-x-6 gap-y-6 lg:grid-cols-[7fr_5fr] lg:items-end">
            <h2 class="display-section max-w-[16ch] text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="reveal-1 max-w-[48ch] text-base/7 text-pretty text-muted sm:text-lg/8" data-reveal>{{ $body }}</p>
        </div>

        <ul role="list" class="mt-14" data-reveal>
            @foreach ($items as $item)
            <li class="border-t border-line last:border-b">
                <a href="{{ $item->link }}" class="group grid items-baseline gap-x-6 gap-y-2 px-2 py-7 sm:grid-cols-[minmax(0,5fr)_minmax(0,7fr)_auto] sm:px-4">
                    <h3 class="heading-alt text-xl text-ink">{{ $item->name }}</h3>
                    <p class="text-base/7 text-pretty text-muted">{{ $item->body }}</p>
                    <p class="mono-label text-faint sm:text-right">{{ $item->metric }}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
