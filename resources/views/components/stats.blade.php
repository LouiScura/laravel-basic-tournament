@props(['players'])

<h2>hola</h2>

{{--<!-- Display Players with Goals Scored -->--}}
{{--@include('partials.player-statistics-table', [--}}
{{--    'title' => 'Goals',--}}
{{--    'players' => $players->filter(function ($player) {--}}
{{--        return $player->gamePlayerStatistics->whereNotNull('goals_scored')->isNotEmpty();--}}
{{--    }),--}}
{{--    'statistic' => 'goals_scored'--}}
{{--])--}}

{{--<!-- Display Players with Assists -->--}}
{{--@include('partials.player-statistics-table', [--}}
{{--    'title' => 'Assists',--}}
{{--    'players' => $players->filter(function ($player) {--}}
{{--        return $player->gamePlayerStatistics->whereNotNull('assists')->isNotEmpty();--}}
{{--    }),--}}
{{--    'statistic' => 'assists'--}}
{{--])--}}

{{--<!-- Display Players with Yellow Cards -->--}}
{{--@include('partials.player-statistics-table', [--}}
{{--    'title' => 'Yellow Cards',--}}
{{--    'players' => $players->filter(function ($player) {--}}
{{--        return $player->gamePlayerStatistics->whereNotNull('yellow_cards')->isNotEmpty();--}}
{{--    }),--}}
{{--    'statistic' => 'yellow_cards'--}}
{{--])--}}

<!-- Display Players with Red Cards -->
{{--@include('partials.player-statistics-table', [--}}
{{--    'title' => 'Red Cards',--}}
{{--    'players' => $players->filter(function ($player) {--}}
{{--        return $player->gamePlayerStatistics;--}}
{{--    }),--}}
{{--    'statistic' => 'red_cards'--}}
{{--])--}}

<!-- Display Players with Yellow Cards -->
{{--@include('partials.player-statistics-table', [--}}
{{--    'title' => 'Yellow Cards',--}}
{{--    'players' => $players->gamePlayerStatistics->where('goals_scored', '>', 0)->count() > 0,--}}
{{--    'statistic' => 'yellow_cards'--}}
{{--]),--}}


<!-- Display Players with Red Cards -->
{{--@include('partials.player-statistics-table', [--}}
{{--    'title' => 'Red Cards',--}}
{{--    'players' => $player->gamePlayerStatistics->where('red_cards', '>', 0)->count() > 0,--}}
{{--    'statistic' => 'red_cards'--}}
{{--]),--}}
