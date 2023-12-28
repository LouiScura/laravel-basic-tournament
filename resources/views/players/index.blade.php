<x-guest-layout>
    <x-index-wrapper :items="$players" itemName="players">
        <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-5 gap-x-8 gap-y-14 lg:mx-0 lg:max-w-none">
            @foreach($players as $player)
                <li>
                    @if( $player->avatar )
                        <img class="mx-auto h-24 w-24 rounded-full" src="/storage/{{ $player->avatar }}" alt="">
                    @endif
                    <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-white">{{ $player->first_name }} {{ $player->last_name }}</h3>
                    <p class="text-base leading-7 text-gray-400">{{ $player->team->name }}</p>
                    <p class="text-base leading-6 text-gray-500">{{ $player->position }}</p>
                    <p class="text-sm leading-4 text-gray-700">{{ $player->age }}</p>
                </li>
            @endforeach
        </ul>
    </x-index-wrapper>
</x-guest-layout>
