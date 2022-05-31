<x-layouts.base>
    <div class="flex justify-center">
        <div class="w-[30rem]">
            <x-card>
                <div class="p-6">
                    <div class="text-lg text-primary font-bold text-center">Detail Reservasi</div>
                    <hr class="mt-4 mb-4" />

                    <div class="text-center">
                        <div class="text-2xl text-primary font-bold mb-1">#{{ $reservation->id }}</div>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $reservation->status }}</span>
                        <div class="text-sm mt-3 text-gray-500">
                            @php
                                $dateGet = $reservation->created_at;
                                $date = date('d M Y H:i', strtotime($dateGet));
                            @endphp
                            {{ $date }}
                        </div>
                        <div class="text-2xl text-primary font-bold mt-2">
                            Rp {{ number_format($reservation->total, 0, ',', '.') }}
                        </div>
                    </div>

                    <hr class="mt-4 mb-4" />

                    <div class="grid grid-cols-12 gap-y-4">
                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Nama</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <div class="font-semibold text-sm text-primary">
                                @php
                                    $user = DB::Table('users')
                                        ->where('id', $reservation->user_id)
                                        ->first();
                                @endphp
                                {{ $user->name }}
                            </div>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Tipe Kamar</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <div class="font-semibold text-sm text-primary">
                                @php
                                    $room = DB::Table('rooms')
                                        ->where('id', $reservation->room_id)
                                        ->first();
                                @endphp
                                {{ $room->name }}
                            </div>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Tanggal Reservasi</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <div class="font-semibold text-sm text-primary">
                                @php
                                    $dateStartGet = $reservation->check_in;
                                    $dateStart = date('d M Y', strtotime($dateStartGet));
                                    
                                    $dateEndGet = $reservation->check_out;
                                    $dateEnd = date('d M Y', strtotime($dateEndGet));
                                @endphp
                                {{ $dateStart }} - {{ $dateEnd }}
                            </div>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Lama Menginap</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <div class="font-semibold text-sm text-primary">
                                @php
                                    $date1 = date_create($dateStart);
                                    $date2 = date_create($dateEnd);
                                    $diff = date_diff($date1, $date2);
                                @endphp
                                {{ $diff->format('%a Hari') }}
                            </div>
                        </div>

                        <div class="col-span-4 my-auto">
                            <div class="font-semibold text-sm text-primary">Bukti Pembayaran</div>
                        </div>
                        <div class="col-span-8 text-right">
                            <a href="{{ Storage::url('proof/') . $reservation->proof }}" target="_blank"
                                class="flex float-right items-center text-blue-600">
                                <div class="font-semibold text-sm italic mr-1">Lihat Bukti Pembayaran</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-layouts.base>
