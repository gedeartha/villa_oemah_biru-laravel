<x-layouts.base>
    <div>
        <div>
            <div class="font-bold text-xl text-primary tracking-wider mb-6">Edit Fasilitas</div>
        </div>

        <div class="grid grid-cols-12 gap-x-4">
            <div class="col-span-7">
                <x-card>
                    <form class="p-6" action="{{ $facility->id }}/update" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

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

                        <div class="grid grid-cols-12 gap-y-4">

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Nama Fasilitas</div>
                            </div>
                            <div class="col-span-8">
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $facility->name }}" required>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Icon</div>
                            </div>
                            <div class="col-span-8">
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                    id="image" type="file" name="image">
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Status</div>
                            </div>
                            <div class="col-span-8 flex space-x-3 items-center">
                                <span class="ml-3 text-sm font-medium text-gray-900">Tidak
                                    Aktif</span>
                                <label for="status" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" name="status" id="status" class="sr-only peer"
                                        @checked(old('Aktif', $facility->status == 'Aktif'))>
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">Aktif</span>
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
                    <div class="text-center">
                        <img class="w-40 h-40 mx-auto" src="{{ Storage::url('facilities/') . $facility->icon }}"
                            alt="Room Silver" />
                    </div>

                    <div class="p-4">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12">
                                <div class="float-left">
                                    <div class="font-extrabold text-xl tracking-wider text-primary">
                                        {{ $facility->name }}</div>
                                </div>

                                <div class="float-right -mt-14">

                                    @if ($facility->status == 'Aktif')
                                        <span
                                            class="bg-green-100 text-green-800 text-base font-semibold px-2.5 py-0.5 rounded">AKTIF</span>
                                    @else
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-base font-semibold mr-2 px-2.5 py-0.5 rounded">TIDAK
                                            AKTIF</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-layouts.base>
