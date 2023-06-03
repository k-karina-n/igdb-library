<x-layaout>
    <div class="container mx-auto px-14">
        <x-h2 title='Popular games' />

        <div hx-get="/popularGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#pop-indicator">
            <x-htmx-indicator id="pop-indicator" />
        </div>

        <div class="flex flex-col lg:flex-row my-10">
            <div class="w-full lg:w-3/4 m-0 lg:mr-32">
                <x-h2 title='Recently reviewed' />

                <div hx-get="/reviewedGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#rev-indicator">
                    <x-htmx-indicator id="rev-indicator" />
                </div>
            </div>

            <div class="mt-12 lg:w-1/4 lg:mt-0">
                <x-h2 title='Coming soon' />

                <div hx-get="/comingGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#com-indicator">
                    <x-htmx-indicator id="com-indicator" />
                </div>
            </div>
        </div>
    </div>
</x-layaout>
