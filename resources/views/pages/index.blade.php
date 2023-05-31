<x-layaout>
    <div class="container mx-auto px-14">

        <h2
            class="text-4xl uppercase italic font-bold tracking-wide text-transparent 
                bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l">
            Popular games
        </h2>

        <div hx-get="/popularGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#pop-indicator" >
            <img id="pop-indicator" class="htmx-indicator w-8 h-8 mt-2 ml-4 text-pink-500" src="/ball-triangle.svg">
        </div>

        <div class="flex flex-col lg:flex-row my-10">
            <div class="w-full lg:w-3/4 m-0 lg:mr-32">
                <h2
                    class="text-4xl uppercase italic font-bold tracking-wide text-transparent 
                bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l">
                    Recently reviewed</h2>
                <div class="container space-y-12 mt-6">
                    <div hx-get="/reviewedGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#rev-indicator">
                        <img id="rev-indicator" class="htmx-indicator w-8 h-8 ml-4" src="/ball-triangle.svg">
                    </div>
                </div>
            </div>

            <div class="mt-12 lg:w-1/4 lg:mt-0">
                <h2
                    class="text-4xl uppercase italic font-bold tracking-wide text-transparent 
                bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l">
                    Coming soon</h2>
                <div class="container space-y-10 mt-6">
                    <div hx-get="/comingGames" hx-trigger="revealed" hx-swap="outerHTML" hx-indicator="#com-indicator">
                        <img id="com-indicator" class="htmx-indicator w-8 h-8 ml-4" src="/ball-triangle.svg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layaout>
