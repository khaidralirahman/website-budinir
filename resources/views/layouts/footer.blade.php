<!-- Footer Start-->
<footer class="pt-65 bg-dark">
    <div class="container">
        <div class="row mb-65">
            <div class="col-md-12 d-flex">
                <div class="logo wow fadeIn animated" style="margin-right: 10px; display: flex; align-items: center;">
                    <a href="/"> <img src="{{ asset('assets/') }}/imgs/theme/logowhite.png" alt=""></a>
                </div>
                <h2 class="post-title" style="width: 190px;">
                    <a href="/" style="font-weight: 700; color: 252525; ">BudiNir</a>
                </h2>
            </div>
            <div class="col-12">
                <div class="bottom-line mt-40"></div>
            </div>
        </div>
        <div class="row bottom-area-2">
            <div class="col-lg-4 col-md-6">
                <div class="sidebar-widget widget-about wow fadeIn animated mb-30">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Budinir</h5>
                    </div>
                    <div class="textwidget">
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
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="sidebar-widget widget_categories wow fadeIn animated mb-30" data-wow-delay="0.1s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Navigasi</h5>
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
                        <h5 class="mt-5 mb-30">Kategori</h5>
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
            <p class="float-md-left font-small text-muted">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , Budinir - Website by <a href="https://kawanlab4.com" target="_blank">kawanlab4</a></p>

        </div>
    </div>
</footer>
<!-- End Footer -->
