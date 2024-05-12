@include('dasboard.adminHead')
@include('dasboard.sidebar')

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Hewan</h3>

                            <div class="card-tools">
                                <a href="{{ route('hewan.create') }}" class="btn btn-success btn-sm">
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
                                        <th>Foto</th>
                                        <th>Jenis</th>
                                        <th>Berat</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hewans as $hewan)
                                    <tr>
                                        <td>{{ $hewan->idHewan }}</td>
                                        <td>
                                            @if($hewan->foto)
                                            <img src="{{ asset('storage/public/' . $hewan->foto) }}" alt="Foto Hewan" style="width: 100px;">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        <td>{{ $hewan->jenis }}</td>
                                        <td>{{ $hewan->berat }}Kg</td>
                                        <td>Rp {{ number_format($hewan->harga, 0, ',', '.') }}</td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('hewan.edit', $hewan->idHewan) }}" class="btn btn-primary mr-2">Edit</a>
                                                <form action="{{ route('hewan.destroy', $hewan->idHewan) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this animal?')">Delete</button>
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
