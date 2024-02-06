@include('dasboard.adminHead')
@include('dasboard.sidebar')
@section('content')

    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tambah User Baru</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('user.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="nama_pengguna">Nama Pengguna</label>
                                        <input type="text" name="nama_pengguna" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="whatsapp">WhatsApp</label>
                                        <input type="text" name="whatsapp" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Tambah User</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
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
@endsection