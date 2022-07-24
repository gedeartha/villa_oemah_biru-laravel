<x-layouts.base>
    <div>
        <div class="flex justify-between">
            <div class="font-bold text-xl text-primary tracking-wider mb-6">List Kamar</div>

            <form method="POST" action="{{ route('admin.villa.rooms.search') }}" enctype="multipart/form-data">
                @csrf

                <div class="flex space-x-2">
                    <input type="text" id="text" name="name" value="{{ old('name', $name) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="Cari Tipe Kamar">
                    <button
                        class="py-2.5 px-5 flex justify-center items-center text-sm font-bold text-white focus:outline-none shadow-lg  bg-primary/70 rounded-lg hover:bg-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <x-card>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-primary/70">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-r">
                                Tanggal Diperbarui
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Tipe Kamar
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Harga
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
                        @forelse ($rooms as $room)
                            <tr class="border-b odd:bg-white even:bg-primary/5">
                                <td class="px-6 py-4 border-r">
                                    @php
                                        $dateGet = $room->updated_at;
                                        $date = date('d M Y H:i', strtotime($dateGet));
                                    @endphp
                                    {{ $date }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap border-r">
                                    {{ $room->name }}
                                </th>
                                <td class="px-6 py-4 border-r">
                                    Rp {{ number_format($room->price, 0, ',', '.') }}/malam
                                </td>
                                <td class="px-6 py-4 text-center border-r">
                                    @if ($room->status == 'Disewakan')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">DISEWAKAN</span>
                                    @else
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">TIDAK
                                            DISEWAKAN</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.villa.rooms.edit', $room->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b odd:bg-white even:bg-primary/5">
                                <th colspan="6" scope="row"
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
                                        <div class="ml-1">List Admin Kosong</div>
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
