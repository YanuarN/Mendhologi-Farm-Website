<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hewan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .hewan-details {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .hewan-details img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #3b5d50;;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hewan-details">
            <img src="{{ asset('storage/' . $hewan->foto) }}" alt="{{ $hewan->jenis }}">
            <h2>{{ $hewan->jenis }}</h2>
            <p>Berat: {{ $hewan->berat }} Kg</p>
            <p>Harga: Rp {{ number_format($hewan->harga, 0, ',', '.') }}</p>
            <!-- Tambahkan informasi lainnya sesuai kebutuhan -->

            <!-- Tombol Kembali -->
            <a href="{{ url()->previous() }}" class="btn">Kembali</a>
            <!-- Tombol Pesan -->
            <a href="{{ route('order.create', ['idHewan' => $hewan->idHewan]) }}" class="btn">Pesan</a>
        </div>
    </div>
</body>
</html>
