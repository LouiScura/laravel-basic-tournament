<div class="h-24 flex items-center bg-[#3F1052]">
    <div class="text-center flex-1">
        @unless(Auth::check())
            <x-nav-link class="uppercase tracking-wide" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Login') }}
            </x-nav-link>
        @endunless

        @auth
            <div class="text-center">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();"
                        class="inline-flex cursor-pointer items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out uppercase tracking-wide">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        @endauth
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link class="uppercase tracking-wide" :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Matches') }}
        </x-nav-link>

        <x-nav-link class="uppercase tracking-wide" :href="route('standings')" :active="request()->routeIs('standings')">
            {{ __('Standings') }}
        </x-nav-link>

        <x-nav-link class="uppercase tracking-wide" :href="route('teams')" :active="request()->routeIs('teams')">
            {{ __('Teams') }}
        </x-nav-link>

        <x-nav-link class="uppercase tracking-wide" :href="route('stats')" :active="request()->routeIs('stats')">
            {{ __('Stats') }}
        </x-nav-link>

        <x-nav-link class="uppercase tracking-wide" :href="route('players')" :active="request()->routeIs('players')">
            {{ __('Players') }}
        </x-nav-link>
    </div>
    <div class="flex-1 text-center">
        @auth
            <x-nav-link class="uppercase tracking-wide" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        @endauth
    </div>
</div>
