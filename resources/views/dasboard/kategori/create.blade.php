@include('dasboard.adminHead')
@include('dasboard.sidebar')

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Kategori Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('kategori.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
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
