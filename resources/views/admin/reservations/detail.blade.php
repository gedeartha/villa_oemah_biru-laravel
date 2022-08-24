<x-layouts.base>
    <div class="flex justify-center">
        <div class="w-[38rem]">
            <x-card>
                <div class="p-6">
                    <div class="text-lg text-primary font-bold text-center">Detail Reservasi</div>
                    <hr class="mt-4 mb-4" />

                    <div class="text-center">
                        <div class="text-2xl text-primary font-bold mb-1">#{{ $reservation->id }}</div>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $reservation->status }}</span>
                        <div class="text-sm mt-3 text-gray-500">
                            @php
                                $dateGet = $reservation->created_at;
                                $date = date('d M Y H:i', strtotime($dateGet));
                            @endphp
                            {{ $date }}
                        </div>
                        <div class="text-2xl text-primary font-bold mt-2">
                            Rp {{ number_format($reservation->total, 0, ',', '.') }}
                        </div>
                    </div>

                    <hr class="mt-4 mb-4" />

                    <div class="grid grid-cols-12 gap-y-4">
                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Nama</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <div class="font-semibold text-sm text-primary">
                                @php
                                    $user = DB::Table('users')
                                        ->where('id', $reservation->user_id)
                                        ->first();
                                @endphp
                                {{ $user->name }}
                            </div>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Tipe Kamar</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <div class="font-semibold text-sm text-primary">
                                @php
                                    $room = DB::Table('rooms')
                                        ->where('id', $reservation->room_id)
                                        ->first();
                                @endphp
                                {{ $room->name }}
                            </div>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Tanggal Reservasi</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <div class="font-semibold text-sm text-primary">
                                @php
                                    $dateStartGet = $reservation->check_in;
                                    $dateStart = date('d M Y', strtotime($dateStartGet));
                                    
                                    $dateEndGet = $reservation->check_out;
                                    $dateEnd = date('d M Y', strtotime($dateEndGet));
                                @endphp
                                {{ $dateStart }} - {{ $dateEnd }}
                            </div>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Lama Menginap</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <div class="font-semibold text-sm text-primary">
                                @php
                                    $date1 = date_create($dateStart);
                                    $date2 = date_create($dateEnd);
                                    $diff = date_diff($date1, $date2);
                                @endphp
                                {{ $diff->format('%a Hari') }}
                            </div>
                        </div>

                        <div class="col-span-12">
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

                        @if ($reservation->status != 'Selesai' && $reservation->status != 'Review')
                            <div class="col-span-12">
                                <div class="text-center mt-3">
                                    <a href="{{ $reservation->id }}/complete">
                                        <button
                                            class="text-white bg-green-500 hover:bg-green-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Selesai</button>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-layouts.base>
