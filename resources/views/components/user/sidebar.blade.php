<div class="w-full bg-white shadow-sm rounded-2xl">
    <div class="overflow-y-auto py-4 px-3">
        <ul class="space-y-2">
            <li>
                <x-user.side-link :href="route('profile.index')" :active="request()->getRequestUri() == '/profile'">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-3">Informasi Pribadi</span>
                </x-user.side-link>
            </li>

            <li>
                <x-user.side-link :href="route('profile.password')" :active="request()->getRequestUri() == '/profile/password'">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-3">Ganti Password</span>
                </x-user.side-link>
            </li>
        </ul>
    </div>
</div>
