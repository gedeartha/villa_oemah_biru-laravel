<x-layouts.home>
    <x-user.navigation />

    <div class="h-[20vh] bg-biru flex items-center justify-center">
        <div class="font-extrabold text-4xl tracking-wider text-white">Invoice</div>
    </div>

    <div class="bg-tertiary -mt-4">
        <div class="max-w-5xl mx-auto my-4 py-6">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="p-5">

                        <div class="flex justify-center">
                            <div class="w-[30rem]">
                                <x-card>
                                    <div class="p-6">
                                        <div class="text-lg text-primary font-bold text-center">Detail Reservasi
                                        </div>
                                        <hr class="mt-4 mb-4" />

                                        @if ($reservation->status == 'Belum Dibayar')
                                            <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg"
                                                role="alert">
                                                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>

                                                <div>
                                                    <span class="font-medium">Mohon segera selesaikan
                                                        pembayaran!</span>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="text-center">
                                            <div class="text-2xl text-primary font-bold mb-1">
                                                #{{ $reservation->id }}</div>

                                            @if ($reservation->status == 'Sudah Dibayar')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Sudah
                                                    Dibayar</span>
                                            @elseif ($reservation->status == 'Selesai')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Selesai</span>
                                            @elseif ($reservation->status == 'Review')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Review</span>
                                            @elseif ($reservation->status == 'Belum Dibayar')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Belum
                                                    Dibayar</span>
                                            @elseif ($reservation->status == 'Cancel')
                                                <span
                                                    class="bg-red-600 text-white text-xs font-semibold px-2.5 py-0.5 rounded">Cancel</span>
                                            @endif
                                            <div class="text-sm mt-3 text-gray-500">
                                                @php
                                                    $dateGet = $reservation->created_at;
                                                    $date = date('d M Y H:i', strtotime($dateGet));
                                                @endphp
                                                {{ $date }}
                                            </div>
                                            <div class="text-2xl text-primary font-bold mt-2">Rp
                                                {{ number_format($reservation->total, 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <hr class="mt-4 mb-4" />

                                        <div class="grid grid-cols-12 gap-y-4">
                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Nama</div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">{{ $user->name }}
                                                </div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Tipe Kamar</div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">
                                                    {{ $room->name }} Room</div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Tanggal Check In
                                                </div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">
                                                    @php
                                                        $dateGet = $reservation->check_in;
                                                        $date = date('d M Y', strtotime($dateGet));
                                                    @endphp
                                                    {{ $date }} &bull; 14:00
                                                </div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Tanggal Check Out
                                                </div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">
                                                    @php
                                                        $dateGet = $reservation->check_out;
                                                        $date = date('d M Y', strtotime($dateGet));
                                                    @endphp
                                                    {{ $date }} &bull; 12:00
                                                </div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Lama Menginap</div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">{{ $duration }}
                                                    Malam
                                                </div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Jumlah Tamu</div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">
                                                    {{ $reservation->adult }} Dewasa, {{ $reservation->child }}
                                                    Anak-anak
                                                </div>
                                            </div>

                                            <div class="col-span-12 mb-3">
                                                <table class="w-full text-sm text-left text-gray-500">
                                                    <thead class="text-xs text-white uppercase bg-primary/70">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 border-r text-center">
                                                                Fasilitas Extra
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 border-r text-center">
                                                                Jumlah
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $totalAddOns = 0;
                                                        @endphp
                                                        @forelse ($addons as $addon)
                                                            <tr class="border-b odd:bg-white even:bg-primary/5">
                                                                <td class="px-6 py-4 border-r">
                                                                    {{ $addon->name }}
                                                                </td>
                                                                <td class="px-6 py-4 border-r text-right">
                                                                    {{ number_format($addon->quantity, 0, ',', '.') }}
                                                                </td>
                                                            </tr>
                                                        @empty<tr class="border-b odd:bg-white even:bg-primary/5">
                                                                <th colspan="8" scope="row"
                                                                    class="px-6 py-4 text-center font-medium text-gray-500 dark:text-white whitespace-nowrap border-r">
                                                                    <div class="flex items-center justify-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5" viewBox="0 0 20 20"
                                                                            fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                                                                clip-rule="evenodd" />
                                                                            <path
                                                                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                                                                        </svg>
                                                                        <div class="ml-1">Tidak ada penambahan
                                                                            fasilitas extra
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        @endforelse

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="flex justify-between">
                                            <div class="mt-4">

                                                @if ($reservation->status == 'Belum Dibayar')
                                                    <button id="pay-button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Bayar
                                                        Sekarang</button>
                                                @endif
                                            </div>


                                            @if ($reservation->status != 'Selesai' && $reservation->status != 'Review')
                                                <div class="mt-4">
                                                    <a href="{{ $reservation->id }}/cancel">
                                                        <button
                                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancel</button>
                                                    </a>
                                                </div>
                                            @endif

                                        </div>

                                        <form action="" id="submit_form" method="POST">
                                            @csrf
                                            <input type="hidden" name="invoice" value="{{ $reservation->id }}">
                                            <input type="hidden" name="json" id="json_callback">
                                        </form>

                                        @if ($reservation->status == 'Review')
                                            <div>
                                                <hr class="mb-3" />

                                                <div>
                                                    <div class="font-semibold text-sm text-primary mb-2">Beri Ulasan
                                                    </div>
                                                </div>

                                                <form action="{{ $reservation->id }}/rating" method="POST">
                                                    @csrf
                                                    <div class="col-span-12">
                                                        <div class="grid grid-cols-12 gap-2">
                                                            <div class="col-span-4">
                                                                <div>
                                                                    <div class="flex items-center mb-1">
                                                                        <input checked="" id="default-radio-1"
                                                                            type="radio" value="5"
                                                                            name="rating"
                                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                                                        <label for="default-radio-1"
                                                                            class="ml-2 text-sm font-medium text-gray-900 flex">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                        </label>
                                                                    </div>

                                                                    <div class="flex items-center mb-1">
                                                                        <input id="default-radio-2" type="radio"
                                                                            value="4" name="rating"
                                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                                                        <label for="default-radio-2"
                                                                            class="ml-2 text-sm font-medium text-gray-900 flex">

                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                        </label>
                                                                    </div>

                                                                    <div class="flex items-center mb-1">
                                                                        <input id="default-radio-3" type="radio"
                                                                            value="3" name="rating"
                                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                                                        <label for="default-radio-3"
                                                                            class="ml-2 text-sm font-medium text-gray-900 flex">

                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                        </label>
                                                                    </div>

                                                                    <div class="flex items-center mb-1">
                                                                        <input id="default-radio-4" type="radio"
                                                                            value="2" name="rating"
                                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                                                        <label for="default-radio-4"
                                                                            class="ml-2 text-sm font-medium text-gray-900 flex">

                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                        </label>
                                                                    </div>

                                                                    <div class="flex items-center mb-1">
                                                                        <input id="default-radio-5" type="radio"
                                                                            value="1" name="rating"
                                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                                                        <label for="default-radio-5"
                                                                            class="ml-2 text-sm font-medium text-gray-900 flex">

                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-yellow-300"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 20 20"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                            </svg>
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-span-8">
                                                                <div>
                                                                    <textarea id="review" rows="5" required name="review"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
                                                                        placeholder="Masukkan ulasan"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-span-12 mt-4">
                                                        <button type="submit"
                                                            class="border border-blue-700 text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif

                                    </div>
                                </x-card>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-user.footer />

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay(`{{ $snap_token }}`, {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    // console.log(result);
                    send_response_to_form(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    // alert("wating your payment!");
                    // console.log(result);
                    send_response_to_form(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment failed!");
                    // console.log(result);
                    send_response_to_form(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    // alert('you closed the popup without finishing the payment');
                }
            })
        });

        function send_response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            // alert(document.getElementById('json_callback').value);
            $('#submit_form').submit();
        }
    </script>
</x-layouts.home>
