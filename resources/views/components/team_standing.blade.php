@props(['teams', 'tournament'])

<div class="py-4 text-center">
    <!-- Component Start -->
    <h1 class="text-lg text-gray-400 font-medium">2023-24 Season - {{ $tournament->name }}</h1>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full text-sm text-gray-400">
                        <thead class="bg-gray-800 text-xs uppercase font-medium">
                        <tr>
                            <th></th>
                            <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                Club
                            </th>
                            <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                MP
                            </th>
                            <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                W
                            </th>
                            <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                D
                            </th>
                            <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                L
                            </th>
                            <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                GF
                            </th>
                            <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                GA
                            </th>
                            <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                Pts
                            </th>
                        </tr>
                        </thead>
                        @foreach ($teams as $team)
                            <tbody class="bg-gray-800">
                                <tr class="bg-black bg-opacity-20">
                                <td class="pl-4">
                                    1
                                </td>
                                <td class="flex px-6 py-4 whitespace-nowrap">
                                    <img class="w-5" src="https://ssl.gstatic.com/onebox/media/sports/logos/udQ6ns69PctCv143h-GeYw_48x48.png" alt="">
                                    <span class="ml-2 font-medium">{{ $team->name }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    17
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    11
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    3
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    3
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    34
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    24
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    10
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Component End  -->
</div>
