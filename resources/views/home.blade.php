<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santara Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow px-8 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-yellow-600">Santara Hotel</h1>
        <div class="flex gap-4">
            @auth
                <a href="{{ route('my.bookings') }}" class="text-gray-600 hover:text-yellow-600">My Bookings</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="text-gray-600 hover:text-red-500">Logout</button>
                </form>
            @else
                <a href="/login" class="text-gray-600 hover:text-yellow-600">Login</a>
                <a href="/register" class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-600">Register</a>
            @endauth
        </div>
    </nav>

    <!-- Hero & Search -->
    <div class="bg-yellow-500 py-16 px-8 text-center text-white">
        <h2 class="text-4xl font-bold mb-2">Selamat Datang di Santara Hotel</h2>
        <p class="mb-8 text-yellow-100">Temukan kamar terbaik untuk liburan Anda</p>

        <form action="{{ route('search') }}" method="GET" class="bg-white rounded-xl p-6 max-w-3xl mx-auto flex flex-wrap gap-4 justify-center">
            <div class="flex flex-col text-left">
                <label class="text-gray-600 text-sm mb-1">Check-in</label>
                <input type="date" name="check_in" value="{{ request('check_in') }}" class="border rounded px-3 py-2 text-gray-700">
            </div>
            <div class="flex flex-col text-left">
                <label class="text-gray-600 text-sm mb-1">Check-out</label>
                <input type="date" name="check_out" value="{{ request('check_out') }}" class="border rounded px-3 py-2 text-gray-700">
            </div>
            <div class="flex flex-col text-left">
                <label class="text-gray-600 text-sm mb-1">Tipe Kamar</label>
                <select name="type" class="border rounded px-3 py-2 text-gray-700">
                    <option value="">Semua Tipe</option>
                    <option value="Standard">Standard</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">Cari Kamar</button>
            </div>
        </form>
    </div>

    <!-- Room List -->
    <div class="max-w-6xl mx-auto py-12 px-8">
        <h3 class="text-2xl font-bold text-gray-700 mb-6">Kamar Tersedia</h3>

        @if($rooms->isEmpty())
            <p class="text-gray-500">Tidak ada kamar tersedia.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($rooms as $room)
                <div class="bg-white rounded-xl shadow p-6">
                    <h4 class="text-xl font-bold text-gray-800">Kamar {{ $room->room_number }}</h4>
                    <p class="text-gray-500 mt-1">{{ $room->type }}</p>
                    <p class="text-yellow-600 font-bold text-lg mt-2">
                        Rp {{ number_format($room->price, 0, ',', '.') }} / malam
                    </p>
                    <a href="{{ route('booking.show', $room->id) }}"
                       class="mt-4 block text-center bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
                        Pesan Sekarang
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>