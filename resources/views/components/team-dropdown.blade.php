@props(['teams'])

<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="rounded bg-gray-800 p-4 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400">Filter by teams</button>
    </x-slot>

    <x-slot name="content">

        <x-dropdown-item href="{{ route('players.index') }}" class="text-white">All players</x-dropdown-item>

        @foreach ($teams as $team)
            <x-dropdown-item
                href="{{ route('players.index') }}/?team={{ strtolower($team->name) }}"
                :active='request()->fullUrlIs("*?team={$team->name}*")'
            >
                {{ ucwords($team->name) }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>
