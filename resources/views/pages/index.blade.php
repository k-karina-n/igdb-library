<x-layaout>
    <div class="container mx-auto px-14">
        <h2 class="text-white uppercase tracking-wide font-semibold">Popular games</h2>
        <div hx-get="/popularGames" hx-trigger="load" hx-swap="outerHTML">
            <img class="htmx-indicator w-5 h-5" src="/three-dots.svg">
        </div>

        <div class="flex flex-col lg:flex-row my-10">
            <div class="w-full lg:w-3/4 m-0 lg:mr-32">
                <h2 class="text-white uppercase tracking-wide font-semibold">Recently reviewed</h2>
                <div class="container space-y-12 mt-8">
                    <div hx-get="/reviewedGames" hx-trigger="revealed" hx-swap="outerHTML">
                        <img class="htmx-indicator w-5 h-5" src="/three-dots.svg">
                    </div>
                </div>
            </div>

            <div class="mt-12 lg:w-1/4 lg:mt-0">
                <h2 class="font-semibold uppercase text-white tracking-wide">Coming soon</h2>

                <div class="container space-y-10 mt-8">
                    <div hx-get="/comingGames" hx-trigger="revealed" hx-swap="outerHTML">
                        <img class="htmx-indicator w-5 h-5" src="/three-dots.svg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layaout>
