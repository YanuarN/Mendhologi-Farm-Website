@include('dasboard.adminHead')
@include('dasboard.sidebar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar Pengeluaran</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3 text-right">
                        <a href="{{ route('pengeluaran.create') }}" class="btn btn-success btn-sm">
                            <i class="bi bi-plus"></i> Add New
                        </a>

                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengeluarans as $pengeluaran)
                                <tr>
                                    <td>{{ $pengeluaran->idPengeluaran }}</td>
                                    <td>{{ $pengeluaran->jenis_pengeluaran }}</td>
                                    <td>Rp {{ number_format($pengeluaran->nominal, 0, ',', '.') }}</td>
                                    <td>{{ $pengeluaran->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('pengeluaran.edit', $pengeluaran->idPengeluaran) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('pengeluaran.destroy', $pengeluaran->idPengeluaran) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengeluaran ini?')">Hapus</button>
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