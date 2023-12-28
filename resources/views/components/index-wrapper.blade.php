@if($items->isNotEmpty())
    <div class="bg-gray-900 py-12 sm:py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">All {{ $itemName }}</h2>
            </div>

            {{ $slot }}

        </div>
    </div>
@else
    <x-not-found name="{{ $itemName }}"/>
@endif
