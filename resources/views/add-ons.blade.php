<x-layouts.home>
    <x-user.navigation />

    <div class="h-[20vh] bg-biru flex items-center justify-center">
        <div class="font-extrabold text-4xl tracking-wider text-white">Add Ons</div>
    </div>

    <div class="bg-tertiary -mt-4">
        <div class="max-w-5xl mx-auto my-4 py-6">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <form action="{{ route('add-ons.post') }}" method="POST">
                        @csrf

                        <x-card>
                            <div class="p-4">
                                <div class="grid grid-cols-12">

                                    <div class="col-span-12">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-6 text-center">
                                                <div class="text-base font-bold">
                                                    Fasilitas Extra
                                                </div>
                                            </div>
                                            <div class="col-span-3 text-center">
                                                <div class="text-base font-bold">
                                                    Harga
                                                </div>
                                            </div>
                                            <div class="col-span-3 text-center">
                                                <div class="text-base font-bold">
                                                    Jumlah
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-3" />
                                    </div>

                                    @php
                                        $key = 0;
                                    @endphp
                                    @foreach ($addons as $addon)
                                        <div class="col-span-12">
                                            <div class="grid grid-cols-12 gap-4 mt-2 items-center">
                                                <div class="col-span-6 text-left pl-4">
                                                    <div class="text-sm">
                                                        {{ $addon->name }}
                                                    </div>
                                                </div>
                                                <div class="col-span-3 text-right pr-10">
                                                    <div class="text-sm">
                                                        Rp {{ number_format($addon->price, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                                <div class="col-span-3 text-right pr-4">
                                                    @php
                                                        $quantityName = 'quantity[' . $addon->id . ']';
                                                    @endphp
                                                    <div class="text-sm">
                                                        <input type="number" name={{ $quantityName }}
                                                            id={{ $quantityName }}
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                            placeholder="Masukkan jumlah">
                                                    </div>
                                                </div>

                                                <div class="hidden col-span-3 text-right pr-4">
                                                    @php
                                                        $array = 'addon_id[' . $key . ']';
                                                    @endphp
                                                    <div class="text-sm">
                                                        <input type="number" name={{ $array }}
                                                            id={{ $array }}
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                            value={{ $addon->id }}>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-3" />
                                        </div>

                                        @php
                                            $key = $key + 1;
                                        @endphp
                                    @endforeach

                                    <div class="col-span-12 mt-5">
                                        <div class="mb-3">
                                            <button type="submit"
                                                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Lanjutkan
                                                ke Checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-card>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-user.footer />
</x-layouts.home>
