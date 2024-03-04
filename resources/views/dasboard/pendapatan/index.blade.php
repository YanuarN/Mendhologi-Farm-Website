@include('dasboard.adminHead')
@include('dasboard.sidebar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar Pendapatan</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3 text-right">
                        <a href="{{ route('pendapatan.create') }}" class="btn btn-success btn-sm">
                            <i class="bi bi-plus"></i> Add New
                        </a>

                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Pendapatan</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendapatans as $pendapatan)
                                <tr>
                                    <td>{{ $pendapatan->idPendapatan }}</td>
                                    <td>{{ $pendapatan->jenis_pendapatan }}</td>
                                    <td>Rp {{ number_format($pendapatan->nominal, 0, ',', '.') }}</td>
                                    <td>{{ $pendapatan->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('pendapatan.edit', $pendapatan->idPendapatan) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('pendapatan.destroy', $pendapatan->idPendapatan) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pendapatan ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>