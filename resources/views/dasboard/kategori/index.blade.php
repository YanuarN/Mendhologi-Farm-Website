@extends('dasboard.adminHead')
@include('dasboard.sidebar')

<style>
    .btn-group .btn {
        height: 38px; /* Ubah tinggi sesuai kebutuhan */
    }
</style>


<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Kategori</h3>

                            <div class="card-tools">
                                <a href="{{ route('kategori.create') }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-plus"></i> Add New
                                </a>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kategoris as $kategori)
                                        <tr>
                                            <td>{{ $kategori->idKategori }}</td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('kategori.edit', $kategori->idKategori) }}" class="btn btn-primary mr-2">Edit</a>
                                                    <form action="{{ route('kategori.destroy', $kategori->idKategori) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
