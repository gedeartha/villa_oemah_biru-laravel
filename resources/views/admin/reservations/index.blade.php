<x-layouts.base>
    <div>
        <div>
            <div class="font-bold text-xl text-primary tracking-wider mb-6">Riwayat Reservasi</div>
        </div>

        <x-card>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-primary/70">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-r">
                                Reservasi ID
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Tanggal Dibuat
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Tipe Kamar
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Tanggal Reservasi
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Total Harga
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border-r">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservations as $reservation)
                            <tr class="border-b odd:bg-white even:bg-primary/5">
                                <td class="px-6 py-4 border-r">
                                    #{{ $reservation->id }}
                                </td>
                                <td class="px-6 py-4 border-r">
                                    @php
                                        $dateGet = $reservation->created_at;
                                        $date = date('d M Y H:i', strtotime($dateGet));
                                    @endphp
                                    {{ $date }}
                                </td>
                                <td class="px-6 py-4 border-r">
                                    {{ $reservation->room }}
                                </td>
                                <td class="px-6 py-4 border-r">
                                    @php
                                        $dateStartGet = $reservation->reservation_date_start;
                                        $dateStart = date('d M Y', strtotime($dateStartGet));
                                        
                                        $dateEndGet = $reservation->reservation_date_end;
                                        $dateEnd = date('d M Y', strtotime($dateEndGet));
                                    @endphp
                                    {{ $dateStart }} - {{ $dateEnd }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap border-r">
                                    {{ $reservation->name }}
                                </th>
                                <td class="px-6 py-4 border-r text-right">
                                    Rp {{ number_format($reservation->total, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center border-r">
                                    {{ $reservation->status }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.reservations.detail', $reservation->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b odd:bg-white even:bg-primary/5">
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
                                        <div class="ml-1">Reservasi Kosong</div>
                                    </div>
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </x-card>
    </div>
</x-layouts.base>
