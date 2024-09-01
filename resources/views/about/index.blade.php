<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('layouts.header')
    <title>Tentang Budi Nirwanto - Budinir</title>
    <meta name="title" content="Tentang Budi Nirwanto - Budinir" />
    <meta name="description" content="Profile dari Budi Nirwanto" />

    <!-- Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://budinir.com/tentang-saya" />
    <meta property="og:title" content="Tentang Budi Nirwanto - Budinir" />
    <meta property="og:description" content="Profile dari Budi Nirwanto" />
    <meta property="og:image" content="{{ asset('assets/') }}/imgs/imgs/news/img-truck.png" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="https://budinir.com/tentang-saya" />
    <meta name="twitter:title" content="Tentang Budi Nirwanto - Budinir" />
    <meta name="twitter:description" content="Profile dari Budi Nirwanto" />
    <meta name="twitter:image" content="{{ asset('assets/') }}/imgs/imgs/news/img-truck.png" />
</head>

<body class="home-page-1">
    <div class="scroll-progress bg-grey-900"></div>
    <!-- Start Preloader -->
    <div class="preloader text-center">
        <div class="loader"></div>
    </div>
    @include('layouts.navbar')
    <div class="bg-square"></div>
    @include('layouts.search')
    <main>
        <section class="pt-65 pb-65 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <h6 class="text-uppercase font-heading text-muted mb-15">Tentang saya</h6>
                        <h2 class="font-heading mb-5">
                            Budi Nirwanto
                        </h2>
                        <p>Memiliki pengalaman 30 tahun dalam Pengembangan Sistem Informasi, saya telah terlibat dalam berbagai proyek pengembangan perangkat lunak, mulai dari Project Manager, Data Flow Analyst, System Flow Analyst, Business Analyst, Database Designer, Software Testing hingga Programmer.
                            Saya memulai karier di Divisi Teknologi Informasi PT Industri Pesawat Terbang Nusantara (sekarang PT Dirgantara Indonesia) selama 7 tahun. Selanjutnya, saya terlibat dalam pengembangan Customer Support Information System (CSIS) di Divisi Aircraft Service selama 7 tahun berikutnya. CSIS adalah perangkat lunak perawatan pesawat yang terintegrasi dengan Inventory dan Customer Order. Dalam posisi terakhir saya, saya bertanggung jawab untuk meningkatkan dan memelihara perangkat lunak CSIS serta perangkat lunak lainnya yang dikembangkan oleh Divisi Teknologi Informasi.
                            Pada tahun 1999, saya bergabung dengan Transavia Group di PT Transavia Informatika Pratama dengan posisi terakhir sebagai Project Manager, di mana saya bertanggung jawab untuk menyiapkan proposal dan melaksanakan proyek. Sejak Juni 2004, saya memulai karier baru di PT Travira Air hingga tahun 2012, dengan tanggung jawab utama pada Teknologi Informasi di perusahaan tersebut, khususnya Integrated Aviation Software (yang dikembangkan oleh Integrated Aviation Software Pty Ltd, Australia). Saya juga terlibat dalam identifikasi dan pengembangan perangkat lunak di PT Travira Air.
                            Mulai tahun 2012, saya beralih ke bisnis pribadi dan sambil bekerja selama 11 tahun di perusahaan yang mengoperasikan Fleet Management System (FMS) untuk transporter logistik di seluruh Indonesia. Dalam peran ini, saya bertanggung jawab atas operasional FMS, termasuk merancang dan menyusun SOP, serta terlibat dalam pengembangan FMS dan ekosistemnya. Saya juga menjabat sebagai Head of Presales, Head of Document Controller, dan posisi lainnya.
                            Pada tahun 2024 ini, saya ingin menuliskan berbagai pengalaman dan pengetahuan saya dengan harapan dapat bermanfaat bagi pembaca.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/imgs/news/img-truck.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-65 pb-65 position-relative">
            <div class="container">
                <h6 class="text-uppercase font-heading text-muted mb-15">Galeri Budi Nirwanto</h6>
                <img src="assets/imgs/news/img-truck-putih.png" alt="">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mt-30">
                        <img src="assets/imgs/news/img-truck1.png" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 mt-30">
                        <img src="assets/imgs/news/img-truck2.png" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main content -->
    <!--end site-bottom-->
    @include('layouts.footer')
    <div class="dark-mark"></div>
    @include('layouts.script')
</body>

</html>
