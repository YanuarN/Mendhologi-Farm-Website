@include('dasboard.adminHead')
@include('dasboard.sidebar')

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Hewan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('hewan.update', $hewan->idHewan) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" class="form-control" required>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->idKategori }}"
                                                @if ($hewan->idKategori == $kategori->idKategori) selected @endif>
                                                {{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <input type="text" name="jenis" class="form-control"
                                        value="{{ $hewan->jenis }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="berat">Berat</label>
                                    <input type="text" name="berat" class="form-control"
                                        value="{{ $hewan->berat }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" class="form-control"
                                        value="{{ $hewan->harga }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Hewan</button>
                                <a href="{{ route('hewan.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
