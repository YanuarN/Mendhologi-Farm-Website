@include('dasboard.adminHead')
@include('dasboard.sidebar')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Tombol Tambah Kategori -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
                    </div>
                </div>

                <!-- Daftar Kategori -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabel untuk menampilkan daftar kategori -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
                                    <!-- Tambah kolom-kolom lain sesuai kebutuhan -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->nama_kategori }}</td>
                                    <!-- Tambah data kategori lain sesuai kebutuhan -->
                                    <td>
                                        <!-- Tambah tombol aksi seperti edit, hapus, dll. -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div><!-- /.content-wrapper -->
@endsection
@include('dasboard.js')