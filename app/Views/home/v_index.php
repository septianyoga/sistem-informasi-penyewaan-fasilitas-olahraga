<main>
    <!--? Hero Area Start-->
    <div class="slider-area hero-bg1 hero-overly" style="background-image: url(<?= base_url() ?>/asset/img/gambar-atlet.jpg) !important; background-size: cover;">
        <div class="single-slider hero-overly  slider-height1 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10 pb-3">
                        <!-- Hero Caption -->
                        <div class="hero__caption pt-100">
                            <h1 style="font-weight: 500 !important;">SUBANG SPORT <text style="color: #08b4ac;">CENTER</text style="color: ;">
                            </h1>
                            <p>Olahraga untuk siapa saja, kapan saja, dimana saja guna meningkatkan kesehatan dan imun tubuh.</p>
                        </div>
                        <!--Hero form -->
                        <form action="<?= base_url('kategori') ?>" method="get" class="search-box mb-100">
                            <div class="select-form mt-2">
                                <div class="select-itms">
                                    <select name="kategori" id="select1" required>
                                        <option value="">Kategori</option>
                                        <option value="Futsal">Futsal</option>
                                        <option value="Badminton">Badminton</option>
                                        <option value="Voly">Voly</option>
                                        <option value="Basket">Basket</option>
                                        <option value="GYM">Gym</option>
                                        <option value="Tenis">Tenis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="select-form mt-2">
                                <div class="select-itms">
                                    <select name="kecamatan" id="kecamatan">
                                        <option value="">Pilih Kecamatan</option>

                                    </select>
                                </div>
                            </div>
                            <div class="search-form">
                                <button class="btn w-100"><i class="ti-search"></i> Cari</button>
                                <!-- <a href="#" type="submit"><i class="ti-search"></i> Cari</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero Area End-->
    <!--? Popular Locations Start 01-->
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 d-flex align-items-center" style="box-shadow: 3px 3px 10px 0px gray; border-radius: 10px 10px 10px 10px;">
                <img data-aos="fade-right" src="<?= base_url() ?>/asset/img/1.png" style=" width: 10%; max-width: 60%; min-width: 40%;" alt="">
                <span class="mt-4" style="margin-left: 12vw;" data-aos="fade-left">
                    <h1 style="font-size: 2vw;">PROMO PENGGUNA BARU!</h1>
                    <h1 class="mt-3" style="font-weight: 100 !important; font-size: 5vw; font-family: fantasy;">DISKON 20%</h1>
                    <p class="text-muted pt-3" style="font-size: 2vmin;"><i>S&K BERLAKU</i></p>
                </span>
            </div>
        </div>
    </div>

    <!--? Popular Directory Start -->
    <div class="popular-directorya-area  border-bottom section-padding40 fix" id="kategori">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-80">
                        <h2>Mau main apa?</h2>
                        <p>Silahkan pilih kategori.</p>
                        <p id="coba"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex flex-row flex-nowrap overflow-auto p-3" style="overflow: auto !important; width: 100%;">
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="<?= base_url('kategori/Futsal') ?>">
                            <div class="properties__card mt-2 d-flex align-items-center" style="box-shadow: 3px 3px 10px 0px gray; border-radius: 10px 10px 10px 10px; justify-content: space-evenly;">
                                <img src="<?= base_url() ?>/asset/img/2.png" style=" width: 40%; max-width: 70%; min-width: 40%;" alt="">
                                <h1 class="mt-3" style="font-weight: 30px !important; font-size: 2em; font-family: fantasy;">FUTSAL</h1>
                            </div>
                        </a>
                    </div>
                    <!-- Single -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="<?= base_url('kategori/Badminton') ?>">
                            <div class="properties__card mt-2 d-flex align-items-center" style="box-shadow: 3px 3px 10px 0px gray; border-radius: 10px 10px 10px 10px; width: 100%; justify-content: space-evenly;">
                                <img src="<?= base_url() ?>/asset/img/3.png" style=" width: 46%; max-width: 70%; min-width: 40%;" alt="">
                                <h1 class="mt-3 pr-5" style="font-weight: 30px !important; font-size: 2em; font-family: fantasy;">BADMINTON</h1>
                            </div>
                        </a>
                    </div>
                    <!-- Single -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="<?= base_url('kategori/Basket') ?>">
                            <div class="properties__card mt-2 d-flex align-items-center" style="box-shadow: 3px 3px 10px 0px gray; border-radius: 10px 10px 10px 10px; justify-content: space-evenly;">
                                <img src="<?= base_url() ?>/asset/img/basket.png" style=" width: 48%; max-width: 70%; min-width: 40%;" alt="">
                                <h1 class="mt-3" style="font-weight: 30px !important; font-size: 2em; font-family: fantasy;">Basket</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="<?= base_url('kategori/Tenis') ?>">
                            <div class="properties__card mt-2 d-flex align-items-center" style="box-shadow: 3px 3px 10px 0px gray; border-radius: 10px 10px 10px 10px; justify-content: space-evenly;">
                                <img src="<?= base_url() ?>/asset/img/4.png" style=" width: 39%; max-width: 70%; min-width: 40%;" alt="">
                                <h1 class="mt-3" style="font-weight: 30px !important; font-size: 2em; font-family: fantasy;">TENIS</h1>
                            </div>
                        </a>
                    </div>
                    <!-- Single -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="<?= base_url('kategori/GYM') ?>">
                            <div class="properties__card mt-2 d-flex align-items-center" style="box-shadow: 3px 3px 10px 0px gray; border-radius: 10px 10px 10px 10px; justify-content: space-evenly;">
                                <img src="<?= base_url() ?>/asset/img/5.png" style=" width: 48%; max-width: 70%; min-width: 40%;" alt="">
                                <h1 class="mt-3" style="font-weight: 30px !important; font-size: 2em; font-family: fantasy;">GYM</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="<?= base_url('kategori/Voly') ?>">
                            <div class="properties__card mt-2 d-flex align-items-center" style="box-shadow: 3px 3px 10px 0px gray; border-radius: 10px 10px 10px 10px; justify-content: space-evenly;">
                                <img src="<?= base_url() ?>/asset/img/voly.png" style=" width: 61%; max-width: 70%; min-width: 40%; margin-left: -20px;" alt="">
                                <h1 class="mt-3" style="font-weight: 30px !important; font-size: 2em; font-family: fantasy;">Voly</h1>
                            </div>
                        </a>
                    </div>
                    <!-- Single -->
                </div>
            </div>
            <style>
                #map {
                    width: 80vw;
                    height: 45vw;
                    z-index: 1;
                }

                @media (max-width: 991px) {
                    #map {
                        width: 90vw;
                        height: 80vw;
                        display: flex;
                        justify-content: center;
                    }
                }
            </style>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-30 mt-30">
                        <h2>Mencari Lokasi Fasilitas ?</h2>
                        <p>Silahkan Cari Dengan Maps Dibawah ini.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="gis">
                <div class="col-12">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    <!--? Popular Directory End -->

