<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>hasil pencarian</title>
    @include('layouts.header')
</head>

<body class="home-page-2">
    <div class="scroll-progress bg-grey-900"></div>
    <!-- Start Preloader -->
    <div class="preloader text-center">
        <div class="loader"></div>
    </div>
    @include('layouts.navbar')
    <div class="bg-square"></div>
    @include('layouts.search')
    <!-- Start Main content -->
    <main>
        <section class="pt-65 pb-65">
            <div class="container">
                <div class="archive-header pb-65">
                    <div class="archive-header-title">
                        <h1 class="font-heading mb-30">Hasil Pencarian</h1>
                    </div>
                    <div class="breadcrumb">
                        <a href="index.html" rel="nofollow">Home</a>
                        <span></span> Lifestyle
                    </div>
                </div>
                <div class="hr"></div>
            </div>
        </section>
        <div class="recent-posts pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="loop-list loop-list-style-1  mb-md-30">
                            @forelse ( $search as $item )
                                <article class="hover-up-3 border-radius-10 overflow-hidden wow fadeIn animated">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ asset('assets/photo/' . $item->photo) }}">
                                                <a href="/artikel/detail/{{ $item->slug }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 align-self-center">
                                            <div class="post-content pr-30">
                                                <div class="post-meta-1 mb-20">
                                                    @php
                                                        $tags = explode(',', $item->tags);
                                                    @endphp
                                                    @foreach ($tags as $tag)
                                                    <a href="category.html" class="tag-category bg-brand-1 shadown-1 text-dark button-shadow hover-up-3">{{ $tag }}</a>
                                                    @endforeach
                                                </div>
                                                <h4 class="post-title mb-40">
                                                    <a class="" href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                                                </h4>
                                                <div class="d-flex" style="justify-content: space-between;">
                                                    <div class="post-excerpt text-grey-400 mb-30">
                                                        {{ substr(strip_tags($item->description), 0, 100) }}{{ strlen(strip_tags($item->description)) > 100 ? '...' : '' }}
                                                    </div>
                                                    <div class="text-right post-list-icon align-self-center w-30">
                                                        <a><i class="elegant-icon icon_ribbon_alt "></i></a>
                                                        <a><i class="elegant-icon icon_heart_alt "></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @empty
                                <h3>artikel tidak ditemukan</h3>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-lg-4 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget widget-latest-posts mb-50 wow fadeIn animated">
                                <div class="widget-header-1 position-relative mb-30">
                                    <h5 class="mt-5 mb-30 font-heading">Artikel terbaru</h5>
                                </div>
                                <div class="post-block-list post-module-1">
                                    <ul class="list-post">
                                        @foreach ($form4 as $item )
                                        <li class="wow fadeIn animated">
                                            <div class="d-flex latest-small-thumb">
                                                <div class="post-thumb d-flex mr-15 border-radius-10 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="/artikel/detail/{{ $item->slug }}" tabindex="0">
                                                        <img src="{{ asset('assets/photo/' . $item->photo) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body align-self-center">
                                                    <h5 class="post-title mb-15 text-limit-3-row font-medium">
                                                        <a href="/artikel/detail/{{ $item->slug }}" tabindex="0">{{ $item->title }}</a>
                                                    </h5>
                                                    <div class="entry-meta meta-1 float-left font-sm">
                                                        <span class="post-on has-dot">{{ $item->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main content -->
    <!--end site-bottom-->
    <!-- Footer Start-->
    @include('layouts.footer')
    <footer class="pt-65 bg-dark">
        <div class="container">
            <div class="row mb-65">
                <div class="col-md-6">
                    <div class="logo wow fadeIn animated">
                        <a href="index.html"> <img src="assets/imgs/theme/logo-white.svg" alt=""></a>
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
                            <li class="cat-item cat-item-2"><a href="#">About me</a></li>
                            <li class="cat-item cat-item-4"><a href="#">Help & Support</a></li>
                            <li class="cat-item cat-item-5"><a href="#">Licensing Policy</a></li>
                            <li class="cat-item cat-item-6"><a href="#">Refund Policy</a></li>
                            <li class="cat-item cat-item-7"><a href="#">Hire me</a></li>
                            <li class="cat-item cat-item-7"><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sidebar-widget widget_tagcloud wow fadeIn animated mb-30" data-wow-delay="0.2s">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Tagcloud</h5>
                        </div>
                        <div class="tagcloud mt-50">
                            <a class="tag-cloud-link" href="category.html">beautiful</a>
                            <a class="tag-cloud-link" href="category.html">New York</a>
                            <a class="tag-cloud-link" href="category.html">droll</a>
                            <a class="tag-cloud-link" href="category.html">intimate</a>
                            <a class="tag-cloud-link" href="category.html">loving</a>
                            <a class="tag-cloud-link" href="category.html">travel</a>
                            <a class="tag-cloud-link" href="category.html">fighting </a>
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
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/vendor/bootstrap.min.js"></script>
    <script src="./assets/js/vendor/jquery.slicknav.js"></script>
    <script src="./assets/js/vendor/slick.min.js"></script>
    <script src="./assets/js/vendor/wow.min.js"></script>
    <script src="./assets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/vendor/jquery.theia.sticky.js"></script>
    <!-- Template  JS -->
    <script src="./assets/js/main.js"></script>
</body>

</html>
