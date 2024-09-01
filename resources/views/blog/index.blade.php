<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('layouts.header')
    <title>Halaman Artikel - Budinir</title>
    <meta name="title" content="Halaman Artikel" />
    <meta name="description" content="Kumpulan Artikel gratis yang dibuat oleh Budi Nirwanto" />

    <!-- Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://budinir.com/artikel" />
    <meta property="og:title" content="Halaman Artikel" />
    <meta property="og:description" content="Kumpulan Artikel gratis yang dibuat oleh Budi Nirwanto" />
    <meta property="og:image" content="{{ asset('assets/') }}/imgs/authors/image.png" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="https://budinir.com/artikel" />
    <meta name="twitter:title" content="Halaman Artikel" />
    <meta name="twitter:description" content="Kumpulan Artikel gratis yang dibuat oleh Budi Nirwanto" />
    <meta name="twitter:image" content="{{ asset('assets/') }}/imgs/authors/image.png" />
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
        <div class="entry-header entry-header-style-2 pb-80 pt-80 mb-50 text-white" style="background-image: url({{ asset('assets/') }}/imgs/authors/image.png)">
            <div class="entry-header-content">

                <h1 class="entry-title mb-15 fw-700">
                    Artikel
                </h1>
                <div class="post-meta-2 font-md d-flext align-self-center mb-md-30">
                    <span class=" text-white">Kumpulan Artikel gratis yang dibuat oleh Budi Nirwanto</span>
                </div>
            </div>
        </div>
        <section class="featured-grid pt-65 pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative mb-md-30">
                            <div class="carausel-post-1 hover-up border-radius-10 overflow-hidden transition-normal position-relative wow .img-fadeIn animated">
                                <div class="slide-fade-2">
                                    @foreach ( $form as $item )
                                        <div class="position-relative post-thumb">
                                            <div class="thumb-overlay position-relative" style="background-image: url({{ asset('assets/photo/' . $item->photo) }})">
                                                <a class="img-link" href="/artikel/detail/{{ $item->slug }}"></a>
                                                <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                                    <div class="post-meta-1 mb-20">
                                                        @php
                                                            $tags = explode(',', $item->tags);
                                                        @endphp
                                                        @foreach ($tags as $tag)
                                                            <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                                                        @endforeach
                                                        <span class="post-date text-white font-md">{{ $item->created_at->format('d F Y') }}</span>
                                                    </div>
                                                    <h3 class="post-title">
                                                        <a class="text-white" href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="slide-fade-arrow-cover-2"></div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="row">
                            @foreach ($form4 as $item)
                                <article class="col-lg-6 mb-30  mb-md-30">
                                    <div class="position-relative post-thumb border-radius-10 overflow-hidden hover-up-3">
                                        <div class="thumb-overlay position-relative" style="background-image: url({{ asset('assets/photo/' . $item->photo) }})">
                                            <a class="img-link" href="/artikel/detail/{{ $item->slug }}"></a>
                                            <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                                <div class="post-meta-1 mb-20">
                                                    @php
                                                        $tags = explode(',', $item->tags);
                                                    @endphp
                                                    @foreach ($tags as $tag)
                                                        <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                                                    @endforeach
                                                </div>
                                                <h5 class="post-title">
                                                    <a class="text-white" href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <section class="recent-posts pt-65 pb-30 position-relative">
            <div class="bg-square-2"></div>
            <div class="container">
                <div class="header-title mb-30">
                    <h3 class="font-heading mb-0 wow fadeIn animated text-white">Artikel</h3>
                    <span class="sub-header-title text-white wow fadeIn animated">Don't miss new trend</span>
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
                                <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                                @endforeach
                                </div>
                            </div>
                            <div class="post-content p-30">
                                <div class="post-card-content">
                                    <div class="entry-meta meta-1 float-left font-md mb-10">
                                        <span class="post-on has-dot">{{ $item->created_at->format('d F Y') }}</span>
                                    </div>
                                    <h4 class="post-title mb-5">
                                        <a href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                                    </h4>
                                    <div class="post-excerpt text-grey-400">
                                        {{ substr(strip_tags($item->description), 0, 50) }}{{ strlen(strip_tags($item->description)) > 50 ? '...' : '' }}
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
