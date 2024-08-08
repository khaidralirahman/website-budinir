<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Budinir - Profesional artikel</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/') }}/imgs/theme/logo.png">
    <!-- Template CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/widgets.css">
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/responsive.css">


</head>

<body class="home-page-1">
    <div class="scroll-progress bg-grey-900"></div>
    <!-- Start Preloader -->
    <div class="preloader text-center">
        <div class="loader"></div>
    </div>
    <!--Offcanvas sidebar-->
    <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar">
        <button class="off-canvas-close"><img class="svg-icon-24" src="{{ asset('assets/') }}/imgs/theme/svg/close.svg" alt=""></button>
        <div class="sidebar-inner">
            <div class="sidebar-widget widget-creative-menu">
                <ul>
                    @foreach ($tagItem as $item )
                    <li><a href="{{ route('search.tag', $item->tag) }}">{{ $item->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="offcanvas-copyright mt-65">
                <h6 class="text-muted text-uppercase mb-20 font-heading text-white">Flow Magazine</h6>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio suspendisse leo neque.
                </p>
                <p><strong class="color-black">Address</strong><br>
                    123 Main Street<br>
                    New York, NY 10001</p>
                <p><strong class="color-black">Phone</strong><br>
                    (+01) 234 567 89</p>
            </div>
        </div>
    </aside>
    <!-- Start Header -->
    <header class="main-header header-sticky">
        <div class="position-relative">
            <div class="container align-self-center">
                <div class="header-style-1">
                    <div class="logo" style="width: auto; display: flex; gap: 10px; align-items: center;">
                        <a href="/" style="max-width: 50px; height: 50px;"><img src="{{ asset('assets/') }}/imgs/theme/logo.png" alt=""></a>
                        <h2 class="post-title" style="width: 190px;">
                            <a href="/" style="font-weight: 700; color: 252525; ">BudiNir</a>
                        </h2>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav>
                            <!--Desktop menu-->
                            <ul class="main-menu d-none d-lg-inline">
                                <li> <a href="/tentang-saya">Tentang saya</a> </li>
                                <li> <a href="/kontak">Kontak saya</a> </li>
                                <li> <a href="/e-commerce">E-commerce</a></li>
                            </ul>
                            <!--Mobile menu-->
                            <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                                <li> <a href="/tentang-saya">Tentang saya</a> </li>
                                <li> <a href="/artikel">Artikel</a> </li>
                                <li> <a href="/kontak">Kontak saya</a> </li>
                                <li> <a href="/e-commerce">E-commerce</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--end: main-nav-->
                    <div class="header-right">
                        <button class="search-icon d-md-inline">
                            <img src="{{ asset('assets/') }}/imgs/theme/svg/search.svg" alt="">
                        </button>
                        @auth
                            <form action="/logout" class="btn" method="post">
                                @csrf
                                <button type="submit" class="btn btn-md bg-dark text-white ml-15 box-shadow d-none d-lg-inline">
                                    Logout
                                </button>
                            </form>
                        @else
                        <button class="btn btn-md bg-dark text-white ml-15 box-shadow d-none d-lg-inline"><a href="/login">Masuk</a></button>
                        @endauth
                    </div>
                </div>
                <div class="mobile_menu d-lg-none d-block"></div>
            </div>
            <div class="off-canvas-toggle-cover d-inline-block">
                <div class="off-canvas-toggle hidden d-inline-block" id="off-canvas-toggle">
                    <img class="svg-icon-24" src="{{ asset('assets/') }}/imgs/theme/svg/menu.svg" alt="">
                </div>
            </div>
        </div>
    </header>

    <div class="bg-square"></div>
    <!--Start search form-->
    <div class="main-search-form bg-brand-4">
        <div class="container">
            <div class=" pt-50 pb-50 ">
                <div class="row mb-20">
                    <div class="col-12 align-self-center main-search-form-cover m-auto">
                        <p class="text-center"><span class="display-1">Search</span></p>
                        <form action="{{ route('search') }}" method="GET" class="search-header">
                            @csrf
                            <div class="input-group w-100">
                                <input type="text" class="form-control" name="title" placeholder="Cari artikel disini...">
                                <div class="input-group-append">
                                    <button class="btn btn-search bg-white" type="submit">
                                        <img class="svg-icon-24" src="{{ asset('assets/') }}/imgs/theme/svg/search.svg" alt="">
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-80 text-center">
                    <div class="col-12 font-small suggested-area">
                        <h5 class="suggested font-heading mb-20 text-white"> <strong>Suggested keywords:</strong></h5>
                        <ul class="list-inline d-inline-block">
                            @foreach ($tagItem as $item )
                            <li class="list-inline-item"><a href="{{ route('search.tag', $item->tag) }}">{{ $item->tag }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Main content -->

    <main>
        <div class="container mt-50 mb-10">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h1 class="entry-title mb-20 fw-700">
                        Selamat Datang di Webbsite BudiNir
                    </h1>
                    <div class="post-meta-2 font-md d-flext align-self-center mb-md-30">
                        <span class="time-to-read has-dot text-dark">Kami dengan senang hati menyajikan kumpulan artikel-artikel yang bervariasi dan dapat dinikmati oleh siapa saja, dari pelajar tingkat Menengah Atas, Mahasiswa, hingga para profesional yang ingin meningkatkan pengetahuan dan keterampilan mereka. Di sini, Anda akan menemukan berbagai artikel yang mencakup berbagai topik praktis, misalnya terkait dengan Project Management, Leadership, Software Development, serta berbagai pengetahuan praktis lainnya, misalnya Fleet Management System, Warehouse Management System dll. Semua artikel yang kami sajikan dapat digunakan secara gratis (free), baik untuk tujuan pendidikan, pengembangan diri, maupun kepentingan perusahaan dimana Anda bekerja. Kami berharap konten-konten ini dapat menjadi sumber inspirasi dan informasi yang berharga bagi Anda.
                            Jika Anda memiliki permintaan khusus terkait artikel yang ditayangkan untuk kepentingan komersial, jangan ragu untuk menghubungi kami melalui email di budi.nirwanto@gmail.com atau WhatsApp only, Kami selalu siap membantu dan menjawab pertanyaan Anda.
                            Terima kasih telah mengunjungi website kami. Semoga artikel-artikel kami dapat memberikan manfaat yang besar bagi perjalanan pendidikan dan pengembangan pribadi Anda.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" style="display: flex; align-items: center;">
                    <div class="imgcover" style="height: 100%">
                        <img class="border-radius-10" src="assets/imgs/news/bg-head.png" alt="flow">
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-50 mb-10">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-30" style="display: flex; align-items: center;">
                    <div class="imgcover" style="height: 100%">
                        <img class="border-radius-10" src="assets/imgs/news/bg-head.png" alt="flow">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h1 class="entry-title mb-20 fw-700">
                        Judul
                    </h1>
                    <div class="post-meta-2 font-md d-flext align-self-center mb-md-30">
                        <span class="time-to-read has-dot text-dark">Artikel-artikel yang akan kami sajikan mencakup topik-topik praktis dan beragam, termasuk Project Management, Leadership hingga Software Development dan lain-lain yang akan ditentukan kemudian. Kami memahami bahwa di era digital ini, pengetahuan yang aplikatif dan keterampilan praktis sangat diperlukan untuk menghadapi tantangan di berbagai bidang. Dengan demikian, setiap artikel dirancang untuk memberikan wawasan mendalam serta keterampilan praktis yang dapat langsung diterapkan dalam konteks nyata. Selain itu, kami juga menyediakan artikel mengenai berbagai sistem manajemen, misalnya Fleet Management System, Warehouse Management System. Topik-topik ini dipilih dengan cermat untuk memastikan bahwa konten yang Anda akses dapat menambah wawasan untuk pekerjaan Anda. Kami berharap bahwa informasi ini akan membantu Anda dalam mengelola dan mengoptimalkan berbagai aspek operasional di tempat kerja Anda. Yang lebih menarik, semua artikel yang kami tawarkan dapat diakses secara gratis. Ini adalah bagian dari komitmen kami untuk mendukung pendidikan, pengembangan diri, dan kemajuan profesional. Kami percaya bahwa pengetahuan seharusnya dapat diakses oleh semua orang.  Dengan membaca dan memanfaatkan konten yang kami sajikan, kami yakin Anda akan mendapatkan manfaat yang signifikan dan dapat memperluas wawasan serta keterampilan yang Anda miliki.</span>
                    </div>
                </div>
            </div>
        </div>
        <section class="container mt-50">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="col">
                            <img src="assets/imgs/theme/svg/instagram.svg" alt="">
                        </div>
                        <div class="col-lg-10 col-md-10">
                            <h4>judul</h4>
                            <p>test</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="col">
                            <img src="assets/imgs/theme/svg/instagram.svg" alt="">
                        </div>
                        <div class="col-lg-10 col-md-10">
                            <h4>judul</h4>
                            <p>test</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="col">
                            <img src="assets/imgs/theme/svg/instagram.svg" alt="">
                        </div>
                        <div class="col-lg-10 col-md-10">
                            <h4>judul</h4>
                            <p>test</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-slider-1 pt-65 pb-65">
            <div class="position-relative">
                <div class="featured-slider-1-arrow color-white"></div>
                <div class="container">
                    <div class="hero-1 featured-slider-1-items mb-65">
                        @foreach ( $form4 as $item )
                        <div class="slider-single">
                            <div class="row">
                                <div class="col-lg-6 align-self-center">
                                    <div class="post-meta-1 mb-20">
                                        @php
                                        $tagitem = explode(',', $item->tags);
                                        @endphp
                                        @foreach ($tagitem as $tag)
                                            <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                                        @endforeach
                                        <span class="post-date text-muted font-md">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                    <h2 class="post-title mb-30">
                                        <a href="/artikel/detail/{{ $item->slug }}">
                                            {{ $item->title }}
                                        </a>
                                    </h2>
                                    <div class="post-excerpt text-grey-400 mb-30">
                                        {{ substr(strip_tags($item->description), 0, 100) }}{{ strlen(strip_tags($item->description)) > 100 ? '...' : '' }}
                                    </div>
                                    <div class="post-meta-2 font-md d-flext align-self-center mb-md-30">
                                        <a href="page-author.html">
                                            <img src="{{ asset('assets/') }}/imgs/authors/author.jpg" alt="">
                                            <span class="author-namge">{{ $item->contributor }}</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="imgcover">
                                        <img class="border-radius-10" src="{{ asset('assets/photo/' . $item->photo) }}" alt="flow">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="featured-slider-1-nav row">
                    @foreach ( $form4 as $item )
                    <div class="col d-flex transition-normal latest-small-thumb">
                        <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                            <a class="imgcover2 color-white" href="/artikel/detail/{{ $item->slug }}">
                                <img src="{{ asset('assets/photo/' . $item->photo) }}" alt="">
                            </a>
                        </div>
                        <div class="post-content media-body align-self-center">
                            <h5 class="post-title mb-15 text-limit-2-row font-medium">
                                <a href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                            </h5>
                            <div class="entry-meta meta-1 float-left font-sm">
                                <span class="post-on">{{ $item->created_at->diffForHumans() }}</span>
                                <span class="post-by has-dot">13k views</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--End: featured-1 -->
        <section class="trending pt-65 pb-65 position-relative">
            <div class="bg-square-2"></div>
            <div class="container">
                <h3 class="mb-65 font-heading wow fadeIn animated">Trending Topics</h3>
                <div class="row">
                    @foreach ($form as $item)
                        <article class="col-lg-4 col-md-6 mb-40 wow fadeIn animated">
                            <div class="post-card-1 border-radius-10 hover-up">
                                <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ asset('assets/photo/' . $item->photo) }}">
                                    <a class="img-link" href="/artikel/detail/{{ $item->slug }}"></a>
                                    <div class="post-meta-1 mb-20">
                                        @php
                                            $tagitem = explode(',', $item->tags);
                                        @endphp
                                        @foreach ($tagitem as $tag)
                                        <a href="{{ route('search.tag', $item->title) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="post-content p-30">
                                    <div class="post-card-content">
                                        <div class="entry-meta meta-1 float-left font-md mb-10">
                                            <span class="post-on has-dot">{{ $item->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h5 class="post-title font-md">
                                            <a  href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="pb-65">
            <div class="container">
                <h3 class="mb-65 font-heading wow fadeIn animated">Editor's picked</h3>
                <div class="position-relative wow fadeIn animated">
                    <div class="slide-fade slide-fade-inner bg-brand-4 border-radius-10 p-65 p-sm-25">
                        @foreach ( $form4 as $item )
                            <div class="slide-fade-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="post-meta-1 mb-20 mt-50">
                                            <a href="{{ route('search.tag', $item->title) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3" style="color: white">Lifestyle</a>
                                            <span class="post-date text-muted font-md">{{ $item->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2 class="post-title mb-30 fw-700">
                                            <a href="/artikel/detail/{{ $item->slug }}">
                                                {{ $item->title }}
                                            </a>
                                        </h2>
                                        <div class="post-excerpt text-grey-400 mb-30">
                                            {{ substr(strip_tags($item->description), 0, 100) }}{{ strlen(strip_tags($item->description)) > 100 ? '...' : '' }}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <figure class="position-relative">
                                            <img class="border-radius-10 post-thumb" src="{{ asset('assets/photo/' . $item->photo) }}" alt="flow">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slide-fade-arrow-cover"></div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main content -->
    <!--end site-bottom-->
    <!-- Footer Start-->
<footer class="pt-65 bg-dark">
    <div class="container">
        <div class="row mb-65">
            <div class="col-md-6">
                <div class="logo wow fadeIn animated">
                    <a href="/"> <img src="assets/imgs/theme/logo-white.svg" alt=""></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex text-right text-sm-left align-self-center justify-content-end wow fadeIn animated">
                    <h5 class="mr-15 text-white mb-0 align-self-center">All you need to build new site</h5>
                    <button class="btn btn-lg bg-brand-1">Download Now</button>
                </div>
            </div>
            <div class="col-12">
                <div class="bottom-line mt-40"></div>
            </div>
        </div>
        <div class="row bottom-area-2">
            <div class="col-lg-4 col-md-6">
                <div class="sidebar-widget widget-about wow fadeIn animated mb-30">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">About</h5>
                    </div>
                    <div class="textwidget">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio suspendisse leo neque iaculis molestie sagittis maecenas aenean eget molestie sagittis.
                        </p>
                        <p><strong class="color-black">Address</strong><br>
                            123 Main Street<br>
                            New York, NY 10001</p>
                        <p><strong class="color-black">Phone</strong><br>
                            (+01) 234 567 89</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="sidebar-widget widget_categories wow fadeIn animated mb-30" data-wow-delay="0.1s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Quick link</h5>
                    </div>
                    <ul class="font-small">
                        <li class="cat-item cat-item-2"><a href="/tentang-saya">Tentang saya</a></li>
                        <li class="cat-item cat-item-4"><a href="/artikel">Artikel</a></li>
                        <li class="cat-item cat-item-5"><a href="/kontak">Kontak</a></li>
                        <li class="cat-item cat-item-6"><a href="#">E-Commerce</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="sidebar-widget widget_tagcloud wow fadeIn animated mb-30" data-wow-delay="0.2s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Tagcloud</h5>
                    </div>
                    <div class="tagcloud mt-50">

                        @foreach ($tagItem as $item)
                            <a class="tag-cloud-link" href="{{ route('search.tag', $item->tag) }}">{{ $item->tag }}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copy-right pt-30 mt-20 wow fadeIn animated font-md">
            <p class="float-md-left font-small text-muted">&copy; 2021, Flow - Design by <a href="https://alithemes.com" target="_blank">AliThemes</a></p>
            <ul class="social-network d-inline-block list-inline color-white mb-20 float-right">
                <li class="list-inline-item"><a href="#" target="_blank" title="Facebook"><i class="elegant-icon social_facebook"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="Pin it"><i class="elegant-icon social_skype"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- End Footer -->

    <div class="dark-mark"></div>
    <!-- Vendor JS-->
<script src="{{ asset('assets/') }}/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="{{ asset('assets/') }}/js/vendor/jquery-3.5.1.min.js"></script>
<script src="{{ asset('assets/') }}/js/vendor/bootstrap.min.js"></script>
<script src="{{ asset('assets/') }}/js/vendor/jquery.slicknav.js"></script>
<script src="{{ asset('assets/') }}/js/vendor/slick.min.js"></script>
<script src="{{ asset('assets/') }}/js/vendor/wow.min.js"></script>
<script src="{{ asset('assets/') }}/js/vendor/jquery.scrollUp.min.js"></script>
<script src="{{ asset('assets/') }}/js/vendor/jquery.theia.sticky.js"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/') }}/js/main.js"></script>

</body>

</html>
