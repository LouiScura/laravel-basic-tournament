<x-guest-layout>
    <div class="grid grid-cols-4 gap-4">
        @foreach($players as $player)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="/storage/{{ $player->avatar }}" alt="Player">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $player->first_name }} {{ $player->last_name }}</div>
                    <p class="text-white text-base">
                        {{ $player->team->name }}
                    </p>
                    <p class="text-white text-base">
                        {{ $player->position }}
                    </p>
                    <p class="text-white text-base">
                        {{ $player->age }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
