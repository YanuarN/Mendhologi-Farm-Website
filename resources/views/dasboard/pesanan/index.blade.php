@include('dasboard.adminHead')
@include('dasboard.sidebar')

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pesanan</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto Hewan</th>
                                        <th>Nama Pemesan</th>
                                        <th>Nama Penerima</th>
                                        <th>Alamat Penerima</th>
                                        <th>No. Whatsapp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="width: 200px; height: auto;">
                                            <img src="{{ asset('storage/public/' . $item->hewan->foto) }}" alt="Foto Hewan" style="width: 100%; height: auto;">
                                        </td>
                                        <td>{{ $item->user->nama_pengguna }}</td> 
                                        <td>{{ $item->nama_penerima }}</td>
                                        <td>{{ $item->alamat_kirim }}</td>
                                        <td>{{ $item->no_whatsapp }}</td>
                                        <td>
                                            <form action="{{ route('pesanan.destroy', $item->idPesanan) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                            </form>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
