<h2 class="py-5 text-white text-lg mt-5">{{ $title }}</h2>
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-5">
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
                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/20?u={{ $player->id }}" alt="{{ $player->first_name }}{{ $player->last_name }}">
                <div class="ps-3">
                    <div class="text-base font-semibold">{{ $player->first_name }} {{ $player->last_name }}</div>
                </div>
            </th>
            @foreach ($player->gamePlayerStatistics as $stat)
                <td class="px-6 py-4">
                    {{ $stat->$statistic }}
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
