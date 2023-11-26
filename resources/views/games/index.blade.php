<x-guest-layout>

        @if($games->isNotEmpty())
            @php
                $groupedGames = $games->groupBy('matchweek');
            @endphp

            @foreach($groupedGames as $matchweek => $matchweekGames)
                <div class="{{$loop->iteration > 1 ? 'my-5' : ''}} }}">
                    <h2 class="text-violet-600 py-3">Matchweek {{ $matchweek }}</h2>
                    <section class="grid grid-cols-2 gap-4 text-gray-200">
                        @foreach($matchweekGames as $game)
                            <a href="/games/{{ $game->id }}/week-{{ $game->matchweek }}" class="grid grid-cols-3 items-center border border-sky-900 rounded p-5 hover:bg-violet-900">
                                <div class="col-span-2 border-r border-rose-500 pr-4 my-2">
                                    <div class="flex text-gray-400 justify-between items-center">
                                        <div class="w-10 h-10">
                                            <img src="{{ Storage::url($game->homeTeam->logo) }}" alt="{{ $game->homeTeam->name }}" class="w-full object-cover"/>
                                        </div>
                                        <span>{{ $game->homeTeam->name }}</span>
                                        <span>{{ $game->home_team_score }}</span>
                                    </div>
                                    <div class="flex text-gray-400 justify-between items-center">
                                        <div class="w-10 h-10">
                                            <img src="{{ Storage::url($game->awayTeam->logo) }}" alt="{{ $game->awayTeam->name }}" class="w-full object-cover"/>
                                        </div>
                                        <span>{{ $game->awayTeam->name }}</span>
                                        <span>{{ $game->away_team_score }}</span>
                                    </div>
                                </div>
                                <div class="pl-4 text-sm text-center">
                                    @if(is_null($game->matchdate))
                                        <span>No specified</span>
                                    @else
                                        <span>{{ $game->matchdate }}</span>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </section>
                </div>
            @endforeach
        @else
            <x-not-found name="matches"/>
        @endif


</x-guest-layout>
