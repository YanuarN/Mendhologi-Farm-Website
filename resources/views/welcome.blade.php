@include('header')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Mendologi<span clsas="d-block">Farm</span></h1>
                    <p class="mb-4">Temukan hewan ternak berkualitas unggul hanya di peternakan kami, pilihan utama untuk suplai hewan ternak terbaik.</p>
                    <p><a href="" class="btn btn-secondary me-2">Shop Now</a></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-img-wrap">
                    <img src="images/farm.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Dipelihara Dengan Nutrisi Yang Tepat</h2>
                <p class="mb-4">Mau Qurban hewan apa tahun ini? Cari hewan qurbanmu disini </p>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.html">
                    <img src="images/cow.png" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Sapi</h3>
                </a>
            </div>
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.html">
                    <img src="images/goat.png" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Kambing</h3>
                </a>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.html">
                    <img src="images/Sheep.png" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Domba</h3>
                </a>
            </div>
            <!-- End Column 4 -->

        </div>
    </div>
</div>

<section class="about-us" id="about-us">
    <div class="container">
        <div class="row" style="display: flex; justify-content: space-between;">
            <div class="col-lg-6">
                <h2>Kenapa Harus Hewan Dari Peternakan Kami?</h2>
                <p>Peternakan kami memiliki beberapa keunggulan yang membuatnya unggul di antara yang lain. Hewan-hewan kami diberi makan dengan perhatian khusus terhadap nutrisi, sehingga daging yang dihasilkan memiliki kualitas yang tinggi. Selain itu, kami juga menyediakan hewan dengan bibit unggul, yang memastikan bahwa keturunan hewan kami memiliki kualitas genetik yang baik. Kami juga menjaga lingkungan sekitar dengan baik, memastikan keberlanjutan lingkungan. Dengan keunggulan-keunggulan ini, kami yakin bahwa peternakan kami dapat memenuhi kebutuhan akan produk peternakan berkualitas tinggi.</p>
            </div>
            <div class="col-lg-6">
                <img src="images/why.png" alt="" style="max-height: 400px; width: auto; display: block; margin-left: auto; margin-right: 0;">
            </div>
        </div>
    </div>
</section>

<section class="service" id="service">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4" >
                <img src="images/service.png" alt="" style="max-height: 500px; width: auto; display: block; margin-top: 0;">
            </div>
            <div class="col-lg-6">
                <h2>Layanan Kami</h2>
                <p>Dengan bangga kami menawarkan beragam layanan yang mencakup penjualan berbagai jenis hewan ternak seperti kambing, domba, dan sapi, 
                    serta menyediakan bahan dasar pembuatan silase yang berkualitas tinggi.
                    Selain itu, kami juga menyediakan silase siap pakai yang telah teruji dan siap untuk memberikan nutrisi terbaik kepada ternak Anda. 
                    Dengan komitmen kami terhadap kualitas dan kepuasan pelanggan, kami siap memenuhi kebutuhan peternakan Anda dengan layanan yang handal dan profesional.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End Product Section -->
@include('footer')

</html>
