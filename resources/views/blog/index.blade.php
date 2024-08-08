<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Budinir - Profesional artikel</title>
    @include('layouts.header')
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
        <section class="pt-65 pb-35 bg-brand-4">
            <div class="container">
                <div class="archive-header">
                    <div class="archive-header-title">
                        <h1 class="font-heading mb-30">Artikel
                        </h1>
                        <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit<br> Asperiores non dolor officiis eaque corporis.</p>
                    </div>
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> Artikel
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-slider-1 pt-65 pb-65">
            <div class="position-relative">
                <div class="featured-slider-1-arrow color-white"></div>
                <div class="container">
                    <div class="hero-1 featured-slider-1-items mb-65">
                        @foreach ( $form as $item )
                        <div class="slider-single">
                            <div class="row">
                                <div class="col-lg-6 align-self-center">
                                    <div class="post-meta-1 mb-20">
                                        <a href="{{ route('search.tag', $item->tags) }}" class="tag-category bg-brand-1 shadown-1 text-dark button-shadow hover-up-3">Lifestyle</a>
                                        <span class="post-date text-muted font-md">{{ $item->time }}</span>
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
                    @foreach ( $form as $item )
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
                                <span class="post-on">{{ $item->time }}</span>
                                <span class="post-by has-dot">13k views</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="recent-posts pt-65 pb-30 position-relative">
            <div class="bg-square-2"></div>
            <div class="container">
                <div class="header-title mb-65">
                    <h3 class="font-heading mb-0 wow fadeIn animated">Artikel</h3>
                    <span class="sub-header-title text-grey-400 wow fadeIn animated">Don't miss new trend</span>
                </div>
                <div class="row">
                    @foreach ($form as $item )
                    <article class="col-lg-6 col-md-6 mb-30 wow fadeIn animated">
                        <div class="post-card-1 large border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ asset('assets/photo/' . $item->photo) }})">
                                <a class="img-link" href="/artikel/detail/{{ $item->slug }}"></a>
                                <div class="post-meta-1 mb-20">
                                    @php
                                    $tags = explode(',', $item->tags);
                                @endphp
                                @foreach ($tags as $tag)
                                <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-dark button-shadow hover-up-3">{{ $tag }}</a>
                                @endforeach
                                </div>
                            </div>
                            <div class="post-content p-30">
                                <div class="post-card-content">
                                    <div class="entry-meta meta-1 float-left font-md mb-10">
                                        <span class="post-on has-dot">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                    <h4 class="post-title mb-30">
                                        <a href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                                    </h4>
                                    <div class="post-meta-2 font-md">
                                        <a href="page-author.html">
                                            <img src="{{ asset('assets/photo/' . $item->photo) }}" alt="">
                                            <span class="author-namge">Kate Adie</span>
                                        </a>
                                        <span class="time-to-read has-dot">6 mins to read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
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
