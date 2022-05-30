<x-layouts.home>
    <x-user.navigation />

    <div class="h-[20vh] bg-biru flex items-center justify-center">
        <div class="font-extrabold text-4xl tracking-wider text-white">Profile</div>
    </div>

    <div class="bg-tertiary -mt-4">
        <div class="max-w-5xl mx-auto my-4 py-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-3">
                    <x-card>
                        <x-user.sidebar />
                    </x-card>
                </div>

                <div class="col-span-9">
                    <x-card>
                        <div class="p-8 mt-12">
                            <div class="-mt-20 ml-4 flex items-center space-x-4">
                                <img src="{{ Storage::url('avatar/') . $user->avatar }}"
                                    class="object-cover h-32 w-32 rounded-full shadow-lg border-4 border-white" />
                                <div class="mt-16">
                                    <div class="font-bold text-2xl text-primary">{{ $user->name }}</div>
                                    <div class="text-base text-primary italic">{{ $user->email }}</div>
                                </div>
                            </div>
                        </div>

                        <hr class="-mt-2" />

                        <form action="/profile/update" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="p-5">

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

                                <div class="grid grid-cols-12 gap-4">

                                    <div class="col-span-4 my-auto">
                                        <div class="font-semibold text-sm text-primary">Nama Lengkap</div>
                                    </div>
                                    <div class="col-span-8">
                                        <input type="text" id="fullname" name="fullname"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $user->name }}" required>
                                    </div>

                                    <div class="col-span-4 my-auto">
                                        <div class="font-semibold text-sm text-primary">Email</div>
                                    </div>
                                    <div class="col-span-8">
                                        <input type="email" id="email" name="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $user->email }}" required>
                                    </div>

                                    <div class="col-span-4 my-auto">
                                        <div class="font-semibold text-sm text-primary">Telepon</div>
                                    </div>
                                    <div class="col-span-8">
                                        <input type="text" id="phone" name="phone"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $user->phone }}" required>
                                    </div>

                                    <div class="col-span-4 my-auto">
                                        <div class="font-semibold text-sm text-primary">Ganti Foto</div>
                                    </div>
                                    <div class="col-span-8">
                                        <input
                                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                            id="image" type="file" name="image">
                                    </div>

                                    <div class="col-span-12">
                                        <div class="float-right">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Ubah</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </div>

    <x-user.footer />
</x-layouts.home>
