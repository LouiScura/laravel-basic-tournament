@props(['statistics'])
<h1 class="text-center text-yellow-500 text-lg py-2">Game Statistics</h1>
@foreach($statistics as $single_statistics)
    <div class="container mx-auto px-20">
        <div class="flex flex-col w-full" style="cursor: auto;">
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 my-2 w-full">
                <div class="metric-card bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 max-w-72 w-full" style="cursor: auto;">
                    <a aria-label="Unsplash Downloads" target="_blank" rel="noopener noreferrer" href="https://stackdiary.com/">
                        <div class="flex items-center text-gray-900 dark:text-gray-100" style="cursor: auto;">Player Name</div>
                    </a>
                    <p class="mt-2 text-xl font-bold spacing-sm text-black dark:text-white" style="cursor: auto;">
                        {{ $single_statistics->player->first_name }}
                        {{ $single_statistics->player->last_name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach
