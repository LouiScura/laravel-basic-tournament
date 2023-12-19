<x-guest-layout>

        @if($games->isNotEmpty())
            @php
                $groupedGames = $games
                    ->groupBy('matchweek');

                $sortedGames = $groupedGames
                    ->sortKeys();
            @endphp

            <div class="container mx-auto px-4 sm:px-8">

                @foreach($sortedGames as $matchweek => $matchweekGames)
                    <div class="{{ $loop->first ? 'py-4 pb-4' : 'py-2'}}">
                        <div>
                            <h2 class="text-xl font-semibold leading-tight">Matchweek {{ $matchweek }}</h2>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            HOME
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Res.
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Res.
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Away
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Date
                                        </th>
                                    </tr>
                                    </thead>
                                    @foreach($matchweekGames as $game)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-10 h-10 hidden sm:table-cell">
                                                        <img class="w-full h-full rounded-full"
                                                             src="{{ Storage::url($game->homeTeam->logo) }}"
                                                             alt="" />
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $game->homeTeam->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap text-center">{{ $game->home_team_score }}</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                                    {{ $game->away_team_score }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                                <div class="flex items-center float-right">
                                                    <div class="mr-3">
                                                        <p class="text-gray-900 whitespace-no-wrap text-right">
                                                            {{ $game->awayTeam->name }}
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 w-10 h-10 hidden sm:table-cell">
                                                        <img class="w-full h-full rounded-full"
                                                             src="{{ Storage::url($game->awayTeam->logo) }}"
                                                             alt="" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                                    @if(is_null($game->matchdate))
                                                        <span>No specified</span>
                                                    @else
                                                        <span>{{ $game->matchdate }}</span>
                                                    @endif
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <x-not-found name="matches"/>
        @endif


</x-guest-layout>
