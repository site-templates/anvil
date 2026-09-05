<!--
    How the product works, in three stages that match the three parts of the
    mark on the homepage: read, decide, execute. The middle row is flipped and
    sits on the quiet panel tone so the three do not read as one wall.
-->
<x-layouts.main title="Platform" description="How an Anvil run works: what it reads, how it decides, and what it is allowed to write." current="/platform">

    <x-sections.page-header
        heading="It logs in, does the work, and shows you what changed."
        body="A run is one workflow, described once and performed on a cadence. Anvil connects to your systems through their own APIs, applies the rules your team already follows, and stops at the approval you nominate."
        meta="Read · Decide · Execute" />

    <x-sections.feature-row
        id="read"
        heading="It reads the record, not a copy."
        body="Anvil answers from live data in your system of record. No nightly extract, no warehouse replica that was correct at midnight, no reporting layer that lost the exceptions on the way through."
        panelTitle="Connection"
        panelMeta="Per run"
        :items="$readChecks"
        :rows="$readSpec" />

    <x-sections.feature-row
        id="decide"
        band="mist"
        flip="1"
        heading="It decides against your rules."
        body="Your close checklist, your approval matrix, your materiality thresholds — written down, versioned and readable by the people who own them. Anything the rules do not cover becomes an exception with its reasoning attached."
        panelTitle="Judgement"
        panelMeta="Versioned"
        :items="$decideChecks"
        :rows="$decideSpec" />

    <x-sections.feature-row
        id="execute"
        heading="It writes, and you can undo it."
        body="Execution is the point, so it is the part with the most constraints: batched writes, thirty days of reversibility, one screen of approval, and a ledger entry that names the rule, the inputs and the human."
        panelTitle="Execution"
        panelMeta="Reversible"
        :items="$executeChecks"
        :rows="$executeSpec" />

    <x-sections.faq :items="$faq" />

    <x-sections.split-cta />

</x-layouts.main>
