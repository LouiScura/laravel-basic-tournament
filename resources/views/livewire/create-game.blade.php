<div>
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/admin/teams" method="post" enctype="multipart/form-data" wire:submit="save">

            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="home_team_id">
                    Local Team
                </label>

                <select name="home_team_id" wire:model="form.home_team_id">
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}" @selected(old('home_team_id') == $team->id) wire:key="{{ $team->id }}">
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('form.home_team_id')" class="mt-3" />
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="away_team_id">
                    Away Team
                </label>

                <select name="away_team_id" wire:model="form.away_team_id">
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}" @selected(old('form.away_team_id') == $team->id) wire:key="{{ $team->id }}" >
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('form.away_team_id')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label for="matchdate">Match date: </label>
                <input type="date" id="matchdate" name="matchdate" min="2023-01-01" max="2024-12-31" wire:model.live="form.matchDate" />
            </div>

            <div class="mb-4">
                <label for="matchweek">Match week</label>
                <input type="number" id="matchweek" name="matchweek" min="1" max="10" wire:model="form.matchWeek">
            </div>

            <?php if ($form->matchDate < now()) : ?>
                <div class="mb-4">
                    <label for="home_team_score">Home Team Score</label>
                    <input type="number" id="home_team_score" name="home_team_score" min="0" max="10" wire:model="form.home_team_score">
                </div>

                <div class="mb-4">
                    <label for="away_team_score">Away Team Score</label>
                    <input type="number" id="away_team_score" name="away_team_score" min="0" max="10" wire:model="form.away_team_score">
                </div>
            <?php endif; ?>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 hover:text-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Create Match
                </button>
            </div>

            <div wire:loading>
                Creating match...
            </div>

            @if(session('message'))
                <div class="mt-3 alert alert-{{ session('status') }} bg-opacity-50 text-white font-bold rounded-md p-4">
                    {{ session('message') }}
                </div>
            @endif

        </form>
    </div>
</div>
