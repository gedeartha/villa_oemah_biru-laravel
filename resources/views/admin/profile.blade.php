<x-layouts.base>
    <div>
        <div>
            <div class="font-bold text-xl text-primary tracking-wider">Profile</div>
        </div>
        <x-card>
            <div class="p-8 mt-10">
                <div class="-mt-16 ml-4 flex items-center space-x-4">
                    <img src="{{ Storage::url('avatar/') . $admin->avatar }}"
                        class="object-cover h-32 w-32 rounded-full shadow-lg border-4 border-white" />
                    <div class="mt-14">
                        <div class="font-bold text-2xl text-primary">{{ $admin->name }}</div>
                        @php
                            if ($admin->role == 'owner') {
                                $role = 'Owner';
                            } else {
                                $role = 'Admin';
                            }
                        @endphp
                        <div class="text-base text-primary italic">{{ $role }} Villa Oemah Biru Bali</div>
                    </div>
                </div>
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="grid grid-cols-12 gap-y-4">
                        <div class="col-span-12">
                            <hr class="my-5" />

                            {{-- Warning Alert --}}
                            @if (session('warningInfo'))
                                <div class="flex p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg"
                                    role="alert">
                                    <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">Warning!</span> {{ session('warningInfo') }}
                                    </div>
                                </div>
                            @endif
                            {{-- Warning Alert --}}

                            {{-- Success Alert --}}
                            @if (session('successInfo'))
                                <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                                    <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">Success!</span> {{ session('successInfo') }}
                                    </div>
                                </div>
                            @endif
                            {{-- Success Alert --}}

                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="font-mono text-primary italic ml-2">Informasi Akun</div>
                            </div>
                        </div>

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
                            <input type="email" id="email"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $admin->email }}" disabled>
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
                </form>

                <form action="{{ route('admin.profile.password') }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="grid grid-cols-12 gap-y-4">
                        <div class="col-span-12">
                            <hr class="my-5" />

                            {{-- Warning Alert --}}
                            @if (session('warningPassword'))
                                <div class="flex p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg"
                                    role="alert">
                                    <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">Warning!</span> {{ session('warningPassword') }}
                                    </div>
                                </div>
                            @endif
                            {{-- Warning Alert --}}

                            {{-- Success Alert --}}
                            @if (session('successPassword'))
                                <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                                    <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">Success!</span> {{ session('successPassword') }}
                                    </div>
                                </div>
                            @endif
                            {{-- Success Alert --}}

                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                                <div class="font-mono text-primary italic ml-2">Ganti Password</div>
                            </div>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Password Baru</div>
                        </div>
                        <div class="col-span-8">
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Konfirmasi Password</div>
                        </div>
                        <div class="col-span-8">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>


                        <div class="col-span-12">
                            <div class="float-right">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </x-card>
    </div>
</x-layouts.base>
