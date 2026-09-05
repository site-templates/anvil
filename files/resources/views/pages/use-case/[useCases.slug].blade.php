{{-- Dynamic page: one URL per entry of resources/data/collections/useCases.json, matched on `slug` — $useCases is the entry. Add an entry there to publish; its `content` HTML is the body, and $entries is the whole collection for the "other runs" list. --}}
<x-layouts.run
    :title="$useCases->title"
    :description="$useCases->description"
    :system="$useCases->system"
    :metric="$useCases->metric"
    :metricWas="$useCases->metricWas"
    :owner="$useCases->owner"
    :runtime="$useCases->runtime"
    :more="$entries">

    {!! $useCases->content !!}

</x-layouts.run>
