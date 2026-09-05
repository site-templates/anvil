@props([
    'title' => '',
    'description' => '',
    'tag' => '',
    'dateFormatted' => '',
    'readTime' => '',
    'backText' => 'All writing',
    'backLink' => '/blog',
    'moreHeading' => 'Next',
    'more',
])
<!--
    The chrome around a single post: the back link, the header, the article,
    and two more posts. Write the body as plain HTML in the slot —
    resources/css/site.css styles it through the .prose class. The more list
    is the whole posts collection; the current post is skipped and one spare
    renders so exactly two show.
-->
<x-layouts.main :title="$title" :description="$description" current="/blog">

    <article class="px-6 pt-36 pb-24 sm:px-8 sm:pt-44 sm:pb-32">
        <div class="mx-auto max-w-[88rem]">

            <div class="mx-auto max-w-[46rem]">
                <a href="{{ $backLink }}" class="text-link group inline-flex items-center gap-2 text-base font-medium text-muted hover:text-ink" data-reveal>
                    <svg viewBox="0 0 16 16" class="size-4 h-lh shrink-0 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
                    </svg>
                    {{ $backText }}
                </a>

                <p class="mono-label reveal-1 mt-10 text-faint" data-reveal>{{ $tag }} · {{ $dateFormatted }} · {{ $readTime }}</p>
                <h1 class="display-page reveal-2 mt-4 text-pretty text-ink" data-reveal>{{ $title }}</h1>
                <p class="reveal-3 mt-8 text-xl/8 text-pretty text-muted" data-reveal>{{ $description }}</p>

                <div class="prose mt-12 border-t border-line pt-12" data-reveal>
                    {{ $slot }}
                </div>
            </div>

            <div class="mt-24 border-t border-line pt-12">
                <h2 class="mono-label text-faint">{{ $moreHeading }}</h2>
                <ul role="list" class="mt-8 grid gap-6 md:grid-cols-2 [&>*:nth-child(n+3)]:hidden">
                    @foreach ($more as $item)
                    @if ($item->title != $title)
                    <li>
                        <a href="{{ $item->link }}" class="group flex h-full flex-col rounded-3xl bg-surface p-6 hover:bg-mist">
                            <span class="mono-label text-faint">{{ $item->dateFormatted }}</span>
                            <span class="heading-alt mt-3 text-xl text-balance text-ink">{{ $item->title }}</span>
                            <span class="mt-3 text-base/7 text-pretty text-muted">{{ $item->description }}</span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

        </div>
    </article>

</x-layouts.main>
