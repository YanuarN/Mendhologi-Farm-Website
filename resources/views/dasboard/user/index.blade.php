@include('dasboard.adminHead')
@include('dasboard.sidebar')


<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar User</h3>

                            <div class="card-tools">
                                <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-plus"></i> Add New
                                </a>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <div class="container mx-auto">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>WhatsApp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->idPengguna }}</td>
                                                <td>{{ $user->nama_pengguna }}</td>
                                                <td>{{ $user->alamat }}</td>
                                                <td>{{ $user->whatsapp }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('user.edit', $user->idPengguna) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="bi bi-pencil"></i> Edit
                                                        </a>
                                                        <form action="{{ route('user.destroy', $user->idPengguna) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                                <i class="bi bi-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
