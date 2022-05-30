<x-layouts.base>
    <div>
        <div>
            <div class="font-bold text-xl text-primary tracking-wider mb-6">Edit Kamar</div>
        </div>

        <div class="grid grid-cols-12 gap-x-4">
            <div class="col-span-7">
                <x-card>
                    <form class="p-6" action="{{ $room->id }}/update" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        @if (session('success'))
                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                role="alert">
                                <span class="font-medium">Success!</span> {{ session('success') }}
                            </div>
                        @endif

                        @if (session('warning'))
                            <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                role="alert">
                                <span class="font-medium">Failed!</span> {{ session('warning') }}
                            </div>
                        @endif

                        <div class="grid grid-cols-12 gap-y-4">

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Nama Kamar</div>
                            </div>
                            <div class="col-span-8">
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $room->name }}" required>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Fasilitas</div>
                            </div>
                            <div class="col-span-8">
                                <div class="grid grid-cols-3 gap-4">

                                    @php
                                        $facilities = DB::Table('facilities')
                                            ->where('status', '!=', 'Tidak Aktif')
                                            ->get();
                                        
                                        $facilitiesCount = DB::Table('facilities')
                                            ->where('status', '!=', 'Tidak Aktif')
                                            ->count();
                                    @endphp

                                    @for ($i = 0; $i < $facilitiesCount; $i++)
                                        @php
                                            $roomFacilities = DB::Table('room_facilities')
                                                ->where('room_id', $room->id)
                                                ->where('facilities_id', $facilities[$i]->id)
                                                ->first();
                                        @endphp
                                        <div class="flex items-center">
                                            <input id="facilities-{{ $i }}" type="checkbox"
                                                name="facilities[]" @checked(old('true', $roomFacilities))
                                                value="{{ $facilities[$i]->id }}"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                                            <label for="facilities-{{ $i }}"
                                                class="ml-2 text-sm font-medium text-gray-900">{{ $facilities[$i]->name }}</label>
                                        </div>
                                    @endfor

                                </div>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Harga</div>
                            </div>
                            <div class="col-span-8">
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        Rp
                                    </span>
                                    <input type="number" id="price" name="price"
                                        class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5"
                                        value="{{ $room->price }}">
                                </div>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Foto 1</div>
                            </div>
                            <div class="col-span-8">
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                    id="image1" type="file" name="image1">
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Foto 2</div>
                            </div>
                            <div class="col-span-8">
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                    id="image2" type="file" name="image2">
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Status</div>
                            </div>
                            <div class="col-span-8 flex space-x-3 items-center">
                                <span class="ml-3 text-sm font-medium text-gray-900">Tidak
                                    Disewakan</span>
                                <label for="status" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" name="status" id="status" class="sr-only peer"
                                        @checked(old('Disewakan', $room->status == 'Disewakan'))>
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">Disewakan</span>
                                </label>
                            </div>

                            <div class="col-span-12">
                                <div class="float-right">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>
            </div>

            <div class="col-span-5">
                <x-card>
                    <div class="p-5">

                        <div class="mb-4">
                            <div class="text-2xl text-primary font-bold">{{ $villa->name }} - {{ $room->name }}
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
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="hidden">Next</span>
                                </span>
                            </button>
                        </div>

                        <div class="mt-2">
                            <div class="text-3xl text-primary font-bold">
                                Rp {{ number_format($room->price, 0, ',', '.') }}</div>
                        </div>

                        <div class="mt-4">
                            {{-- <div class="text-sm text-primary font-medium">{{ $room->facilities }}</div> --}}
                        </div>

                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-layouts.base>
