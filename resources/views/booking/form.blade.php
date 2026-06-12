<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking - Santara Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow px-8 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-yellow-600">Santara Hotel</a>
    </nav>

    <div class="max-w-2xl mx-auto py-12 px-8">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">Form Pemesanan Kamar</h2>

        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800">Detail Kamar</h3>
            <p class="text-gray-600 mt-2">Nomor Kamar: <strong>{{ $room->room_number }}</strong></p>
            <p class="text-gray-600">Tipe: <strong>{{ $room->type }}</strong></p>
            <p class="text-yellow-600 font-bold text-lg mt-2">
                Rp {{ number_format($room->price, 0, ',', '.') }} / malam
            </p>
        </div>

        <form action="{{ route('booking.store') }}" method="POST" class="bg-white rounded-xl shadow p-6">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">

            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Tanggal Check-in</label>
                <input type="date" name="check_in" required
                    class="w-full border rounded px-3 py-2 @error('check_in') border-red-500 @enderror">
                @error('check_in')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Tanggal Check-out</label>
                <input type="date" name="check_out" required
                    class="w-full border rounded px-3 py-2 @error('check_out') border-red-500 @enderror">
                @error('check_out')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-yellow-500 text-white py-3 rounded-lg font-bold hover:bg-yellow-600">
                Konfirmasi Pemesanan
            </button>
        </form>
    </div>

</body>
</html>