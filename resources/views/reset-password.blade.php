<x-layouts.home>
    <div class="w-screen h-screen bg-cover bg-center" style="background-image: url(/image/background-2.jpg)">
        <div class="w-screen h-screen bg-black/50">
            <div class="flex items-center justify-center h-full">
                <x-card>
                    <div class="w-96 p-6">
                        <a href="/">
                            <div class="flex justify-center items-center space-x-4">
                                <img src="/image/logo.svg" class="w-20 h-20" />
                                <div>
                                    <span class="font-semibold text-lg text-primary">Villa Oemah Biru Bali</span>
                                    <p class="text-sm text-gray-500 italic">Reset Password</p>
                                </div>
                            </div>
                        </a>

                        {{-- Warning Alert --}}
                        @if (session('warning'))
                            <div class="flex p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg" role="alert">
                                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">Warning!</span> {{ session('warning') }}
                                </div>
                            </div>
                        @endif
                        {{-- Warning Alert --}}

                        {{-- Success Alert --}}
                        @if (session('success'))
                            <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">Success!</span> {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        {{-- Success Alert --}}

                        @if (!$token)
                            <div class="mb-2">
                                <div class="py-4 px-20 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                    role="alert">
                                    <span class="font-medium">Error!</span> Tautan tidak valid.
                                </div>
                            </div>
                        @else
                            <div class="mt-4">
                                <form action="{{ route('change-password') }}" method="POST">
                                    @csrf

                                    <!-- ID User -->
                                    <div class="mb-3 hidden">
                                        <input type="text" name="user_id" value="{{ $user_id }}"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            required />
                                    </div>

                                    <!-- Password -->
                                    <div class="relative z-0 w-full mb-3 group">
                                        <input type="password" name="password"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="password"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>

                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- Password -->

                                    <!-- Password Confirmation -->
                                    <div class="relative z-0 w-full mb-3 group">
                                        <input type="password" name="password_confirmation"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="password_confirmation"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Konfirmasi
                                            Password</label>

                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- Password Confirmation -->

                                    <div class="flex justify-center items-center mt-10">
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Ganti
                                            Password</button>

                                    </div>
                                </form>

                            </div>
                        @endif
                    </div>

                </x-card>
            </div>
        </div>
    </div>
</x-layouts.home>
