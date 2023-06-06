<x-layaout>
    <div class="container mx-auto px-14">
        <x-h2 title='Popular games' />

        <div hx-get="/popularGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#pop-indicator">
            <img id="pop-indicator" class="htmx-indicator w-8 h-8 mt-2 ml-4 text-pink-500" src="/ball-triangle.svg">
        </div>

        <div class="flex flex-col lg:flex-row my-10">
            <div class="w-full lg:w-3/4 m-0 lg:mr-32">
                <x-h2 title='Recently reviewed' />

                <div hx-get="/reviewedGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#rev-indicator">
                    <img id="rev-indicator" class="htmx-indicator w-8 h-8 mt-2 ml-4 text-pink-500"
                        src="/ball-triangle.svg">
                </div>
            </div>

            <div class="mt-12 lg:w-1/4 lg:mt-0">
                <x-h2 title='Coming soon' />

                <div hx-get="/comingGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#com-indicator">
                    <img id="com-indicator" class="htmx-indicator w-8 h-8 mt-2 ml-4 text-pink-500"
                        src="/ball-triangle.svg">
                </div>
            </div>
        </div>
    </div>
</x-layaout>
