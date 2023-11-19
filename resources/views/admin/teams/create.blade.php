{{--<x-app-layout>--}}
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/admin/teams" method="post" enctype="multipart/form-data">

                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="team_name">
                        Team Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="team_name"
                           name="team_name"
                           type="text"
                           placeholder="Team Name" value="{{ old('team_name') }}">
                    <x-input-error :messages="$errors->get('team_name')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="team_town">
                        Team Town
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           id="team_town"
                           type="text"
                           name="team_town"
                           placeholder="Team Town">
                    <x-input-error :messages="$errors->get('team_town')" class="mt-2" />
                </div>
                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="team_logo">Upload Team Logo</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           id="team_logo"
                           name="team_logo"
                           type="file">
                    <x-input-error :messages="$errors->get('team_logo')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 hover:text-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Create Team
                    </button>
                </div>

                @if(session('message'))
                    <div class="mt-3 alert alert-{{ session('status') }} bg-opacity-50 text-white font-bold rounded-md p-4">
                        {{ session('message') }}
                    </div>
                @endif

            </form>
        </div>
{{--</x-app-layout>--}}
