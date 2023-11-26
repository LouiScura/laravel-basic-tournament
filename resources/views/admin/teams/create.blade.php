<x-app-layout>
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-5">
        <h1 class="text-2xl text-green-50 py-5">Create a team</h1>
        <form action="/admin/teams" method="post" enctype="multipart/form-data">

            @csrf

            @if(session('message'))
                <div class="my-3 alert bg-green-500 bg-opacity-50 text-white font-bold rounded-md p-3">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Team Name -->
            <div class="mb-6">
                <x-input-label for="team_name" :value="__('Team Name')" />
                <x-text-input id="team_name" class="block mt-1 w-full" type="text" name="team_name" :value="old('team_name')" required autofocus autocomplete="team_name" />
                <x-input-error :messages="$errors->get('team_name')" class="mt-2" />
            </div>

            <!-- Team Town -->
            <div class="mb-6">
                <x-input-label for="team_town" :value="__('Team Town')" />
                <x-text-input id="team_town" class="block mt-1 w-full" type="text" name="team_town" :value="old('team_town')" required autofocus autocomplete="team_town" />
                <x-input-error :messages="$errors->get('team_town')" class="mt-2" />
            </div>

            <!-- Team Logo -->
            <div class="mb-4">
                <x-input-label class="pb-1" for="team_logo" :value="__('Team Logo')" />
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                       id="team_logo"
                       name="team_logo"
                       type="file">
                <x-input-error :messages="$errors->get('team_logo')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">
                {{ __('Create Team') }}
            </x-primary-button>

        </form>
    </div>

</x-app-layout>
