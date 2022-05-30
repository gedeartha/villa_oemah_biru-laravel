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

                                        <div class="text-center">
                                            <div class="text-2xl text-primary font-bold mb-1">
                                                #{{ $reservation->id }}</div>

                                            @if ($reservation->status == 'Sudah Dibayar')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Sudah
                                                    Dibayar</span>
                                            @else
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Belum
                                                    Dibayar</span>
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

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Bukti Pembayaran
                                                </div>
                                            </div>

                                            <div class="col-span-8 text-right">
                                                @if ($reservation->status == 'Sudah Dibayar')
                                                    <a href="{{ Storage::url('proof/') . $reservation->proof }}"
                                                        target="_blank"
                                                        class="flex float-right items-center text-blue-600">
                                                        <div class="font-semibold text-sm italic mr-1">Lihat Bukti
                                                            Pembayaran</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </a>
                                                @else
                                                    <div class="font-semibold text-sm text-primary">-
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </x-card>

                                @if ($reservation->status == 'Belum Dibayar')
                                    <div class="mt-5">
                                        <form action="{{ $reservation->id }}/update" method="POST"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf

                                            <x-card>
                                                <div class="p-6">


                                                    <div class="text-lg text-primary font-bold text-center">Form Upload
                                                        Bukti
                                                        Pembayaran
                                                    </div>

                                                    {{-- Success Alert --}}
                                                    @if (session('success'))
                                                        <div class="flex p-4 my-4 text-sm text-green-700 bg-green-100 rounded-lg"
                                                            role="alert">
                                                            <svg class="inline flex-shrink-0 mr-3 w-5 h-5"
                                                                fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <div>
                                                                <span class="font-medium">Success!</span>
                                                                {{ session('success') }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    {{-- Success Alert --}}
                                                    <hr class="mt-4 mb-4" />

                                                    <div class="col-span-4 my-auto">
                                                        <div class="font-semibold text-sm text-primary/70 mb-3">Upload
                                                            Bukti
                                                            Pembayaran
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-12 gap-4">
                                                        <div class="col-span-12">
                                                            <input
                                                                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                                                id="image" type="file" name="image">
                                                        </div>

                                                        <div class="col-span-12">
                                                            <div class="float-right">
                                                                <button type="submit"
                                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-card>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-user.footer />
</x-layouts.home>
