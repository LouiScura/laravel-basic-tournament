<x-guest-layout>
    <section>
        <div class="grid grid-cols-5 gap-3 items-center">
            <div class="col-span-2">
                <p class="text-sm text-gray-600">Matchweek {{ $game->matchweek }} - Game {{ $game->id }}</p>
                <p class="text-xs text-gray-600 py-2">{{ $game->matchdate }}</p>
                <div class="flex justify-between items-center">
                    <div class="w-20 h-20">
                        <img src="{{ Storage::url($game->homeTeam->logo) }}" alt="{{ $game->homeTeam->name }}" class="w-full object-cover"/>
                    </div>
                    <h2 class="text-slate-200 text-2xl">{{ $game->homeTeam->name }}</h2>
                    <span class="text-slate-200 text-2xl">{{ $game->home_team_score }}</span>
                </div>
            </div>
            <div class="text-center">
                <span class="text-slate-200 text-xl text-center">-</span>
            </div>
            <div class="col-span-2">
                <div class="flex justify-between items-center">
                    <span class="text-slate-200 text-2xl">{{ $game->away_team_score }}</span>
                    <div class="w-20 h-20">
                        <img src="{{ Storage::url($game->awayTeam->logo) }}" alt="{{ $game->awayTeam->name }}" class="w-full object-cover"/>
                    </div>
                    <h2 class="text-slate-200 text-2xl">{{ $game->awayTeam->name }}</h2>
                </div>
            </div>

            <div class="relative w-full sm:rounded-lg">
                <x-stats :game="$game"/>
            </div>

        </div>
    </section>
</x-guest-layout>
