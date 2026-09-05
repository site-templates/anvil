@props([
    'heading' => 'Meet Anvil',
    'body' => "Anvil connects to your systems of record through their own APIs, reads live data, applies the rules your team already follows, and executes the transaction with a named human on the approval. It logs in, does the work, and hands back a record of what changed.",
    'note' => 'It learns the shape of your month. Every close, every reconciliation, every exception makes the next run shorter.',
    'ctaText' => 'Read how it works',
    'ctaLink' => '/platform',
    'runTitle' => 'Close AP · Period 08',
    'runMeta' => 'Run 4,118',
    'steps' => [],
    'approval' => 'Waiting on approval · Priya Kaur, Financial Controller',
])
<!--
    The product introduction. Copy on the left, a drawn run panel on the right
    — the same run the ledger above is counting, opened up. The panel is markup
    and tokens, so it stays sharp at any size and restyles with the theme.
    Steps come from resources/data/collections/runSteps.json.
-->
<section class="on-block bg-block text-invert" data-dark>
    <div class="mx-auto max-w-[88rem] px-6 py-20 sm:px-8 sm:py-28 lg:py-32">
        <div class="grid items-center gap-x-6 gap-y-14 lg:grid-cols-2">

            <div>
                <h2 class="display-section max-w-[12ch] text-balance" data-reveal>{{ $heading }}</h2>
                <p class="reveal-1 mt-8 max-w-[56ch] text-base/7 text-pretty text-smoke sm:text-lg/8" data-reveal>{{ $body }}</p>
                <p class="reveal-2 mt-6 max-w-[56ch] text-base/7 text-pretty text-smoke sm:text-lg/8" data-reveal>{{ $note }}</p>
                <div class="reveal-3 mt-10" data-reveal>
                    <a href="{{ $ctaLink }}" class="btn-filled">{{ $ctaText }}</a>
                </div>
            </div>

            <div class="reveal-1 overflow-hidden rounded-3xl bg-graphite" data-reveal>
                <div class="flex items-center justify-between gap-4 border-b border-line-invert px-6 py-4">
                    <p class="text-base/6 font-medium">{{ $runTitle }}</p>
                    <p class="mono-label text-smoke">{{ $runMeta }}</p>
                </div>

                <ul role="list" class="px-6 py-2">
                    @foreach ($steps as $step)
                    <li class="grid grid-cols-[3.5rem_1fr] items-start gap-4 border-b border-line-invert py-4 last:border-b-0">
                        <span class="mono-label text-smoke">{{ $step->at }}</span>
                        <span>
                            <span class="text-base/6">{{ $step->text }}</span>
                            <span class="mono-label mt-1 block text-smoke">{{ $step->detail }}</span>
                        </span>
                    </li>
                    @endforeach
                </ul>

                <p class="mono-label border-t border-line-invert bg-block px-6 py-4 text-volt">{{ $approval }}</p>
            </div>

        </div>
    </div>
</section>
