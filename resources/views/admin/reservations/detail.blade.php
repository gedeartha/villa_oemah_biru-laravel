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
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-layouts.base>
