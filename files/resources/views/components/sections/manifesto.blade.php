@props([
    'heading' => 'Most enterprise AI is a second opinion you still have to act on.',
    'turn' => 'Anvil takes the action.',
    'items' => [],
])
<!--
    The argument, made as a list of refusals. The heading holds the left five
    columns at display scale; the refusals run down the right seven as hairline
    rows, and the last line turns the argument around. Rows come from
    resources/data/collections/refusals.json.
-->
<section class="on-block bg-block text-invert" data-dark>
    <div class="mx-auto max-w-[88rem] px-6 py-20 sm:px-8 sm:py-28 lg:py-32">
        <div class="grid gap-x-6 gap-y-12 lg:grid-cols-[5fr_7fr]">

            <h2 class="display-section max-w-[16ch] text-balance" data-reveal>{{ $heading }}</h2>

            <div>
                <ul role="list" class="stagger" data-reveal>
                    @foreach ($items as $item)
                    <li class="border-t border-line-invert py-6 text-xl/8 text-smoke sm:text-2xl/9">{{ $item->text }}</li>
                    @endforeach
                </ul>
                <p class="reveal-1 mt-10 text-2xl/9 font-medium text-invert sm:text-3xl/10" data-reveal>{{ $turn }}</p>
            </div>

        </div>
    </div>
</section>
