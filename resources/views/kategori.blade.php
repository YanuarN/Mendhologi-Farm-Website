<form action="{{ route('kategoris.store') }}" method="post">
        @csrf
        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" name="nama_kategori" id="nama_kategori" required>
        @error('nama_kategori')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Tambah Kategori</button>
</form>