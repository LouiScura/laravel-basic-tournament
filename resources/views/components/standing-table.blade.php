@props(['standings'])
<div class="text-white h-full bg-gray-900">
    <h1 class="text-3xl font-bold tracking-tight text-white sm:text-4xl text-center py-8">Premier League 2023</h1>
    <div class="py-8">
        <div class="max-w-screen-xl px-2 mx-auto">
            <table class="w-full text-base">
                <thead>
                    <tr class="border-b border-gray-600">
                        <th class="text-left p-1 pb-2">&nbsp;</th>
                        <th class="text-left p-1 pb-2"><abbr title="Teams in Competition">TEAM</abbr></th>
                        <th class="text-center p-1 pb-2"><abbr title="Games Played">PLD</abbr></th>
                        <th class="text-center p-1 pb-2"><abbr title="Games Won">WON</abbr></th>
                        <th class="text-center p-1 pb-2"><abbr title="Games Drawn">DRN</abbr></th>
                        <th class="text-center p-1 pb-2"><abbr title="Games Lost">LST</abbr></th>
                        <th class="text-center p-1 pb-2 hidden lg:table-cell"><abbr title="Goals For">FOR</abbr></th>
                        <th class="text-center p-1 pb-2 hidden lg:table-cell"><abbr title="Goals Against">AG</abbr></th>
                        <th class="text-center p-1 pb-2"><abbr title="Points">PTS</abbr></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($standings as $standing)
                        <tr class="{{ $loop->odd ? 'bg-gray-900 bg-opacity-30' : '' }}">
                            <td class="text-left p-1">{{ $loop->iteration }}</td>
                            <td class="text-left p-1"><span class="hidden md:inline">{{ $standing->team->name }}</span></td>
                            <td class="text-center p-1">{{ $standing->games_played }}</td>
                            <td class="text-center p-1">{{ $standing->wins }}</td>
                            <td class="text-center p-1">{{ $standing->draws }}</td>
                            <td class="text-center p-1">{{ $standing->losses }}</td>
                            <td class="text-center p-1 hidden lg:table-cell">{{ $standing->goals_scored }}</td>
                            <td class="text-center p-1 hidden lg:table-cell">{{ $standing->goals_conceded }}</td>
                            <td class="text-center p-1">{{ $standing->points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
