<div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-5">
    <h1 class="text-2xl text-green-50 pt-5 pb-4">Create a match</h1>
    <form method="post" enctype="multipart/form-data" wire:submit="save">

        @csrf

        @if(session('message'))
            <div class="mb-3 alert bg-green-500 bg-opacity-50 text-white font-bold rounded-md p-3">
                {{ session('message') }}
            </div>
        @endif

        <div class="text-sm text-yellow-400 pb-3" wire:loading>
            Creating match...
        </div>

        <!-- Local Name -->
        <div class="mb-6">
            <x-input-label for="home_team_id" :value="__('Local Team')" class="pb-3" />
            <select name="home_team_id" wire:model="form.home_team_id" class="w-full">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" @selected(old('home_team_id') == $team->id) wire:key="{{ $team->id }}">
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('form.home_team_id')" class="mt-3" />
        </div>

        <!-- Away Name -->
        <div class="mb-6">
            <x-input-label for="away_team_id" :value="__('Away Team')" class="pb-3" />
            <select name="away_team_id" wire:model="form.away_team_id" class="w-full">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" @if(old('away_team_id') == $team->id || !old('away_team_id') && $loop->first) selected @endif wire:key="{{ $team->id }}">
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('form.away_team_id')" class="mt-3" />
        </div>

        <!-- Match date  -->
        <div class="mb-6">
            <x-input-label for="matchdate" :value="__('Match date')" class="pb-3"/>
            <input class="w-full" type="date" id="matchdate" name="matchdate" min="2023-01-01" max="2024-12-31" wire:model.live="form.matchDate" />
        </div>

        <div class="flex w-6/12">
            <!-- Match week  -->
            <div class="mb-6 flex-1">
                <x-input-label for="matchweek" :value="__('Match week')" class="pb-3"/>
                <input type="number" id="matchweek" name="matchweek" min="1" max="10" wire:model="form.matchWeek">
            </div>

            <?php if ($form->matchDate < now()) : ?>
            <div class="mb-6 flex-1">
                <x-input-label for="home_team_score" :value="__('Home Team Score')" class="pb-3"/>
                <input type="number" id="home_team_score" name="home_team_score" min="1" max="10" wire:model="form.home_team_score">
            </div>

            <div class="mb-6 flex-1 ">
                <x-input-label for="away_team_score" :value="__('Away Team Score')" class="pb-3"/>
                <input type="number" id="away_team_score" name="away_team_score" min="1" max="10" wire:model="form.away_team_score">
            </div>
            <?php endif; ?>
        </div>

        <div class="flex items-center justify-between">
            <x-primary-button class="mt-4 mb-8">
                {{ __('Create Team') }}
            </x-primary-button>
        </div>


    </form>
</div>

