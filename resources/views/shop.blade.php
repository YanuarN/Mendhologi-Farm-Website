@include('header')

		<!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Shop</h1>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <!-- Daftar Kategori -->
                        <ul class="list-inline">
                            @foreach($kategoris as $kategori)
                            <li class="list-inline-item"><a href="#" onclick="sortProducts('{{ $kategori->idKategori }}')">{{ $kategori->nama_kategori }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Hero Section -->

    
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @foreach($hewans as $hewan)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('shop.show', $hewan->idHewan) }}">
                        <img src="{{ asset('storage/' . $hewan->foto) }}" alt="Nama Gambar">
                        <h3 class="product-title">{{ $hewan->jenis }}</h3>
                        <p class="product-title">{{  $hewan->berat  }}Kg</p>
                        <strong class="product-price">Rp {{ number_format($hewan->harga, 0, ',', '.') }}</strong>
                        <span class="icon-cross">
                            <img src="images/cart.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    

@include('footer')