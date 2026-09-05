<!--
    Every run in the library, three across. Each card leads to its own page at
    /use-case/{slug}, served by pages/use-case/[useCases.slug].blade.php.
-->
<x-layouts.main title="Use cases" description="The runs Anvil ships with — month-end close, invoice matching, access reviews, joiner and leaver runs, and variance packs." current="/use-cases">

    <x-sections.page-header
        heading="Runs, and the numbers they moved."
        body="Each of these was written by an engineer who spent years implementing the system it operates. Point one at a sandbox copy of your tenant and it will tell you what it would have done."
        meta="5 runs · more each quarter" />

    <x-sections.runs :items="$useCases" />

    <x-sections.split-cta />

</x-layouts.main>
