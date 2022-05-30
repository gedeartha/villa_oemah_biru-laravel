<x-layouts.base>
    <div>
        <div>
            <div class="font-bold text-xl text-primary tracking-wider mb-6">Tambah Kamar</div>
        </div>

        <div class="grid grid-cols-12 gap-x-4">
            <div class="col-span-7">
                <x-card>
                    <form action="{{ route('admin.villa.rooms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-12 gap-y-4 p-6">

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Nama Kamar</div>
                            </div>
                            <div class="col-span-8">
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Sweet" required>
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
                                        <div class="flex items-center">
                                            <input id="facilities-{{ $i }}" type="checkbox"
                                                name="facilities[]" value="{{ $facilities[$i]->id }}"
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
                                        placeholder="100000">
                                </div>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Foto 1</div>
                            </div>
                            <div class="col-span-8">
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                    id="image1" type="file" name="image1" required>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Foto 2</div>
                            </div>
                            <div class="col-span-8">
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                    id="image2" type="file" name="image2" required>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Status</div>
                            </div>
                            <div class="col-span-8 flex space-x-3 items-center">
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak
                                    Disewakan</span>
                                <label for="status" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" name="status" id="status" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                    </div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Disewakan</span>
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
                        <div class="font-semibold text-sm text-primary">Informasi</div>
                        <hr class="mt-2 mb-4" />

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

                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-layouts.base>
