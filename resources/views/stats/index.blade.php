<x-guest-layout>
    <div class="relative overflow-x-auto sm:rounded-lg px-6 mb-5">

        @if($playersWithGoalsScored->isNotEmpty())
            @include('partials.player-statistics-table ', [
                'title' => 'Most Goals',
                'players' => $playersWithGoalsScored,
                'stat'  => 'total_goals',
            ])
        @else
            <x-not-found name="Goals"/>
        @endif

        @if($playersWithAssists->isNotEmpty())
            @include('partials.player-statistics-table', [
                'title' => 'Most Assists',
                'players' => $playersWithAssists,
                'stat'  => 'total_assists',
            ])
        @else
            <x-not-found name="Assists"/>
        @endif

        @if($playersWithYellowCards->isNotEmpty())
            @include('partials.player-statistics-table', [
                'title' => 'Most Yellow Cards',
                'players' => $playersWithYellowCards,
                'stat'  => 'total_yellow_cards',
            ])
        @else
            <x-not-found name="Yellow Cards"/>
        @endif

        @if($playersWithRedCards->isNotEmpty())
            @include('partials.player-statistics-table', [
                'title' => 'Most Red Cards',
                'players' => $playersWithRedCards,
                'stat'  => 'total_red_cards',
            ])
        @else
            <x-not-found name="Red Cards"/>
        @endif



    </div>

</x-guest-layout>
