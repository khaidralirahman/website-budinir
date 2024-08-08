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
