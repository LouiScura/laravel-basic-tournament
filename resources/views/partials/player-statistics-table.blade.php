<h2 class="py-5 text-white text-2xl mt-5">{{ $title }}</h2>
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-5 px-6">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
            Player Name
        </th>
        <th scope="col" class="px-6 py-3">
            {{ $title }}
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($players as $player)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white ">
                @if( $player->avatar )
                    <img class="w-10 h-10 rounded-full" src="/storage/{{ $player->avatar }}" alt="">
                @endif
                <div class="ps-3">
                    <div class="text-base font-semibold">{{ $player->first_name }} {{ $player->last_name }}</div>
                    <div class="text-base font-semibold text-gray-700">{{ $player->team->name }}</div>
                </div>
            </th>

            <td class="px-6 py-4">
                {{ $player->{$stat} }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
