@props(['players'])

<div class="flex">
    <!-- Players  -->
    <div x-data="{ new_players: @entangle('new_players') }">
        <template x-for="(playerStat, index) in new_players" :key="index">
            <div class="mt-5">
                <input type="number" name="goals_scored" x-model="playerStat.goals_scored" placeholder="Goals Scored">
                <input type="number" x-model="playerStat.yellow_cards" placeholder="Yellow Cards">
                <input type="number" x-model="playerStat.red_cards" placeholder="Red Cards">
                <input type="number" x-model="playerStat.assists" placeholder="Assists">
                <select x-model="playerStat.player_id">
                    <!-- Loop over $players for options -->
                    @foreach ($players as $optionPlayer)
                        <option value="{{ $optionPlayer->id }}">{{ $optionPlayer->first_name }} {{ $optionPlayer->last_name }}</option>
                    @endforeach
                </select>
                <button type="button"
                        @click="new_players.splice(index, 1)"
                        class="inline-flex items-center px-4 py-2 mt-3 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Remove
                </button>
            </div>
        </template>

        <button type="button"
                class="px-4 py-2 mt-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                @click="new_players.push({ player_id: '', goals_scored: null, yellow_cards: null, red_cards: null, assists: null })">
            Add Player Stats
        </button>
    </div>

</div>
