@include('dasboard.adminHead')
@include('dasboard.sidebar')

    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('user.update', $user->idPengguna) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="nama_pengguna">Nama Pengguna</label>
                                        <input type="text" name="nama_pengguna" class="form-control"
                                            value="{{ $user->nama_pengguna }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="whatsapp">WhatsApp</label>
                                        <input type="text" name="whatsapp" class="form-control"
                                            value="{{ $user->whatsapp }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
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

