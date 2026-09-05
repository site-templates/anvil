<!--
    The writing index. Rows come from resources/data/collections/posts.json;
    each leads to its own page at /blog/{slug}.
-->
<x-layouts.main title="Writing" description="Notes on agents that write, the thirty per cent your platform never shipped, and what a two-week implementation actually looks like." current="/blog">

    <x-sections.page-header
        heading="Writing"
        body="Field notes from implementations, and the arguments behind how the product is built."
        meta="4 posts" />

    <x-sections.posts :items="$posts" />

    <x-sections.split-cta />

</x-layouts.main>
