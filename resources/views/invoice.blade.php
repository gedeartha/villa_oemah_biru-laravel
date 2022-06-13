<x-layouts.home>
    <x-user.navigation />

    <div class="h-[20vh] bg-biru flex items-center justify-center">
        <div class="font-extrabold text-4xl tracking-wider text-white">Invoice</div>
    </div>

    <div class="bg-tertiary -mt-4">
        <div class="max-w-5xl mx-auto my-4 py-6">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="p-5">

                        <div class="flex justify-center">
                            <div class="w-[30rem]">
                                <x-card>
                                    <div class="p-6">
                                        <div class="text-lg text-primary font-bold text-center">Detail Reservasi
                                        </div>
                                        <hr class="mt-4 mb-4" />

                                        @if ($reservation->status == 'Belum Dibayar')
                                            <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg"
                                                role="alert">
                                                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd"></path>
                                                </svg>

                                                <div>
                                                    <span class="font-medium">Mohon segera selesaikan
                                                        pembayaran!</span>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="text-center">
                                            <div class="text-2xl text-primary font-bold mb-1">
                                                #{{ $reservation->id }}</div>

                                            @if ($reservation->status == 'Sudah Dibayar')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Sudah
                                                    Dibayar</span>
                                            @elseif ($reservation->status == 'Belum Dibayar')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Belum
                                                    Dibayar</span>
                                            @elseif ($reservation->status == 'Cancel')
                                                <span
                                                    class="bg-red-600 text-white text-xs font-semibold px-2.5 py-0.5 rounded">Cancel</span>
                                            @endif
                                            <div class="text-sm mt-3 text-gray-500">
                                                @php
                                                    $dateGet = $reservation->created_at;
                                                    $date = date('d M Y H:i', strtotime($dateGet));
                                                @endphp
                                                {{ $date }}
                                            </div>
                                            <div class="text-2xl text-primary font-bold mt-2">Rp
                                                {{ number_format($reservation->total, 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <hr class="mt-4 mb-4" />

                                        <div class="grid grid-cols-12 gap-y-4">
                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Nama</div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">{{ $user->name }}
                                                </div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Tipe Kamar</div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">
                                                    {{ $room->name }} Room</div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Tanggal Check In
                                                </div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">
                                                    @php
                                                        $dateGet = $reservation->check_in;
                                                        $date = date('d M Y', strtotime($dateGet));
                                                    @endphp
                                                    {{ $date }} &bull; 14:00
                                                </div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Tanggal Check Out
                                                </div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">
                                                    @php
                                                        $dateGet = $reservation->check_out;
                                                        $date = date('d M Y', strtotime($dateGet));
                                                    @endphp
                                                    {{ $date }} &bull; 12:00
                                                </div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Lama Menginap</div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">{{ $duration }}
                                                    Malam
                                                </div>
                                            </div>

                                            <div class="col-span-4 my-auto">
                                                <div class="font-semibold text-sm text-primary">Jumlah Tamu</div>
                                            </div>
                                            <div class="col-span-8 text-right">
                                                <div class="font-semibold text-sm text-primary">
                                                    {{ $reservation->adult }} Dewasa, {{ $reservation->child }}
                                                    Anak-anak
                                                </div>
                                            </div>

                                        </div>

                                        <div class="flex justify-between">
                                            <div class="mt-4">

                                                @if ($reservation->status == 'Belum Dibayar')
                                                    <button id="pay-button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Bayar
                                                        Sekarang</button>
                                                @endif
                                            </div>

                                            <div class="mt-4">
                                                <a href="{{ $reservation->id }}/cancel">
                                                    <button
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancel</button>
                                                </a>
                                            </div>
                                        </div>

                                        <form action="" id="submit_form" method="POST">
                                            @csrf
                                            <input type="hidden" name="invoice" value="{{ $reservation->id }}">
                                            <input type="hidden" name="json" id="json_callback">
                                        </form>
                                    </div>

                                </x-card>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-user.footer />

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay(`{{ $snap_token }}`, {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    // console.log(result);
                    send_response_to_form(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    // alert("wating your payment!");
                    // console.log(result);
                    send_response_to_form(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment failed!");
                    // console.log(result);
                    send_response_to_form(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    // alert('you closed the popup without finishing the payment');
                }
            })
        });

        function send_response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            // alert(document.getElementById('json_callback').value);
            $('#submit_form').submit();
        }
    </script>
</x-layouts.home>
