<x-layouts.base>
    <div>
        <div>
            <div class="font-bold text-xl text-primary tracking-wider mb-6">Export Reservasi Order</div>
        </div>

        <div class="grid grid-cols-12 gap-x-4 mb-5">
            <div class="col-span-12">
                <x-card>

                    @if (session('warning'))
                        <div class="px-4 pt-4 -mb-2">
                            <div class="p-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg" role="alert">
                                <span class="font-medium">Failed!</span> {{ session('warning') }}
                            </div>
                        </div>
                    @endif

                    <form action="" enctype="multipart/form-data">
                        <div class="grid grid-cols-12 gap-x-4 p-6">

                            <div class="col-span-4">
                                <div class="font-semibold text-sm text-primary mb-2">Dari Tanggal</div>

                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input datepicker type="text" datepicker-format="dd/mm/yyyy" name="date_start"
                                        value="{{ $date_start }}" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                        placeholder="Pilih tanggal">
                                </div>
                            </div>
                            <div class="col-span-4">
                                <div class="font-semibold text-sm text-primary mb-2">Sampai Tanggal</div>

                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input datepicker type="text" datepicker-format="dd/mm/yyyy" name="date_end"
                                        value="{{ $date_end }}" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                        placeholder="Pilih tanggal">
                                </div>
                            </div>

                            <div class="col-span-4">
                                <div class="flex space-x-4 items-end h-full w-full">
                                    <button type="submit"
                                        class="text-white bg-primary/70 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>


                                    <a href="{{ route('admin.reservations.download') }}"
                                        class="text-white bg-primary/70 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                        Export
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>
            </div>
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
                                    @php
                                        $room = DB::Table('rooms')
                                            ->where('id', $reservation->room_id)
                                            ->first();
                                    @endphp
                                    {{ $room->name }}
                                </td>
                                <td class="px-6 py-4 border-r">
                                    @php
                                        $dateStartGet = $reservation->check_in;
                                        $dateStart = date('d M Y', strtotime($dateStartGet));
                                        
                                        $dateEndGet = $reservation->check_out;
                                        $dateEnd = date('d M Y', strtotime($dateEndGet));
                                    @endphp
                                    {{ $dateStart }} - {{ $dateEnd }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap border-r">
                                    @php
                                        $user = DB::Table('users')
                                            ->where('id', $reservation->user_id)
                                            ->first();
                                    @endphp
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4 border-r text-right">
                                    Rp {{ number_format($reservation->total, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center border-r">
                                    {{ $reservation->status }}
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b odd:bg-white even:bg-primary/5">
                                <th colspan="8" scope="row"
                                    class="px-6 py-4 text-center font-medium text-gray-500 dark:text-white whitespace-nowrap border-r">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
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
    <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
</x-layouts.base>
