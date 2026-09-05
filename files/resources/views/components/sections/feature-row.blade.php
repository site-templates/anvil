@props([
    'id' => '',
    'heading' => 'Section',
    'body' => '',
    'flip' => '0',
    'band' => 'canvas',
    'panelTitle' => 'Detail',
    'panelMeta' => '',
    'items' => [],
    'rows' => [],
])
<!--
    One stage of the platform, told as an editorial row: the argument on one
    side, a spec panel on the other. Set Flip to move the panel to the left so
    consecutive rows alternate down the page.
-->
<section id="{{ $id }}" data-band="{{ $band }}" class="px-6 py-20 sm:px-8 sm:py-28">
    <div class="mx-auto grid max-w-[88rem] items-start gap-x-6 gap-y-12 lg:grid-cols-2" data-flip="{{ $flip }}">

        <div class="row-copy">
            <h2 class="display-section max-w-[14ch] text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="reveal-1 mt-6 max-w-[54ch] text-base/7 text-pretty text-muted sm:text-lg/8" data-reveal>{{ $body }}</p>

            <ul role="list" class="reveal-2 mt-8 flex flex-col gap-4" data-reveal>
                @foreach ($items as $item)
                <li class="flex items-start gap-3 text-base/7 text-ink">
                    <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-ink" aria-hidden="true">
                        <path fill-rule="evenodd" d="M13.28 4.22a.75.75 0 0 1 0 1.06l-6.5 6.5a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06L6.25 10.19l5.97-5.97a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                    </svg>
                    {{ $item->text }}
                </li>
                @endforeach
            </ul>
        </div>

        <div class="reveal-1 overflow-hidden rounded-3xl bg-surface" data-reveal>
            <div class="flex items-center justify-between gap-4 border-b border-line px-6 py-4">
                <p class="text-base/6 font-medium text-ink">{{ $panelTitle }}</p>
                <p class="mono-label text-faint">{{ $panelMeta }}</p>
            </div>
            <dl class="px-6 py-2">
                @foreach ($rows as $row)
                <div class="grid grid-cols-[minmax(0,2fr)_minmax(0,3fr)] items-baseline gap-4 border-b border-line py-4 last:border-b-0">
                    <dt class="mono-label text-faint">{{ $row->term }}</dt>
                    <dd class="text-base/6 text-ink">{{ $row->detail }}</dd>
                </div>
                @endforeach
            </dl>
        </div>

    </div>
</section>
