<x-guest-layout>

    <x-nav-games></x-nav-games>

    <div class="flex items-center justify-center bg-gray-900">
        <div class="col-span-12">
            <ul class="text-gray-500 text-center">
                @foreach($matchweeks as $matchweek)
                    <li class="py-3 text-red-300">
                        <a href="{{ route('single_matchweek', ['matchweek' => $matchweek]) }}">
                            Matchweek {{ $matchweek }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-guest-layout>
