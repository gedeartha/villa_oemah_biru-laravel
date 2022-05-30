<x-layouts.home>
    <x-user.navigation />

    <div class="h-[20vh] bg-biru flex items-center justify-center">
        <div class="font-extrabold text-4xl tracking-wider text-white">Rooms</div>
    </div>

    <div class="bg-tertiary -mt-4">
        <div class="max-w-5xl mx-auto my-4 py-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-8">
                    <x-card>
                        <div class="p-4">

                            <div class="mb-6">
                                <div class="font-bold text-xl text-primary">{{ $villa->name }} - {{ $room->name }}
                                </div>
                                <div class="flex mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <div class="ml-1">
                                        <div class="text-gray-500 text-sm font-medium tracking-wider">
                                            {{ $villa->address }}</div>
                                    </div>
                                </div>
                            </div>

                            <div id="indicators-carousel" class="relative" data-carousel="static">

                                <div class="overflow-hidden relative h-48 rounded-lg sm:h-64 xl:h-80 2xl:h-96">

                                    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20"
                                        data-carousel-item="active">
                                        <img src="{{ Storage::url('rooms/') . $room->image1 }}"
                                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                            alt="...">
                                    </div>

                                    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10"
                                        data-carousel-item="">
                                        <img src="{{ Storage::url('rooms/') . $room->image2 }}"
                                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                            alt="...">
                                    </div>
                                </div>

                                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                                    <button type="button" class="w-3 h-3 rounded-full bg-white dark:bg-gray-800"
                                        aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                    <button type="button"
                                        class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                                        aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                </div>

                                <button type="button"
                                    class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                                    data-carousel-prev="">
                                    <span
                                        class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                        <span class="hidden">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                                    data-carousel-next="">
                                    <span
                                        class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span class="hidden">Next</span>
                                    </span>
                                </button>
                            </div>

                            <div class="">

                                <div class="font-extrabold tracking-wider text-2xl text-primary my-4">
                                    Rp {{ number_format($room->price, 0, ',', '.') }}/malam</div>

                                <div class="font-bold text-lg text-primary mt-4 mb-2">Fasilitas</div>

                                <div class="grid grid-cols-5 gap-x-10 gap-y-4">

                                    @php
                                        $roomFacilities = DB::Table('room_facilities')
                                            ->where('room_id', $room->id)
                                            ->get();
                                    @endphp

                                    @foreach ($roomFacilities as $roomFacility)
                                        @php
                                            $facilities = DB::Table('facilities')
                                                ->where('id', $roomFacility->facilities_id)
                                                ->first();
                                        @endphp
                                        <div>
                                            <img src="{{ Storage::url('facilities/') . $facilities->icon }}"
                                                class="h-10 mx-auto" alt="{{ $facilities->name }}">

                                            <div
                                                class="mt-2 text-gray-500 text-center text-sm font-normal tracking-wider">
                                                {{ $facilities->name }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </x-card>
                </div>
                <div class="col-span-4">
                    <x-card>
                        <form action="/rooms/{{ $room->id }}/checkout" method="POST">
                            @csrf

                            <div class="p-4">
                                <div class="font-bold text-lg text-primary">Booking Kamar Ini</div>

                                <hr class="my-2 mb-4" />

                                {{-- Warning Alert --}}
                                @if (session('warning'))
                                    <div class="flex p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg"
                                        role="alert">
                                        <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <span class="font-medium">Warning!</span> {{ session('warning') }}
                                        </div>
                                    </div>
                                @endif
                                {{-- Warning Alert --}}

                                <div class="mb-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                        Check
                                        In</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker type="text" name="check_in"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            placeholder="Pilih Tanggal" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                        Check
                                        Out</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input datepicker type="text" name="check_out"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                            placeholder="Pilih Tanggal" required>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit"
                                        class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cek
                                        Ketersediaan</button>
                                </div>
                            </div>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </div>

    <x-user.footer />
</x-layouts.home>
