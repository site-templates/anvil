@props([
    'items' => [],
])
<!--
    The writing index as hairline rows — meta and title on the left, the
    standfirst on the right, nothing boxed. Posts come from
    resources/data/collections/posts.json; each row leads to its own page.
-->
<section class="px-6 pb-24 sm:px-8 sm:pb-32">
    <div class="mx-auto max-w-[88rem]">
        <ul role="list" data-reveal>
            @foreach ($items as $post)
            <li class="border-t border-line last:border-b">
                <a href="{{ $post->link }}" class="group grid items-baseline gap-x-6 gap-y-3 px-2 py-8 sm:grid-cols-[minmax(0,7fr)_minmax(0,5fr)] sm:px-4">
                    <div>
                        <p class="mono-label text-faint">{{ $post->tag }} · {{ $post->dateFormatted }} · {{ $post->readTime }}</p>
                        <h2 class="heading-alt mt-3 max-w-[24ch] text-2xl text-balance text-ink sm:text-3xl">{{ $post->title }}</h2>
                    </div>
                    <p class="text-base/7 text-pretty text-muted">{{ $post->description }}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
