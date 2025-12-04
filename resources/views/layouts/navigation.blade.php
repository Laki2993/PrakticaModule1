<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    
<div style="width: 100%; height: 50px; background-color: #171717; display: flex; justify-content: space-around; align-items: center; border-style: none;">
    <img src="{{ asset('uploads/logo.png') }}" alt="logo">
    <a href="{{ route('dashboard') }}" style="color:white; background-color: #171717">course</a>
    <a href="#" style="color:white; background-color: #171717">Blog</a>
    <a href="#" style="color:white; background-color: #171717">about</a>
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button  style="color:white; background-color: #171717">
                <div id="Name">{{ Auth::user()->name }}</div>
                <div class="ms-1"></div>
            </button>
        </x-slot>
        <x-slot name="content">
            <section style="display:grid; justify-content: space-around; align-items: center;  border-style: none;">
<a id="AdminPage" href="{{ route('admin') }}">
    {{ __('Admin Page') }}
</a>
<x-dropdown-link style="display:grid; justify-content: space-around; align-items: center;  border-style: none;"  :href="route('profile.edit')">
    {{ __('Profile') }}
</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
            </section>
        </x-slot>
    </x-dropdown>
</div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">

                </button>
            </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
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
        </div>
    </div>
</nav>
