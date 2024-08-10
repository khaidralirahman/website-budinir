<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>hasil pencarian kategori</title>
    @include('layouts.header')
</head>

<body class="home-page-2">
    <div class="scroll-progress bg-grey-900"></div>
    <!-- Start Preloader -->
    {{-- <div class="preloader text-center">
        <div class="loader"></div>
    </div> --}}
    @include('layouts.navbar')
    <div class="bg-square"></div>
    @include('layouts.search')
    <!-- Start Main content -->
    <main>
        <section class="pt-65 pb-65">
            <div class="container">
                <div class="archive-header pb-65">
                    <div class="archive-header-title">
                        <h1 class="font-heading mb-20" style="color: #6482ad;">Hasil Pencarian</h1>
                        <div class="d-flex align-items-center" style="gap: 15px;">
                            <h2 class="font-heading ">Katerori</h2>
                            <i class="fa-solid fa-chevron-right"></i>
                            <h2 class="font-heading " style="color: #6482ad;">{{ $tag }}</h2>
                        </div>
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
                            @forelse ( $form as $item )
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
                                                    <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                                                    @endforeach
                                                    <span class="post-date font-md text-grey-400">{{ $item->created_at->format('d F Y') }}</span>
                                                </div>
                                                <h4 class="post-title mb-5">
                                                    <a class="" href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                                                </h4>
                                                <div class="d-flex" style="justify-content: space-between;">
                                                    <div class="post-excerpt text-grey-400 mb-30">
                                                        {{ substr(strip_tags($item->description), 0, 100) }}{{ strlen(strip_tags($item->description)) > 100 ? '...' : '' }}
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
                                                    <h5 class="post-title mb-10 text-limit-3-row font-medium">
                                                        <a href="/artikel/detail/{{ $item->slug }}" style="color: #252525;" tabindex="0">{{ $item->title }}</a>
                                                    </h5>
                                                    <div class="entry-meta meta-1 float-left font-sm">
                                                        <span class="post-on has-dot" style="color: #6482AD;">{{ $item->created_at->format('d F Y') }}</span>
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
    <!-- End Footer -->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    @include('layouts.script')
</body>

</html>
