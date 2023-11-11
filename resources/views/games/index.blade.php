<x-guest-layout>

    <x-nav-games/>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            @if(isset($displayType))
                <h2 class="text-center text-green-500 text-lg">{{ $displayType }} Games</h2>
            @endif

            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light text-blue-500">
                        <x-nav-games-table/>
                        <tbody>
                        @foreach($games as $game)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $game->matchweek }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $game->matchdate }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
