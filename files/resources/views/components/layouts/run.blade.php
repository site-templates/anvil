@props([
    'title' => '',
    'description' => '',
    'system' => '',
    'metric' => '',
    'metricWas' => '',
    'owner' => '',
    'runtime' => '',
    'backText' => 'All runs',
    'backLink' => '/use-cases',
    'moreHeading' => 'Other runs',
    'more',
])
<!--
    The chrome around a single run: the back link, a header carrying the
    figure that changed, a fact strip, the write-up, and the other runs.
    Write the body as plain HTML in the slot — .prose styles it.
-->
<x-layouts.main :title="$title" :description="$description" current="/use-cases">

    <article class="px-6 pt-36 pb-24 sm:px-8 sm:pt-44 sm:pb-32">
        <div class="mx-auto max-w-[88rem]">

            <a href="{{ $backLink }}" class="text-link group inline-flex items-center gap-2 text-base font-medium text-muted hover:text-ink" data-reveal>
                <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-current" aria-hidden="true">
                    <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
                </svg>
                {{ $backText }}
            </a>

            <div class="mt-10 grid gap-x-6 gap-y-8 lg:grid-cols-[7fr_5fr] lg:items-end">
                <div>
                    <p class="mono-label text-faint" data-reveal>{{ $system }}</p>
                    <h1 class="display-page reveal-1 mt-4 max-w-[16ch] text-balance text-ink" data-reveal>{{ $title }}</h1>
                </div>
                <div class="reveal-2 lg:text-right" data-reveal>
                    <p class="display-section tabular-nums text-ink">{{ $metric }}</p>
                    <p class="mono-label mt-2 text-faint">{{ $metricWas }}</p>
                </div>
            </div>

            <dl class="mt-14 grid gap-x-6 gap-y-6 border-y border-line py-8 sm:grid-cols-3" data-reveal>
                <div>
                    <dt class="mono-label text-faint">Owner</dt>
                    <dd class="mt-2 text-base/6 text-ink">{{ $owner }}</dd>
                </div>
                <div>
                    <dt class="mono-label text-faint">Cadence</dt>
                    <dd class="mt-2 text-base/6 text-ink">{{ $runtime }}</dd>
                </div>
                <div>
                    <dt class="mono-label text-faint">System</dt>
                    <dd class="mt-2 text-base/6 text-ink">{{ $system }}</dd>
                </div>
            </dl>

            <div class="prose mt-14 max-w-[46rem]" data-reveal>
                {{ $slot }}
            </div>

            <div class="mt-24 border-t border-line pt-12">
                <h2 class="mono-label text-faint">{{ $moreHeading }}</h2>
                <ul role="list" class="mt-8 grid gap-6 md:grid-cols-3 [&>*:nth-child(n+4)]:hidden">
                    @foreach ($more as $item)
                    @if ($item->title != $title)
                    <li>
                        <a href="{{ $item->link }}" class="group flex h-full flex-col rounded-3xl bg-surface p-6 hover:bg-mist">
                            <span class="mono-label text-faint">{{ $item->system }}</span>
                            <span class="heading-alt mt-3 text-xl text-balance text-ink">{{ $item->title }}</span>
                            <span class="mt-3 text-base/7 text-pretty text-muted">{{ $item->blurb }}</span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

        </div>
    </article>

</x-layouts.main>
