@include('dasboard.adminHead')
@include('dasboard.sidebar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Pendapatan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pendapatan.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="jenis_pendapatan" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Pendapatan') }}</label>

                            <div class="col-md-6">
                                <input id="jenis_pendapatan" type="text" class="form-control @error('jenis_pendapatan') is-invalid @enderror" name="jenis_pendapatan" value="{{ old('jenis_pendapatan') }}" required autocomplete="jenis_pendapatan" autofocus>

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
                                <input id="nominal" type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="{{ old('nominal') }}" required autocomplete="nominal">

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
                                <textarea id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" required autocomplete="keterangan" rows="4">{{ old('keterangan') }}</textarea>

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
                                <a href="{{ route('pendapatan.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>