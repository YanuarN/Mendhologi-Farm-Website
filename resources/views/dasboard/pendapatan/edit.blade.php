@include('dasboard.adminHead')
@include('dasboard.sidebar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Pendapatan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pendapatan.update', $pendapatan->idPendapatan) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="jenis_pendapatan" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Pendapatan') }}</label>

                            <div class="col-md-6">
                                <input id="jenis_pendapatan" type="text" class="form-control @error('jenis_pendapatan') is-invalid @enderror" name="jenis_pendapatan" value="{{ $pendapatan->jenis_pendapatan }}" required autocomplete="jenis_pendapatan" autofocus>

                                @error('jenis_pendapatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nominal" class="col-md-4 col-form-label text-md-right">{{ __('Nominal') }}</label>

                            <div class="col-md-6">
                                <input id="nominal" type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="{{ $pendapatan->nominal }}" required autocomplete="nominal">

                                @error('nominal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ $pendapatan->keterangan }}" required autocomplete="keterangan">

                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                                <a href="{{ route('pendapatan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>