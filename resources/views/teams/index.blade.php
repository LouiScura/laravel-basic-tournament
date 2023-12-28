<x-guest-layout>
    <x-index-wrapper :items="$teams" itemName="teams">
        <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-14 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 xl:grid-cols-4">
            @foreach($teams as $team)
                <li>
                    <img class="aspect-[14/13] w-full rounded-2xl object-cover" src="/storage/{{ $team->logo }}" alt="Team">
                    <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-white">{{ $team->name }}</h3>
                    <p class="text-sm leading-6 text-gray-500">{{ $team->town }}</p>
                </li>
            @endforeach
        </ul>
    </x-index-wrapper>
</x-guest-layout>   
