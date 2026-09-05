@props([
    'heading' => 'Page',
    'body' => '',
    'meta' => '',
])
<!--
    The opening of every page that is not the homepage: one display heading,
    one paragraph, and an optional monospace line for the facts underneath.
-->
<section class="px-6 pt-36 pb-16 sm:px-8 sm:pt-44 sm:pb-20">
    <div class="mx-auto max-w-[88rem]">
        <h1 class="display-page max-w-[18ch] text-balance text-ink" data-reveal>{{ $heading }}</h1>
        <p class="reveal-1 mt-8 max-w-[60ch] text-lg/7 text-pretty text-muted sm:text-xl/8" data-reveal>{{ $body }}</p>
        <p class="mono-label reveal-2 mt-8 text-faint" data-reveal>{{ $meta }}</p>
    </div>
</section>