</main>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/3213.json`)
        .then(response => response.json())
        .then(name => name.forEach(function(item) {
            $('#kecamatan').append('<option value="' + item.name + '">' + item.name + '</option>');
            // alert(item.name)
        }));
    // $.ajax({
    //     url: 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/3213.json',
    //     type: 'GET',
    //     success: function(result) {
    //         // var data = JSON.stringify(result)
    //         // console.log(result)
    //         result.forEach(function(item) {
    //             $('#kecamatan').append('<option value="' + item.name + '">' + item.name + '</option>');
    //             // alert(item.name)
    //         });

    //     }
    // })
</script>
<script>
    const map = L.map('map').setView([-6.562107, 107.760549], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    <?php foreach ($lokasi as $key => $value) { ?>
        L.marker([<?= $value['lokasi'] ?>]).addTo(map)
            .on('click', function() {
                Swal.fire({
                    icon: 'info',
                    title: 'Nama Pemilik : <?= $value['nama_penyewa'] ?>',
                    html: 'Alamat Fasilitas : <?= $value['alamat'] ?> <br> No Telp: <?= $value['no_telp'] ?> ',
                    footer: '<a href="<?= base_url('fasilitas/owner/' . $value['id_owner']) ?>" class="text-hijau">Lihat Detail</a>'
                })
            })
        // .openPopup();
        // map.on('click', onMapClick);
    <?php } ?>

    function onMapClick(e) {
        alert("You clicked the map at " + e.latlng);
    }
</script>
<script>
    function detail() {
        Swal.fire({
            title: 'Sweet!',
            text: 'Modal with a custom image.',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
        })
    }
</script>