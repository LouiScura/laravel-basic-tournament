<x-guest-layout>
    <div class="relative overflow-x-auto sm:rounded-lg">

        @if($playersWithGoalsScored->isNotEmpty())
            @include('partials.player-statistics-table ', [
                'title' => 'Goals',
                'players' => $playersWithGoalsScored,
                'statistic' => 'goals_scored'
            ])
        @else
            <x-not-found name="Goals"/>
        @endif

        @if($playersWithAssists->isNotEmpty())
            @include('partials.player-statistics-table', [
                'title' => 'Assists',
                'players' => $playersWithAssists,
                'statistic' => 'assists'
            ])
        @else
            <x-not-found name="Assists"/>
        @endif

        @if($playersWithYellowCards->isNotEmpty())
            @include('partials.player-statistics-table', [
                'title' => 'Yellow Cards',
                'players' => $playersWithYellowCards,
                'statistic' => 'yellow_cards'
            ])
        @else
            <x-not-found name="Yellow Cards"/>
        @endif

        @if($playersWithRedCards->isNotEmpty())
            @include('partials.player-statistics-table', [
                'title' => 'Red Cards',
                'players' => $playersWithRedCards,
                'statistic' => 'red_cards'
            ])
        @else
            <x-not-found name="Red Cards"/>
        @endif



    </div>

</x-guest-layout>
