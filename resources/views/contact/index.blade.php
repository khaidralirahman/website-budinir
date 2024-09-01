<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('layouts.header')
    <title>Kontak saya - Budinir</title>
    <meta name="title" content="Kontak saya - Budinir" />
    <meta name="description" content="Kumpulan Artikel gratis yang dibuat oleh Budi Nirwanto" />

    <!-- Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://budinir.com/artikel" />
    <meta property="og:title" content="Kontak saya - Budinir" />
    <meta property="og:description" content="Kumpulan Artikel gratis yang dibuat oleh Budi Nirwanto" />
    <meta property="og:image" content="{{ asset('assets/') }}/imgs/authors/image22.png" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="https://budinir.com/artikel" />
    <meta name="twitter:title" content="Kontak saya - Budinir" />
    <meta name="twitter:description" content="Kumpulan Artikel gratis yang dibuat oleh Budi Nirwanto" />
    <meta name="twitter:image" content="{{ asset('assets/') }}/imgs/authors/image22.png" />
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
        <div class="entry-header entry-header-style-2 pb-80 pt-80 mb-50 text-white" style="background-image: url({{ asset('assets/') }}/imgs/authors/image22.png)">
            <div class="entry-header-content">

                <h1 class="entry-title mb-15 fw-700">
                    Kontak Saya
                </h1>
                <div class="post-meta-2 font-md d-flext align-self-center mb-md-30">
                    <span class=" text-white">Anda bisa mengirim pesan dengan mengisi form dibawah ini</span>
                </div>
            </div>
        </div>
        <section class="pt-50 pb-65">
            <div class="container">
                <h3 class="font-heading mb-50">Formulir Pesan</h3>
                <div class="row">
                    <div class="col-md-8">
                        <form class="form-contact comment_form" action="{{ route('kontak.store') }}" id="commentForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Nama anda">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="name" type="email" placeholder="Email anda">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" id="phone" placeholder="Nomor telepon">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="comment" cols="30" rows="9" placeholder="Pesan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg bg-dark text-white submit" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="pl-30">
                            <div class="icon-map mb-15 hover-up-3" style="background: #6482ad;">
                                <img src="assets/imgs/theme/svg/map.svg" style="filter: brightness(0) invert(1);" alt="">
                            </div>
                            <h5 class="mb-50">
                                Jl. Bina Mukti No. 7, Komplek Buciper, Kota Cimahi-40512
                            </h5>
                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.submit', function(e){
            var notificationid = $(this).attr('data-id');
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
            title: "Sudah yakin dengan pesan anda?",
            text: "Pesan anda akan dikirim ke admin",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, kirim sekarang"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "Pesan berhasil dikirim",
                text: "Mohon tunggu balasan dari admin",
                icon: "success"
                });
            }
            });
        });
    </script>
</body>

</html>
