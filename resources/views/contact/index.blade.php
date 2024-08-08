<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Budinir - Profesional blog and articles</title>
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
                        <h1 class="font-heading mb-30">Contact
                        </h1>
                        <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit<br> Asperiores non dolor officiis eaque corporis.</p>
                    </div>
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> Contact
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-100 pb-65">
            <div class="container">
                <h3 class="font-heading mb-50">Get in Touch</h3>
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
                                <button class="btn btn-lg bg-dark text-white submit" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="pl-30">
                            <div class="icon-map mb-15 hover-up-3">
                                <img src="assets/imgs/theme/svg/map.svg" alt="">
                            </div>
                            <h5 class="mb-50">
                                Lorem 142 Str, 2352, Ipsum<br> State, USA
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
