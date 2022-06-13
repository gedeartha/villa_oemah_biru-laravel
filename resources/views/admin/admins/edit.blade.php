<x-layouts.base>
    <div>
        <div>
            <div class="font-bold text-xl text-primary tracking-wider mb-6">Edit Admin</div>
        </div>

        <div class="grid grid-cols-12 gap-x-4">
            <div class="col-span-7">
                <x-card>
                    <form action="{{ $admin->id }}/update" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="grid grid-cols-12 gap-y-4 p-6">

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Nama Lengkap</div>
                            </div>
                            <div class="col-span-8">
                                <input type="text" id="fullname" name="fullname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $admin->name }}" required>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Email</div>
                            </div>
                            <div class="col-span-8">
                                <input type="email" id="email" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $admin->email }}" required>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Status</div>
                            </div>
                            <div class="col-span-8 flex space-x-3 items-center">
                                <span class="ml-3 text-sm font-medium text-gray-900">Tidak
                                    Aktif</span>
                                <label for="status" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" name="status" id="status" class="sr-only peer"
                                        @checked(old('Aktif', $admin->status == 'Aktif'))>
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">Aktif</span>
                                </label>
                            </div>


                            <div class="col-span-12">
                                <div class="float-right">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>

                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="p-6 -mt-20">
                        <form action="{{ $admin->id }}/delete" method="POST" enctype="multipart/form-data">
                            @method('DELETE')
                            @csrf

                            <button
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Hapus</button>
                        </form>
                    </div>
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
