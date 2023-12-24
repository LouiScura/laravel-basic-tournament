@props(['players'])

<div class="flex">
    <!-- Players  -->
    <div class="mb-6 flex-1">
        <x-input-label for="player" :value="__('Player')" class="pb-3" />
        <select name="player" wire:model="player" class="w-full">
            @foreach ($players as $player)
                <option value="{{ $player->id }}" @if(old('player') == $player->id || !old('player') && $loop->first) selected @endif wire:key="{{ $player->id }}">
                    {{ $player->last_name }}, {{ $player->first_name }}
                </option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('form.away_team_id')" class="mt-3" />
    </div>

    <!-- Yellow Cards  -->
    <div class="mb-6 flex-1">
        <x-input-label for="yellow_cards" :value="__('Yellow Cards')" class="pb-3"/>
        <input type="number" id="yellow_cards" name="yellow_cards" min="1" max="10" wire:model="form.yellow_cards">
    </div>

    <!-- Red Cards  -->
    <div class="mb-6 flex-1">
        <x-input-label for="red_cards" :value="__('Red Cards')" class="pb-3"/>
        <input type="number" id="red_cards" name="red_cards" min="1" max="10" wire:model="form.red_cards">
    </div>

    <!-- Goals Scored  -->
    <div class="mb-6 flex-1">
        <x-input-label for="goals_scored" :value="__('Goals Scored')" class="pb-3"/>
        <input type="number" id="goals_scored" name="goals_scored" min="1" max="10" wire:model="form.goals_scored">
    </div>

    <!-- Assists  -->
    <div class="mb-6 flex-1">
        <x-input-label for="assists" :value="__('Assists')" class="pb-3"/>
        <input type="number" id="assists" name="assists" min="1" max="10" wire:model="form.assists">
    </div>
</div>
