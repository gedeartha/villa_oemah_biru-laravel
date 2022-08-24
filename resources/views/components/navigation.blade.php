<div class="fixed w-64 h-screen bg-white shadow-md">
    <div class="overflow-y-auto py-4 px-3 rounded">
        <a href="{{ route('admin.profile.index') }}" class="flex items-center pl-2.5 mb-6">
            <img src="/image/logo.svg" class="h-6 mr-3 sm:h-7" alt="Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-primary">Villa Oemah Biru</span>
        </a>
        <ul class="space-y-2">
            {{-- <li>
                <x-nav-link :href="route('dashboard')" :active="request()->getRequestUri() == '/admin'">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </x-nav-link>
            </li> --}}

            <li>
                <x-nav-link :href="route('admin.profile.index')" :active="request()->getRequestUri() == '/admin/profile'">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-4">Profile</span>
                </x-nav-link>
            </li>

            <li>
                <x-nav-link :href="route('admin.users.index')" :active="request()->getRequestUri() == '/admin/users'">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <span class="ml-4">List Pelanggan</span>
                </x-nav-link>
            </li>

            <li>
                <button type="button"
                    class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-tertiary hover:font-semibold hover:text-gray-900"
                    aria-controls="dropdown-facilities" data-collapse-toggle="dropdown-facilities">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span class="flex-1 ml-4 text-left whitespace-nowrap" sidebar-toggle-item>Fasilitas</span>

                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <x-ul-link id="dropdown-facilities" :active="request()->getRequestUri() == '/admin/facilities' or
                    request()->getRequestUri() == '/admin/facilities/add'">
            <li>
                <x-nav-link :href="route('admin.facilities.index')" :active="request()->getRequestUri() == '/admin/facilities'">
                    <div class="pl-11 ">
                        List Fasilitas</div>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.facilities.add')" :active="request()->getRequestUri() == '/admin/facilities/add'">
                    <div class="pl-11 ">
                        Tambah Fasilitas</div>
                </x-nav-link>
            </li>
            </x-ul-link>
            </li>

            <li>
                <button type="button"
                    class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-tertiary hover:font-semibold hover:text-gray-900"
                    aria-controls="dropdown-admin" data-collapse-toggle="dropdown-addons">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                    </svg>

                    <span class="flex-1 ml-4 text-left whitespace-nowrap" sidebar-toggle-item>Fasilitas Extra</span>

                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <x-ul-link id="dropdown-addons" :active="request()->getRequestUri() == '/admin/addons' or
                    request()->getRequestUri() == '/admin/addons/add'">
            <li>
                <x-nav-link :href="route('admin.addons.index')" :active="request()->getRequestUri() == '/admin/addons'">
                    <div class="pl-11 ">
                        List Fasilitas Extra</div>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.addons.add')" :active="request()->getRequestUri() == '/admin/addons/add'">
                    <div class="pl-11 ">
                        Tambah Fasilitas Extra</div>
                </x-nav-link>
            </li>
            </x-ul-link>
            </li>

            @if (session()->get('role') == 'owner')
                <li>
                    <button type="button"
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-tertiary hover:font-semibold hover:text-gray-900"
                        aria-controls="dropdown-admin" data-collapse-toggle="dropdown-admin">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                        </svg>
                        <span class="flex-1 ml-4 text-left whitespace-nowrap" sidebar-toggle-item>Admin</span>

                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <x-ul-link id="dropdown-admin" :active="request()->getRequestUri() == '/admin/admins' or
                        request()->getRequestUri() == '/admin/admins/add'">
                <li>
                    <x-nav-link :href="route('admin.admins.index')" :active="request()->getRequestUri() == '/admin/admins'">
                        <div class="pl-11 ">
                            List Admin</div>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('admin.admins.add')" :active="request()->getRequestUri() == '/admin/admins/add'">
                        <div class="pl-11 ">
                            Tambah Admin</div>
                    </x-nav-link>
                </li>
                </x-ul-link>
                </li>
            @endif

            <li>
                <button type="button"
                    class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-tertiary hover:font-semibold hover:text-gray-900"
                    aria-controls="dropdown-villa" data-collapse-toggle="dropdown-villa">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="flex-1 ml-4 text-left whitespace-nowrap" sidebar-toggle-item>Villa</span>

                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <x-ul-link id="dropdown-villa" :active="request()->getRequestUri() == '/admin/villa' or
                    request()->getRequestUri() == '/admin/villa/rooms' or
                    request()->getRequestUri() == '/admin/villa/rooms/add'">
            <li>
                <x-nav-link :href="route('admin.villa.index')" :active="request()->getRequestUri() == '/admin/villa'">
                    <div class="pl-11 ">
                        Edit Informasi</div>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.villa.rooms.index')" :active="request()->getRequestUri() == '/admin/villa/rooms'">
                    <div class="pl-11 ">
                        List Kamar</div>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.villa.rooms.add')" :active="request()->getRequestUri() == '/admin/villa/rooms/add'">
                    <div class="pl-11 ">
                        Tambah Kamar</div>
                </x-nav-link>
            </li>
            </x-ul-link>
            </li>

            <li>
                <x-nav-link :href="route('admin.reservations.index')" :active="request()->getRequestUri() == '/admin/reservations'"><svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    <span class="ml-4">Riwayat Order</span>
                </x-nav-link>
            </li>

            <li>
                <x-nav-link :href="route('admin.reviews.index')" :active="request()->getRequestUri() == '/admin/reviews'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>

                    <span class="ml-4">Riwayat Ulasan</span>
                </x-nav-link>
            </li>

            <li>
                <a href="{{ route('admin.logout') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-tertiary hover:font-semibold group">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="ml-4">Logout</span>
                </a>
            </li>

        </ul>
    </div>
</div>
