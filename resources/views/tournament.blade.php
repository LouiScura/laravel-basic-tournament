<x-guest-layout>
        <div class="flex items-center justify-center bg-gray-900">
            <div class="col-span-12">
                <ul class="text-gray-500 text-center">
                    @foreach($tournaments as $tournament)
                        <li class="py-3 text-green-300">{{ $tournament->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
</x-guest-layout>
