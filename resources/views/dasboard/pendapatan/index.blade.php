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

                    <div class="row mb-3">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('pendapatan.create') }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-plus"></i> Add New
                                </a>
                            </div>
                            <div class="d-flex">
                                <form action="{{ route('pendapatan.index') }}" method="GET" class="form-inline mr-2">
                                    <div class="form-group mx-2">
                                        <input type="text" name="search" class="form-control form-control-sm" value="{{ $query ?? '' }}" placeholder="Search">
                                    </div>
                                    <input type="hidden" name="sort_by" value="{{ $sortBy }}">
                                    <input type="date" name="start_date" class="form-control form-control-sm" value="{{ $startDate ?? '' }}" placeholder="Start Date">
                                    <input type="date" name="end_date" class="form-control form-control-sm" value="{{ $endDate ?? '' }}" placeholder="End Date">
                                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                </form>
                                <div class="form-inline">
                                    <a href="{{ route('pendapatan.exportPdf', ['sort_by' => $sortBy, 'search' => $query, 'start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-primary btn-sm">Export PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Jenis Pendapatan</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
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
                                        <td>{{ $pendapatan->formatted_created_at }}</td>
                                        <td>
                                            <a href="{{ route('pendapatan.edit', $pendapatan->idPendapatan) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('pendapatan.destroy', $pendapatan->idPendapatan) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pendapatan ini?')">Hapus</button>
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
</div>

<style>
    .form-inline {
        display: flex;
        align-items: center;
    }
    .mr-2 {
        margin-right: 0.5rem;
    }
</style>