@props([
    'brand' => 'Anvil',
    'columns' => [],
    'social' => [],
    'contactLabel' => 'Questions about a rollout?',
    'emailLabel' => 'hello@anvil.example',
    'emailLink' => 'mailto:hello@anvil.example',
    'address' => [],
    'copyright' => 'Anvil © 2026 · All rights reserved',
    'legalText' => 'Privacy statement',
    'legalLink' => '/blog',
])
<!--
    The close. A black band carrying the wordmark at poster scale, the four
    link columns from footer_columns in resources/data/site.json, and a mono
    address block. The mail address is the one place voltage yellow appears
    outside the closing panel.
-->
<footer class="on-block bg-block text-invert" data-dark>
    <div class="mx-auto max-w-[88rem] px-6 pt-20 pb-10 sm:px-8 sm:pt-28">

        <div class="grid gap-x-6 gap-y-14 lg:grid-cols-[minmax(0,1fr)_minmax(0,2fr)]">

            <div>
                <a href="/" aria-label="Homepage" class="flex items-center gap-3 text-invert">
                    <svg viewBox="0 0 32 32" class="size-14 shrink-0" aria-hidden="true">
                        <path fill="currentColor" d="M3 7h27v4.6H10z"/>
                        <path fill="currentColor" fill-rule="evenodd" d="M13.5 11.6h12L29 25H10zM19.5 13.6l4.3 8h-8.6z"/>
                    </svg>
                    <span class="display-section">{{ $brand }}</span>
                </a>

                <p class="mt-10 text-base/7 text-smoke">{{ $contactLabel }}</p>
                <p class="mt-2 text-base/7">
                    <a href="{{ $emailLink }}" class="text-link bg-volt px-1.5 py-0.5 font-medium text-accent-ink hover:bg-invert">{{ $emailLabel }}</a>
                </p>
            </div>

            <div class="grid grid-cols-2 gap-x-6 gap-y-12 sm:grid-cols-4">
                @foreach ($columns as $column)
                <div>
                    <p class="mono-label text-smoke">{{ $column->text }}</p>
                    <ul role="list" class="mt-5 flex flex-col gap-3 text-base/6">
                        @foreach ($column->children as $child)
                        <li><a href="{{ $child->url }}" class="text-link text-invert hover:text-volt">{{ $child->text }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-20 flex flex-col gap-8 border-t border-line-invert pt-8 sm:mt-28 lg:flex-row lg:items-end lg:justify-between">
            <div class="mono-label text-smoke">
                @foreach ($address as $line)
                <p>{{ $line->text }}</p>
                @endforeach
            </div>

            <div class="flex flex-col gap-6 lg:items-end">
                <ul role="list" class="flex items-center gap-5">
                    @foreach ($social as $item)
                    <li>
                        <a href="{{ $item->url }}" class="icon-link block text-smoke hover:text-invert" aria-label="{{ $item->label }}">
                            @if ($item->platform == 'x')
                            <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true">
                                <path d="M11.9 8.6 18 1.5h-1.5l-5.3 6.2-4.2-6.2H2l6.4 9.4L2 18.5h1.5l5.6-6.5 4.5 6.5H18L11.9 8.6Zm-2 2.3-.6-.9-5.2-7.4h2.2l4.2 6 .6 1 5.4 7.7h-2.2l-4.4-6.4Z"/>
                            </svg>
                            @elseif ($item->platform == 'linkedin')
                            <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true">
                                <path d="M4.98 3.5A1.75 1.75 0 1 1 1.5 3.5a1.75 1.75 0 0 1 3.48 0ZM1.75 7h3.5v11h-3.5V7Zm5.75 0h3.35v1.5h.05c.47-.85 1.6-1.75 3.3-1.75 3.53 0 4.18 2.2 4.18 5.07V18h-3.5v-5.3c0-1.27-.02-2.9-1.83-2.9-1.83 0-2.11 1.38-2.11 2.8V18H7.5V7Z"/>
                            </svg>
                            @else
                            <svg viewBox="0 0 20 20" class="size-5 fill-current" aria-hidden="true">
                                <path d="M18.6 6.2a2.2 2.2 0 0 0-1.55-1.56C15.68 4.27 10 4.27 10 4.27s-5.68 0-7.05.37A2.2 2.2 0 0 0 1.4 6.2C1.03 7.57 1.03 10 1.03 10s0 2.43.37 3.8a2.2 2.2 0 0 0 1.55 1.56c1.37.37 7.05.37 7.05.37s5.68 0 7.05-.37a2.2 2.2 0 0 0 1.55-1.55c.37-1.38.37-3.81.37-3.81s0-2.43-.37-3.8ZM8.2 12.63V7.37L12.94 10 8.2 12.63Z"/>
                            </svg>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>

                <div class="flex flex-col gap-2 text-sm/6 text-smoke sm:flex-row sm:items-center sm:gap-6">
                    <p>{{ $copyright }}</p>
                    <a href="{{ $legalLink }}" class="text-link hover:text-invert">{{ $legalText }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
