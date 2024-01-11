<x-app-layout>
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-5 gap-x-8 pb-4">

        <x-breadcrumbs />

        @if(session('message'))
            <div class="mb-3 alert bg-red-600 bg-opacity-50 text-gray-700 font-bold rounded-md p-3">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex justify-between items-center">
            <h1 class="text-2xl text-green-50 py-5">Teams</h1>

            <a href="{{ route('teams.create') }}" class="rounded bg-gray-800 p-4 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400">
                Create new team
            </a>

        </div>
        @if($teams->isNotEmpty())
            @foreach($teams as $team)
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 my-3 {{ ( $loop->last ) ? 'pb-5' : ''}}">
                    <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400 justify-between">
                        <div class="flex-shrink-0 pr-4">
                            <img class="h-10 w-10 rounded-full" src="/storage/{{ $team->logo }}" alt="">
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ $team->name }}</p>
                            <p class="truncate text-sm text-gray-500">{{ $team->town }}</p>
                        </div>
                        <div>
                            <div>
                                <a href="{{ route('teams.edit', $team) }}" class="test px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Edit team
                                </a>
                            </div>
                            <div class="my-2">
                                <form action="{{ route('teams.destroy', $team) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>
                                        Delete
                                    </x-danger-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <x-not-found name="Teams"/>
        @endif

    </div>
</x-app-layout>
