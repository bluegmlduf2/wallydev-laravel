<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->

    <div class="flex justify-between h-10 mt-3">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center justify-center">
                <a href="{{ route('home') }}">
                    <img class="block h-9 w-auto fill-current"
                        src="{{ asset('storage/icon/android-chrome-192x192.png') }}" alt="icon">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('HOME') }}
                </x-nav-link>
                <x-nav-link :href="route('javascript')" :active="request()->routeIs('javascript')">
                    {{ __('JAVASCRIPT') }}
                </x-nav-link>
                <x-nav-link :href="route('php')" :active="request()->routeIs('php')">
                    {{ __('PHP') }}
                </x-nav-link>
                <x-nav-link :href="route('vuejs')" :active="request()->routeIs('vuejs')">
                    {{ __('VUEJS') }}
                </x-nav-link>
                <x-nav-link :href="route('others')" :active="request()->routeIs('others')">
                    {{ __('OTHERS') }}
                </x-nav-link>
                <x-nav-link :href="route('life')" :active="request()->routeIs('life')">
                    {{ __('LIFE') }}
                </x-nav-link>
                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                    {{ __('ABOUT') }}
                </x-nav-link>
            </div>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden md:flex md:items-center md:ml-6">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @auth
                                <div>{{ Auth::user()->name }}</div>
                            @endauth
                            <div>
                                <x-menu-icon />
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if ( Gate::allows('is-admin') )
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Write') }}
                            </x-dropdown-link>                            
                        @endif

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                <x-menu-icon />
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('login')">
                            {{ __('LOGIN') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('register')">
                            {{ __('REGISTER') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center md:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>


    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('HOME') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('javascript')" :active="request()->routeIs('javascript')">
                {{ __('JAVASCRIPT') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('php')" :active="request()->routeIs('php')">
                {{ __('PHP') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('vuejs')" :active="request()->routeIs('vuejs')">
                {{ __('VUEJS') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('others')" :active="request()->routeIs('others')">
                {{ __('OTHERS') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('life')" :active="request()->routeIs('life')">
                {{ __('LIFE') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('ABOUT') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('LOGIN') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('REGISTER') }}
                    </x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
