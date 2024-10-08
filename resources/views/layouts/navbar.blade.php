<!--Offcanvas sidebar-->
<aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar">
    <button class="off-canvas-close"><img class="svg-icon-24" src="{{ asset('assets/') }}/imgs/theme/svg/close.svg" alt=""></button>
    <div class="sidebar-inner">
        <div class="sidebar-widget widget-creative-menu">
            <ul>
                @foreach ($tagItem as $item )
                <li><a href="{{ route('search.tag', $item->tag) }}">{{ $item->tag }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="offcanvas-copyright mt-65">
            <h6 class="text-muted text-uppercase mb-20 font-heading text-white">Budinir</h6>
            <p>
                Kami dengan senang hati menyajikan kumpulan artikel-artikel yang bervariasi dan dapat dinikmati oleh siapa saja, dari pelajar tingkat Menengah Atas, Mahasiswa, hingga para profesional yang ingin meningkatkan pengetahuan dan keterampilan mereka.
            </p>
            <p><strong class="color-black">Alamat</strong><br>
                Jl. Bina Mukti No. 7, <br>
                Komplek Buciper, <br>
                Kota Cimahi-40512</p>
            <p><strong class="color-black">Telepon</strong><br>
                +628117096666</p>
        </div>
    </div>
</aside>
<!-- Start Header -->
<header class="main-header header-sticky">
    <div class="position-relative">
        <div class="container align-self-center">
            <div class="header-style-1">
                <div class="logo" style="width: auto; display: flex; gap: 10px; align-items: center;">
                    <a href="/" style="max-width: 30px; height: 30px;"><img src="{{ asset('assets/') }}/imgs/theme/logo.png" alt=""></a>
                    <h4 class="post-title" >
                        <a href="/" style="font-weight: 700; color: 252525; ">BudiNir</a>
                    </h4>
                </div>
                <div class="main-nav d-none d-lg-block">
                    <nav>
                        <!--Desktop menu-->
                        <ul class="main-menu d-none d-lg-inline">
                            <li> <a href="/tentang-saya">Tentang saya</a> </li>
                            <li> <a href="/artikel">Artikel</a> </li>
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
