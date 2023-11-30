<div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-5">
    <h1 class="text-2xl text-green-50 pt-5 pb-4">Create a Player</h1>
    <form method="post" enctype="multipart/form-data" wire:submit="save">

        @csrf

        @if(session('message'))
            <div class="mb-3 alert bg-green-500 bg-opacity-50 text-white font-bold rounded-md p-3">
                {{ session('message') }}
            </div>
        @endif

        <div class="text-sm text-yellow-400 pb-3" wire:loading>
            Creating player...
        </div>

        <!-- Team -->
        <div class="mb-6">
            <x-input-label for="team_id" :value="__('Team')" class="pb-3" />
            <select name="team_id" wire:model="form.team_id" class="w-full">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" @selected(old('team_id') == $team->id) wire:key="{{ $team->id }}">
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('form.team_id')" class="mt-3" />
        </div>

        <!-- First Name -->
        <div class="mb-6">
            <x-input-label for="first_name" :value="__('First Name')" class="pb-3" />

            <x-text-input id="first_name" class="w-full"
                          type="text"
                          name="first_name" wire:model="form.first_name" required/>

            <x-input-error :messages="$errors->get('form.first_name')" class="mt-3" />
        </div>

        <!-- Last Name -->
        <div class="mb-6">
            <x-input-label for="last_name" :value="__('Last Name')" class="pb-3" />

            <x-text-input id="last_name" class="w-full"
                          type="text"
                          name="last_name" wire:model="form.last_name" required/>

            <x-input-error :messages="$errors->get('form.last_name')" class="mt-3" />
        </div>

        <!-- Position -->
        <div class="mb-6">
            <x-input-label for="position" :value="__('Position')" class="pb-3" />

            <x-text-input id="position" class="w-full"
                          type="text"
                          name="position" wire:model="form.position" required/>

            <x-input-error :messages="$errors->get('form.position')" class="mt-3" />
        </div>

        <!-- Age  -->
        <div class="mb-6">
            <x-input-label for="age" :value="__('Age')" class="pb-3"/>
            <input type="number" id="age" name="age" min="18" max="42" wire:model="form.age">

            <x-input-error :messages="$errors->get('form.age')" class="mt-3" />
        </div>

        <!-- Avatar -->
        <div class="mb-4">
            <x-input-label class="pb-1" for="avatar" :value="__('Player Avatar')" />
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                   id="avatar"
                   name="avatar"
                   type="file"
                   wire:model="form.avatar">
            <x-input-error :messages="$errors->get('form.avatar')" class="mt-2" />

            @error('form.image.*')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror

            @error('form.avatar.*') <span class="error">{{ $message }}</span> @enderror
        </div>


        <div class="flex items-center justify-between">
            <x-primary-button class="mt-4 mb-8">
                {{ __('Create Player') }}
            </x-primary-button>
        </div>

    </form>
</div>

