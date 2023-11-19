<x-guest-layout>
    <h2 class="text-center text-green-500 pb-5 text-xl">Game {{ $game->id }} - Matchweek {{ $game->matchweek }}</h2>
    <div class="w-full max-w-md mx-auto p-10 rounded-md border shadow-lg bg-grey">
        <div class="text-center text-2xl font-semibold mb-4">{{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}</div>

        <div class="flex justify-center items-center">
            <div class="w-1/2 text-center">
                <div class="text-xl font-semibold mb-2 text-gray-300">{{ $game->homeTeam->name }}</div>
{{--                <img src="team-a-logo.png" alt="Team A Logo" class="w-24 h-24 mx-auto mb-2">--}}
                <p class="text-gray-600">{{ $game->homeTeam->town }}</p>
            </div>

            <div class="w-1/2 text-center">
                <div class="text-xl font-semibold mb-2 text-gray-300">{{ $game->awayTeam->name }}</div>
{{--                <img src="team-b-logo.png" alt="Team B Logo" class="w-24 h-24 mx-auto mb-2">--}}
                <p class="text-gray-600">{{ $game->awayTeam->town }}</p>
            </div>
        </div>
    </div>
    <x-statistics :game="$game" :statistics="$statistics"></x-statistics>
</x-guest-layout>
