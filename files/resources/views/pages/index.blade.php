<!--
    The homepage. It lives at pages/index.blade.php, so it is served at "/".
    The page is a list of sections: each tag pulls a component from
    resources/views/components/sections/ and fills its props with these
    attributes. In the visual editor you can select, reorder and edit them
    on the canvas.

    The shapes change deliberately as you scroll — an asymmetric hero on gray,
    a long black stretch that opens with the ledger and closes with three
    marks, a white block whose card rail runs off the edge of the page, the
    logo grid back on gray, hairline department rows, and one full-bleed row
    cut in half — so the page has a rhythm rather than nine variations of the
    same row.
-->
<x-layouts.main title="Agents that finish the ticket" description="Anvil runs agents inside the systems your back office already uses. They read the real record, decide against your rules, and execute with a human on the approval." current="/">

    <x-sections.hero />

    <x-sections.ledger :queue="$ledgerQueue" :cleared="$ledgerCleared" />

    <x-sections.manifesto :items="$refusals" />

    <x-sections.introducing :steps="$runSteps" />

    <x-sections.capabilities :items="$capabilities" />

    <x-sections.library :items="$useCases" />

    <x-sections.systems :items="$systems" />

    <x-sections.roles :items="$roles" />

    <x-sections.split-cta />

</x-layouts.main>
