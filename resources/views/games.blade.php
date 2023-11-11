<x-guest-layout>
    <h2>Next Games</h2>
    @foreach($games as $game)
        @if($game->matchdate > now())
            <div class="matchinfo">
                <span>{{ $game->homeTeam->name }}</span>
                <span>vs</span>
                <span>{{ $game->awayTeam->name }}</span>
                <span>{{ $game->matchdate }}</span>
                <span class="past-game">{{ $game->matchweek }}</span>
            </div>
        @endif
    @endforeach

</x-guest-layout>
