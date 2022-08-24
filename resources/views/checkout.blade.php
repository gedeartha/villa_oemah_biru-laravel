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

                                    <div class="col-span-12 mb-3">
                                        <table class="w-full text-sm text-left text-gray-500">
                                            <thead class="text-xs text-white uppercase bg-primary/70">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 border-r text-center">
                                                        Fasilitas Extra
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 border-r text-center">
                                                        Harga
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 border-r text-center">
                                                        Jumlah
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 border-r text-center">
                                                        Sub Total
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
                                                        <td class="px-6 py-4 border-r text-right">Rp
                                                            {{ number_format($addon->price, 0, ',', '.') }}
                                                        </td>
                                                        <td class="px-6 py-4 border-r text-right">
                                                            {{ number_format($addon->quantity, 0, ',', '.') }}
                                                        </td>
                                                        <td class="px-6 py-4 border-r text-right">
                                                            @php
                                                                $subtotal = $addon->price * $addon->quantity;
                                                                $totalAddOns = $totalAddOns + $subtotal;
                                                            @endphp
                                                            {{ number_format($subtotal, 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @empty<tr class="border-b odd:bg-white even:bg-primary/5">
                                                        <th colspan="8" scope="row"
                                                            class="px-6 py-4 text-center font-medium text-gray-500 dark:text-white whitespace-nowrap border-r">
                                                            <div class="flex items-center justify-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                    viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                                                        clip-rule="evenodd" />
                                                                    <path
                                                                        d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                                                                </svg>
                                                                <div class="ml-1">Tidak ada penambahan fasilitas extra
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="mb-3">
                                            <label for="adult"
                                                class="block mb-2 text-sm font-semibold text-gray-500">Jumlah Orang
                                                Dewasa</label>
                                            <select required id="adult" name="adult"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                <option value="">Pilih Jumlah Orang Dewasa</option>
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
                                            <select required id="child" name="child"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                <option value="">Pilih Jumlah Anak-anak</option>
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
                                            @php
                                                $grandTotal = $totalAddOns + $reservation->total;
                                            @endphp
                                            <div class="font-bold text-xl text-primary">Rp
                                                {{ number_format($grandTotal, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="grid grid-cols-2 gap-4">

                                            <div class="mb-3">
                                                <a href="{{ route('add-ons.index') }}">
                                                    <div
                                                        class="border border-blue-700 text-blue-700 hover:bg-blue-800 hover:text-white w-full bg-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                        Kembali</div>
                                                </a>
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit"
                                                    class="border border-blue-700 text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Booking
                                                    Sekarang</button>
                                            </div>
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
