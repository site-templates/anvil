@props([
    'heading' => 'The work, as it clears.',
    'body' => 'Every agent run lands in one ledger: what it touched, which rule it applied, who approved it. Nothing happens in your systems that is not a line here.',
    'queueLabel' => 'In the queue',
    'clearedLabel' => 'Cleared today',
    'count' => '312',
    'countLabel' => 'tickets closed since midnight',
    'queue' => [],
    'cleared' => [],
])
<!--
    Anvil's signature. A queue of real back-office work on the left and the
    cleared pile on the right. main.js promotes the top queued row every few
    seconds — struck through, stamped, moved across, counter up.

    Without JavaScript, and under reduced motion, nothing moves: both columns
    render exactly as the markup describes them and the ledger still reads.
    Rows come from resources/data/collections/ledgerQueue.json and
    ledgerCleared.json.
-->
<section class="on-block rounded-t-[2.5rem] bg-block text-invert sm:rounded-t-[4rem]" data-dark data-ledger>
    <div class="mx-auto max-w-[88rem] px-6 py-20 sm:px-8 sm:py-28 lg:py-32">

        <div class="grid gap-x-6 gap-y-10 lg:grid-cols-[7fr_5fr] lg:items-end">
            <div>
                <h2 class="display-section max-w-[18ch] text-balance" data-reveal>{{ $heading }}</h2>
                <p class="reveal-1 mt-6 max-w-[56ch] text-base/7 text-pretty text-smoke sm:text-lg/8" data-reveal>{{ $body }}</p>
            </div>

            <div class="reveal-2 lg:text-right" data-reveal>
                <p class="display-section tabular-nums text-volt" data-ledger-count data-start="{{ $count }}">{{ $count }}</p>
                <p class="mono-label mt-2 text-smoke">{{ $countLabel }}</p>
            </div>
        </div>

        <div class="mt-16 grid gap-x-6 gap-y-12 lg:grid-cols-2" data-reveal>
            <div>
                <p class="mono-label text-smoke">{{ $queueLabel }}</p>
                <ul role="list" class="mt-4" data-ledger-queue>
                    @foreach ($queue as $row)
                    <li class="ledger-row grid grid-cols-[3.25rem_1fr_auto] items-center gap-3 border-t border-line-invert py-4 sm:grid-cols-[4.5rem_1fr_auto] sm:gap-4">
                        <span class="mono-label text-smoke">{{ $row->system }}</span>
                        <span class="ledger-strike text-base/6">{{ $row->task }}</span>
                        <span class="ledger-stamp mono-label bg-volt px-2 text-accent-ink">{{ $row->stamp }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <p class="mono-label text-smoke">{{ $clearedLabel }}</p>
                <ul role="list" class="mt-4" data-ledger-cleared>
                    @foreach ($cleared as $row)
                    <li class="ledger-row grid grid-cols-[3.25rem_1fr_auto] items-center gap-3 border-t border-line-invert py-4 sm:grid-cols-[4.5rem_1fr_auto] sm:gap-4" data-done>
                        <span class="mono-label text-smoke">{{ $row->system }}</span>
                        <span class="ledger-strike text-base/6 text-smoke">{{ $row->task }}</span>
                        <span class="ledger-stamp mono-label bg-volt px-2 text-accent-ink">{{ $row->stamp }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
