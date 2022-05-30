@php
$villa = DB::Table('villas')
    ->where('id', 1)
    ->first();

$rooms = DB::Table('rooms')
    ->where('status', 'Disewakan')
    ->get();
@endphp

<div class="bg-primary px-5 py-10">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-3 gap-8">
            <div>
                <div class="font-extrabold text-xl tracking-wider text-white mb-3">{{ $villa->name }}</div>
                <div class="text-sm italic text-gray-300 tracking-wider">{{ $villa->tagline }}
                </div>
            </div>

            <div>
                <div class="font-extrabold text-lg tracking-wider text-white mb-3">Useful Links</div>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('profile.index') }}" class="text-gray-300">
                            <div class="flex space-x-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="text-sm font-medium tracking-widest">
                                    Profile
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('orders') }}" class="text-gray-300">
                            <div class="flex space-x-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <div class=" text-sm font-medium tracking-widest">
                                    Pesanan
                                </div>
                            </div>
                        </a>
                    </li>

                    @if (session()->get('login') != null)
                        <li class="mb-2">
                            <a href="{{ route('logout') }}" class="text-gray-300">
                                <div class="flex space-x-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <div class=" text-sm font-medium tracking-widest">
                                        Logout
                                    </div>
                                </div>
                            </a>
                        </li>
                    @else
                        <li class="mb-2">
                            <a href="{{ route('login') }}" class="text-gray-300">
                                <div class="flex space-x-1 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    <div class=" text-sm font-medium tracking-widest">
                                        Login
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <div>
                <div class="font-extrabold text-lg tracking-wider text-white mb-3">Contact Info</div>
                <ul>
                    <li class="mb-2">
                        <div class="flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <a href="#" class="text-gray-300 text-sm font-medium tracking-widest">
                                {{ $villa->address }}
                            </a>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="#" class="text-gray-300 text-sm font-medium tracking-widest">
                                081246000550
                            </a>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <a href="#" class="text-gray-300 text-sm font-medium tracking-widest">
                                contact@villa-oemah-biru.com
                            </a>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <a href="#" class="text-gray-300 text-sm font-medium tracking-widest">
                                www.villa-oemah-biru.com
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<hr class="text-white" />

<div class="h-12 bg-primary flex items-center justify-center">

    <div class="text-gray-300 text-sm font-medium tracking-widest">
        &copy; 2022 Villa Oemah Biru Bali. Design by Peken Digital.
    </div>
</div>
