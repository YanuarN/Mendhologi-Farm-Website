@include('header')

		<!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-7">
                        <div class="intro-excerpt">
                            <h1>Shop</h1>
                            <p>Temukan hewan qurban dengan kualitas terbaik di peternakan kami!</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Daftar Kategori -->
                        <form action="{{ route('shop.index') }}" method="GET">
                            <div class="mb-3">
                                <label for="sort_by" class="form-label">Kategori Hewan:</label>
                                <select class="form-select" name="sort_by" id="sort_by">>
                                    <option value="defult">Default</option>
                                    <option value="Domba">Domba</option>
                                    <option value="Kambing">Kambing</option>
                                    <option value="Sapi">Sapi</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    <!-- End Hero Section -->

    
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @foreach($hewans as $hewan)
                @if($hewan->isReady)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('shop.show', $hewan->idHewan) }}">
                        <img src="{{ asset('storage/public/' . $hewan->foto) }}" alt="Nama Gambar">
                        <h3 class="product-title">{{ $hewan->jenis }}</h3>
                        <p class="product-title">{{  $hewan->berat  }}Kg</p>
                        <strong class="product-price">Rp {{ number_format($hewan->harga, 0, ',', '.') }}</strong>
                        <span class="icon-cross">
                            <img src="images/cart.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
@include('footer')