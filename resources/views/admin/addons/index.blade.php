<x-layouts.base>
    <div>
        <div class="flex justify-between">
            <div class="font-bold text-xl text-primary tracking-wider mb-6">List Fasilitas Extra</div>

            <form method="POST" action="{{ route('admin.addons.search') }}" enctype="multipart/form-data">
                @csrf

                <div class="flex space-x-2">
                    <input type="text" id="text" name="name" value="{{ old('name', $name) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="Cari Fasilitas Extra">
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

        <x-card>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-primary/70">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-r">
                                Nama Fasilitas Extra
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3 border-r">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($addons as $addon)
                            <tr class="border-b odd:bg-white even:bg-primary/5">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap border-r">
                                    {{ $addon->name }}
                                </th>
                                <td class="px-6 py-4 border-r">
                                    Rp {{ number_format($addon->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 border-r">
                                    {{ $addon->status }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.addons.edit', $addon->id) }}"
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
                                        <div class="ml-1">List Fasilitas Extra Kosong</div>
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
