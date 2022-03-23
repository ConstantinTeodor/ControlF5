<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <style>
    #overlay {
    position: fixed; /* Sit on top of the page content */
    display: none; /* Hidden by default */
    width: 100%; /* Full width (cover the whole page) */
    height: 100%; /* Full height (cover the whole page) */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #f5c518; /* Black background with opacity */
    z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
    cursor: pointer; /* Add a pointer on hover */
    }
    </style>
    <style>
        #text{
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center;
            font-size: 25px;
            color: black;
            transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
        }
    </style>
    <script>
        function on() {
            document.getElementById("overlay").style.display = "block";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>
    <div id="overlay">
        <div>
            <button onclick="off()">
                <div class="pt-4 pl-4">
                    <i class="fa-solid fa-arrow-left text-black fa-2x"></i>
                </div>
            </button>
            <div id="text">
                This is a full screen menu! <br>
                <br>
                Close me from the <br>
                upper "Back Arrow"
            </div>
        </div>
    </div>


    <div class="overlay" id="overlay">
        <div style="background-color: #f5c518"></div>
    </div>
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8" style="background-color:#f5c518">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <button onclick="on()" >
                        <div class="ml-1"><i class="fa-solid fa-bars text-white fa-2x"></i></div>
                    </button>
                </div>
            </div>

            <div>
                <img src="/Images/logo-imdb.png" style="max-height: 60px; margin-bottom: 15px">
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div><i class="fa-solid fa-user text-white fa-2x"></i></div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
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
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <div><i class="fa-solid fa-user text-white fa-2x"></i></div>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('IMDb') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
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
