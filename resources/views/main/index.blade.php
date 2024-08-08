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
        <section class="featured-grid pt-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative mb-md-30">
                            <div class="carausel-post-1 overflow-hidden transition-normal position-relative">
                                <div class="slide-fade-2">
                                    @foreach ($form4 as $item)
                                    <div class="position-relative post-slider-3 pb-120">
                                        <div class="thumb-overlay position-relative border-radius-10" style="background-image: url({{ asset('assets/photo/' . $item->photo) }})">
                                            <a class="img-link" href="/artikel/detail/{{ $item->slug }}"></a>
                                            <span class="top-right-icon bg-white"><i class="elegant-icon icon_ribbon_alt "></i></span>
                                        </div>
                                        <div class="post-content-overlay layout-2">
                                            <div class="post-meta-1 mb-20">
                                                @php
                                                $tagitem = explode(',', $item->tags);
                                                @endphp
                                                @foreach ($tagitem as $tag)
                                                    <a href="{{ route('search.tag', $tag) }}" class="tag-category bg-brand-1 shadown-1 text-white button-shadow hover-up-3">{{ $tag }}</a>
                                                @endforeach
                                                <span class="post-date font-md text-grey-400">{{ $item->created_at->diffForHumans() }}</span>
                                            </div>
                                            <h2 class="post-title">
                                                <a href="/artikel/detail/{{ $item->slug }}">{{ $item->title }}</a>
                                            </h2>
                                            <div class="post-excerpt text-grey-400 mb-30">
                                                {{ substr(strip_tags($item->description), 0, 100) }}{{ strlen(strip_tags($item->description)) > 100 ? '...' : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="slide-fade-arrow-cover-2 layout-2"></div>
                        </div>
                    </div>
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
    @include('layouts.footer')
    <div class="dark-mark"></div>
    @include('layouts.script')
</body>

</html>
