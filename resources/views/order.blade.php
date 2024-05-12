<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pemesanan</title>
    <style>
        body {
            background-color: #3b5d50; /* Warna latar belakang */
            color: #020202; /* Warna teks */
            font-family: Arial, sans-serif; /* Font family */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 600px;
            height: 400px;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff; /* Warna latar belakang */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Shadow */
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #3b5d50; /* Warna border */
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 30px;
            border: none;
            border-radius: 5px;
            background-color: #3b5d50; /* Warna tombol */
            color: #ffffff; /* Warna teks tombol */
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2e4c40; /* Warna tombol saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pemesanan</h1>
        <!-- Form untuk mengirim data order -->
        <form action="{{ route('order.store') }}" method="POST">
            @csrf

            <div>
                <label for="nama_penerima">Nama Penerima:</label>
                <input type="text" id="nama_penerima" name="nama_penerima" required>
            </div>
            <div>
                <label for="alamat_kirim">Alamat Pengiriman:</label>
                <input type="text" id="alamat_kirim" name="alamat_kirim" required>
            </div>
            <div>
                <label for="no_whatsapp">Nomor Whatsapp:</label>
                <input type="text" id="no_whatsapp" name="no_whatsapp" required>
            </div>
            <div>
                <input type="text" id="idHewan" name="idHewan" value={{ $hewans->idHewan }} hidden>
            </div>
            <button type="submit">Pesan</button>
        </form>
    </div>
</body>
</html>
