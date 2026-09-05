<!--
    Plans, the shared list of what every plan includes, and the questions
    procurement always asks.
-->
<x-layouts.main title="Plans" description="Anvil is priced per run — one workflow, live in your tenant, with unlimited people watching the ledger." current="/plans">

    <x-sections.page-header
        heading="One run. Then the next one."
        body="Nobody buys a platform for the back office on a slide. Start with the process that costs you the most hands, run it in parallel for a week, and add the second when the first has paid for itself."
        meta="Priced per run · Seats are free" />

    <x-sections.plans
        heading="Three ways in."
        body="A run is one workflow, live in your tenant, with as many people watching it as you like."
        :items="$tiers"
        :included="$included" />

    <x-sections.faq :items="$faq" />

    <x-sections.split-cta />

</x-layouts.main>
