<x-guest-layout>
    @if($standings->isNotEmpty())
        <x-standing-table :standings="$standings"/>
    @else
        <x-not-found name="standings"/>
    @endif
</x-guest-layout>
