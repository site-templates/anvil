{{-- Dynamic page: one URL per entry of resources/data/collections/posts.json, matched on `slug` — $posts is the entry. Add an entry there to publish; its `content` HTML is the body, and $entries is the whole collection for the "next" list. --}}
<x-layouts.post
    :title="$posts->title"
    :description="$posts->description"
    :tag="$posts->tag"
    :dateFormatted="$posts->dateFormatted"
    :readTime="$posts->readTime"
    :more="$entries">

    {!! $posts->content !!}

</x-layouts.post>
