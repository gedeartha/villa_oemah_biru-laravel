<x-layouts.base>
    <div>
        <div>
            <div class="font-bold text-xl text-primary tracking-wider mb-6">Edit Informasi Villa</div>
        </div>

        <div class="grid grid-cols-12 gap-x-4">
            <div class="col-span-7">
                <x-card>
                    <form action="{{ route('admin.villa.update') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-12 gap-y-4 p-6">

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Nama Villa</div>
                            </div>
                            <div class="col-span-8">
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $villa->name }}" required>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Tagline</div>
                            </div>
                            <div class="col-span-8">
                                <textarea id="tagline" name="tagline" rows="2"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $villa->tagline }}</textarea>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Alamat</div>
                            </div>
                            <div class="col-span-8">
                                <textarea id="address" name="address" rows="2"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $villa->address }}</textarea>
                            </div>

                            <div class="col-span-4 my-auto">
                                <div class="font-semibold text-sm text-primary">Deskripsi</div>
                            </div>
                            <div class="col-span-8">
                                <textarea id="description" name="description" rows="5"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $villa->description }}</textarea>
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
