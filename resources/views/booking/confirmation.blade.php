<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Booking - Santara Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow px-8 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-yellow-600">Santara Hotel</a>
    </nav>

    <div class="max-w-2xl mx-auto py-12 px-8">
        <div class="bg-white rounded-xl shadow p-8 text-center">
            <div class="text-green-500 text-6xl mb-4">✓</div>
            <h2 class="text-2xl font-bold text-gray-700 mb-2">Booking Berhasil!</h2>
            <p class="text-gray-500 mb-6">Terima kasih telah memesan di Santara Hotel</p>

            <div class="text-left bg-gray-50 rounded-lg p-6 mb-6">
                <h3 class="font-bold text-gray-700 mb-4">Detail Pemesanan</h3>
                <div class="grid grid-cols-2 gap-3 text-sm">
                    <p class="text-gray-500">Booking ID</p>
                    <p class="font-bold">#{{ $booking->id }}</p>
                    <p class="text-gray-500">Kamar</p>
                    <p class="font-bold">{{ $booking->room->room_number }} - {{ $booking->room->type }}</p>
                    <p class="text-gray-500">Check-in</p>
                    <p class="font-bold">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</p>
                    <p class="text-gray-500">Check-out</p>
                    <p class="font-bold">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</p>
                    <p class="text-gray-500">Total Harga</p>
                    <p class="font-bold text-yellow-600">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                    <p class="text-gray-500">Status</p>
                    <p class="font-bold text-orange-500">{{ ucfirst($booking->booking_status) }}</p>
                </div>
            </div>

            <div class="flex gap-4 justify-center">
                <a href="{{ route('my.bookings') }}"
                   class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                    Lihat Booking Saya
                </a>
                <a href="{{ route('home') }}"
                   class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300">
                    Kembali ke Home
                </a>
            </div>
        </div>
    </div>

</body>
</html>