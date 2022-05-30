<x-layouts.home>
    <x-user.navigation />

    <div class="h-[20vh] bg-biru flex items-center justify-center">
        <div class="font-extrabold text-4xl tracking-wider text-white">Checkout</div>
    </div>

    <div class="bg-tertiary -mt-4">
        <div class="max-w-5xl mx-auto my-4 py-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <form action="{{ route('checkout.update') }}" method="POST">
                        @method('PUT')
                        @csrf

                        <x-card>
                            <div class="p-4">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-12">
                                        <div class="mb-3">
                                            <div class="font-semibold text-sm text-gray-500">Nama</div>
                                            <div class="font-bold text-xl text-primary">{{ $user->name }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="mb-3">
                                            <div class="font-semibold text-sm text-gray-500">Rooms</div>
                                            <div class="font-bold text-xl text-primary">{{ $villa->name }} -
                                                {{ $room->name }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <div class="mb-3">
                                            <div class="font-semibold text-sm text-gray-500">Tanggal Check In</div>
                                            <div class="font-bold text-lg text-primary">
                                                @php
                                                    $dateGet = $reservation->check_in;
                                                    $date = date('d M Y', strtotime($dateGet));
                                                @endphp
                                                {{ $date }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-6">
                                        <div class="mb-3">
                                            <div class="font-semibold text-sm text-gray-500">Tanggal Check Out</div>
                                            <div class="font-bold text-lg text-primary">
                                                @php
                                                    $dateGet = $reservation->check_out;
                                                    $date = date('d M Y', strtotime($dateGet));
                                                @endphp
                                                {{ $date }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="mb-3">
                                            <div class="font-semibold text-sm text-gray-500">Lama Menginap</div>
                                            <div class="font-bold text-xl text-primary">{{ $duration }} Malam
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="mb-3">
                                            <label for="adult"
                                                class="block mb-2 text-sm font-semibold text-gray-500">Jumlah Orang
                                                Dewasa</label>
                                            <select id="adult" name="adult" required
                                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                <option selected="">Pilih Jumlah Orang Dewasa</option>
                                                <option value="1">1 Orang Dewasa</option>
                                                <option value="2">2 Orang Dewasa</option>
                                                <option value="3">3 Orang Dewasa</option>
                                                <option value="4">4 Orang Dewasa</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="mb-3">
                                            <label for="child"
                                                class="block mb-2 text-sm font-semibold text-gray-500">Jumlah
                                                Anak-anak</label>
                                            <select id="child" name="child" required
                                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                <option selected="">Pilih Jumlah Anak-anak</option>
                                                <option value="0">0 Anak</option>
                                                <option value="1">1 Anak</option>
                                                <option value="2">2 Anak</option>
                                                <option value="3">3 Anak</option>
                                                <option value="4">4 Anak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="mb-3">
                                            <div class="font-semibold text-sm text-gray-500">Total</div>
                                            <div class="font-bold text-xl text-primary">Rp
                                                {{ number_format($reservation->total, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="mb-3">
                                            <button type="submit"
                                                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Booking
                                                Sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-card>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-user.footer />
</x-layouts.home>
