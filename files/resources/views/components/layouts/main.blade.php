@props(['title' => 'Home', 'description' => '', 'current' => '/'])
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} · {{ $site->name }}</title>
    <meta name="description" content="{{ $description }}">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- Anton is the condensed display voice, Inter reads, JetBrains Mono carries the meta. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400&display=swap" rel="stylesheet">

    <!-- Loads Tailwind, then the tokens, the display scale, the ledger and the motion system -->
    @vite(['resources/css/site.css'])

    <!-- Flags JavaScript before first paint so scroll reveals never flash -->
    <script>document.documentElement.classList.add('js')</script>
    <script src="/js/main.js" defer></script>
</head>
<body data-instant-navigation class="min-h-dvh bg-canvas font-sans text-ink antialiased">
<!--
    THESIS. Software that does the work rather than recommending it, sold the
    way a tool catalogue sells a tool: flat, heavy, unglamorous, legible from
    across the room.

    WORLD. A warm gray canvas that is never white. White is a material laid on
    it; black is a full-bleed block that interrupts it. Two chromatic notes,
    both rationed — pale mint on tags and marks, voltage yellow on one half of
    the closing panel and the ledger stamp. Nothing casts a shadow. Condensed
    uppercase display at 0.9 leading does all of the shouting.

    FIRST VIEWPORT. A white pill floating on gray; a four-line display headline
    filling the left; the block-built mark on the right; one black button.

    SIGNATURE. The strike ledger — real back-office work getting stamped and
    struck through, one row at a time, on black.
-->

    <x-nav :links="$site->nav_links" :current="$current" />

    <main class="isolate">
        {{ $slot }}
    </main>

    <x-footer :columns="$site->footer_columns" :social="$site->social_links" :address="$site->address_lines" />

</body>
</html>
