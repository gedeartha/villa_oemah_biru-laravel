<x-layouts.home>
    <x-user.navigation />

    <div class="h-[85vh] max-w-screen bg-teal-300 bg-cover bg-center" style="background-image: url(/image/bg-home-8.jpg)">
        <div class="w-full h-full bg-black/50 flex items-center justify-center">
            <div class="text-center -mt-32">
                <div class="font-extrabold text-6xl tracking-wider text-white mb-3">{{ $villa->name }}</div>
                <div class="font-medium italic text-base tracking-wider text-white">{{ $villa->tagline }}</div>
            </div>
        </div>
    </div>

    <div class="-mt-32 bg-tertiary max-w-7xl mx-auto rounded-2xl p-5 mb-20">
        <div class="mb-5 text-center">
            <div class="font-extrabold text-2xl tracking-wider text-primary">Available Rooms</div>
        </div>
        <div class="grid grid-cols-3 gap-4">

            @foreach ($rooms as $room)
                <x-card>
                    <img class="w-full h-64 object-cover rounded-t-2xl"
                        src="{{ Storage::url('rooms/') . $room->image1 }}" alt="Room Silver" />

                    <div class="p-4 h-72">

                        <div class="flex flex-col h-full justify-between">
                            <div>
                                <div class="grid grid-cols-12 gap-2">

                                    <div class="col-span-12">
                                        <div class="float-left">
                                            <div class="font-extrabold text-xl tracking-wider text-primary">
                                                {{ $room->name }}
                                                Room</div>
                                        </div>

                                        <div class="float-right -mt-14">
                                            <span
                                                class="box-decoration-clone bg-gradient-to-r from-indigo-600 to-pink-500 text-white font-medium text-lg px-2 py-1">
                                                Rp {{ number_format($room->price, 0, ',', '.') }}/malam
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="text-gray-600 font-medium tracking-wider mb-2">Fasilitas</div>
                                        <div class="grid grid-cols-2 gap-0">
                                            @php
                                                $roomFacilities = DB::Table('room_facilities')
                                                    ->where('room_id', $room->id)
                                                    ->get();
                                            @endphp

                                            @foreach ($roomFacilities as $roomFacility)
                                                @php
                                                    $facilities = DB::Table('facilities')
                                                        ->where('id', $roomFacility->facilities_id)
                                                        ->first();
                                                @endphp

                                                <div class="text-gray-500">&bull; {{ $facilities->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-12">
                                        <hr />
                                        <div class="mb-3 mt-5 text-center">
                                            <a href="{{ route('rooms', $room->id) }}"
                                                class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Detail Room
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>

    <div class="max-w-6xl p-10 shadow-md rounded-3xl mx-auto mb-20">
        <div class="grid grid-cols-12 gap-10">
            <div class="col-span-8">
                <div class="font-extrabold text-3xl tracking-wider text-primary mb-2">{{ $villa->name }}</div>
                <div class="font-bold italic text-lg tracking-wider uppercase text-primary/50 mb-3">Since 2020</div>
                <div class="text-primary/50 text-base font-medium tracking-wider mt-8">{{ $villa->description }}
                </div>
            </div>
            <div class="col-span-4 mx-auto">
                <div class="flex justify-center bg-white rounded-full shadow-md w-80 h-80 p-5">
                    <img src="/image/logo.svg" class="h-80 -mt-5" alt="Logo">
                </div>
            </div>
        </div>
    </div>


    <div class="max-w-7xl mx-auto p-5 mb-20">
        <div class="p-4 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 mb-5">
            <h5 class="mb-2 text-3xl font-bold text-gray-900">What are they saying?</h5>
            <p class="mb-3 text-base text-gray-500 sm:text-lg">Here are some testimonials from our
                customers who have stayed at Villa Oemah Biru Bali</p>
        </div>


        <div class="grid mb-8 gap-4 rounded-lg md:mb-12 md:grid-cols-2">

            @foreach ($reviews as $review)
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-white rounded-tl-2xl rounded-br-2xl border-b shadow-md">
                    <blockquote class="mx-auto mb-4 max-w-2xl text-gray-500 lg:mb-8">
                        <p class="my-4 font-light">"{{ $review->review }}"</p>
                    </blockquote>
                    @php
                        $reservation = DB::Table('reservations')
                            ->where('id', $review->reservation_id)
                            ->first();
                        
                        $user = DB::Table('users')
                            ->where('id', $reservation->user_id)
                            ->first();
                        
                        $avatar = 'https://ui-avatars.com/api/?name=' . $user->name;
                        
                    @endphp
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full" src={{ Storage::url('avatar/') . $user->avatar }}
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium text-left">
                            <div>{{ $user->name }}</div>
                        </div>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>

    <x-user.footer />

</x-layouts.home>
