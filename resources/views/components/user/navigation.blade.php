<div class="shadow-md bg-white">
    <div class="max-w-7xl mx-auto">
        <nav class="px-2 border-gray-200 sha">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="/image/logo.svg" class="mr-3 h-20" alt="Logo">
                    <span class="self-center text-xl font-bold text-primary whitespace-nowrap">Villa Oemah Biru
                        Bali</span>
                </a>
                <button data-collapse-toggle="mobile-menu" type="button"
                    class="inline-flex items-center justify-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <x-user.nav-link :href="route('home')" :active="request()->getRequestUri() == '/'">
                                Home
                            </x-user.nav-link>
                        </li>
                        <li>
                            <x-user.nav-link :href="route('orders')" :active="request()->getRequestUri() == '/orders'">
                                Pesanan
                            </x-user.nav-link>
                        </li>

                        @if (session()->get('login') != null)
                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">

                                    {{ session()->get('name') }}
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>

                                <div id="dropdownNavbar"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44"
                                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(885.455px, 2224.55px, 0px);"
                                    data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('profile.index') }}"
                                                class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="{{ route('logout') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li>
                                <x-user.nav-link :href="route('login')">
                                    Login
                                </x-user.nav-link>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
