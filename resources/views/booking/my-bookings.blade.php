<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - Santara Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow px-8 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-yellow-600">Santara Hotel</a>
        <div class="flex gap-4">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-yellow-600">Home</a>
            <form method="POST" action="/logout">
                @csrf
                <button class="text-gray-600 hover:text-red-500">Logout</button>
            </form>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto py-12 px-8">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">Booking Saya</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($bookings->isEmpty())
            <div class="bg-white rounded-xl shadow p-8 text-center">
                <p class="text-gray-500">Belum ada booking.</p>
                <a href="{{ route('home') }}" class="mt-4 inline-block bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                    Pesan Sekarang
                </a>
            </div>
        @else
            <div class="space-y-4">
                @foreach($bookings as $booking)
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-bold text-gray-800">Booking #{{ $booking->id }}</h3>
                            <p class="text-gray-600 mt-1">Kamar {{ $booking->room->room_number }} - {{ $booking->room->type }}</p>
                            <p class="text-gray-500 text-sm mt-1">
                                {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}
                            </p>
                            <p class="text-yellow-600 font-bold mt-2">
                                Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 rounded-full text-sm font-bold
                                @if($booking->booking_status == 'confirmed') bg-green-100 text-green-700
                                @elseif($booking->booking_status == 'pending') bg-orange-100 text-orange-700
                                @elseif($booking->booking_status == 'cancelled') bg-red-100 text-red-700
                                @else bg-gray-100 text-gray-700
                                @endif">
                                {{ ucfirst($booking->booking_status) }}
                            </span>

                            @if($booking->booking_status == 'pending')
                            <form method="POST" action="{{ route('booking.cancel', $booking->id) }}" class="mt-2">
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Yakin mau batalkan booking ini?')"
                                    class="text-red-500 text-sm hover:underline">
                                    Batalkan
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>