<!--
    The page that is served when a URL does not match anything.
-->
<x-layouts.main title="Not found" description="That page does not exist." current="/">

    <section class="px-6 pt-36 pb-24 sm:px-8 sm:pt-44 sm:pb-32">
        <div class="mx-auto max-w-[88rem]">
            <p class="mono-label text-faint">Error 404</p>
            <h1 class="display-page mt-4 max-w-[14ch] text-balance text-ink">Nothing has been forged here.</h1>
            <p class="mt-8 max-w-[52ch] text-lg/7 text-pretty text-muted">The page you asked for does not exist, or it moved somewhere more useful.</p>
            <div class="mt-10 flex flex-wrap gap-3">
                <a href="/" class="btn-filled">Back to the homepage</a>
                <a href="/use-cases" class="btn-outline">See the runs</a>
            </div>
        </div>
    </section>

</x-layouts.main>
