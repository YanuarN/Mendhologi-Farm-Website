<div class="container">
    <h1>Order Page</h1>
    <!-- Form untuk mengirim data order -->
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div>
            <label for="alamat_kirim">Alamat Pengiriman:</label>
            <input type="text" id="alamat_kirim" name="alamat_kirim" required>
        </div>
        <div>
            <label for="no_whatsapp">Nomor Whatsapp:</label>
            <input type="text" id="no_whatsapp" name="no_whatsapp" required>
        </div>
        <div>
            <label for="nama_penerima">Nama Penerima:</label>
            <input type="text" id="nama_penerima" name="nama_penerima" required>
        </div>
        <button type="submit">Pesan</button>
    </form>
</div>
