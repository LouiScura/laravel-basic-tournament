<x-guest-layout>

    <div class="py-24 sm:py-32">
        <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
            <div class="max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">{{ $team->name }}</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">{{ $team->town }}</p>
            </div>
                <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                    @foreach ($team->players as $player)
                        <li>
                            <div class="flex items-center gap-x-6">
                                <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <div>
                                    <h3 class="text-base font-semibold leading-7 tracking-tight text-white">{{ $player->first_name }} {{ $player->last_name }}</h3>
                                    <p class="text-sm font-semibold leading-6 text-red-300">Position: {{ $player->position }}</p>
                                    <p class="text-sm font-semibold leading-6 text-blue-300">Age: {{ $player->age }}</p>
                                    <p class="text-sm font-semibold leading-6 text-green-300">Goals Scored: {{ $player->goals_scored}}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
        </div>
    </div>


</x-guest-layout>
