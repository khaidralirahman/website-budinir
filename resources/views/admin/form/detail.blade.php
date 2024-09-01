<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir edit - super admin</title>
    @include('layouts admin.header')
    {{-- page css --}}
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('layouts admin.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layouts admin.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Detail Artikel/</span> {{ $form->title }}</h4>

                <!-- Bootstrap Validation -->
                <div class="row mb-5">
                    <div class="col-md-12 col-lg-12 mb-3">
                        <div class="card h-100">
                          <img class="card-img-top" src="{{ asset('assets/photo/' . $form->photo) }}" alt="{{ $form->title }}" />
                          <div class="card-body">
                            <div class="d-flex" style="justify-content: space-between; flex-wrap: wrap;">
                                <h5 class="card-title" style="font-size: 30px">{{ $form->title }}</h5>
                                <div class="d-flex" style="gap: 10px ">
                                    @php
                                    $tags = explode(',', $form->tags);
                                    @endphp
                                    @foreach ($tags as $tag)
                                    <a href="" class="btn btn-outline-primary">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex" style="flex-wrap: wrap;">
                                <span class="card-text" style="margin-right: 15px;">
                                    <i class="ti ti-clock-edit"></i>
                                    {{ $form->created_at->diffForHumans() }}
                                </span>
                                <span class="card-text" style="margin-right: 15px;">
                                    <i class="ti ti-thumb-up"></i>
                                    {{ $form->likes->count() }} suka
                                </span>
                                <span class="card-text" style="margin-right: 15px;">
                                    <i class="ti ti-message"></i>
                                    {{ $form->comment->count() }} komentar
                                </span>
                                <span class="card-text" style="margin-right: 15px;">
                                    <i class="ti ti-eye"></i>
                                    {{ $form->views }} dilihat
                                </span>
                            </div>
                            <p class="card-text">
                                {!! $form->description !!}
                            </p>
                            <div class="col-sm-12 col-lg-12 mb-2">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center">
                                        <object data="{{ asset('assets/file/' . $form->file) }}"
                                            type="application/pdf" width="100%" height="600px">
                                            <p>Browser tidak mendukung tampilan PDF. Anda dapat <a
                                                    href="{{ asset('assets/file/' . $form->file) }}"
                                                    download>men-download</a> dokumen ini.</p>
                                        </object>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 col-lg-6 mb-3">
                                    <h5 class="card-title mb-10" style="font-size: 24px;">Daftar komentar</h5>
                                    @forelse ($form->comment as $comment)
                                        <div class="column" style="margin-top: 10px; margin-bottom: 10px">
                                            <div class="d-flex align-items-center" style="justify-content: space-between;">
                                                <div class="column" style="gap: 5px">
                                                    <h5 class="card-title" style="margin-bottom: 5px">{{ $comment->user->name }}</h5>
                                                    <h6 style="color: #a2a1a1;">{{ $comment->user->email }}</h6>
                                                </div>
                                                <p>{{ $comment->created_at->diffForHumans() }}</p>
                                            </div>
                                            <p class="card-text mb-10">{{ $comment->comment }}</p>
                                        </div>
                                        <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger delete" data-id="{{ $comment->id }}">
                                                Hapus komentar
                                            </button>
                                        </form>
                                    @empty
                                        <h5 class="card-title" style="margin-bottom: 5px">tidak ada komentar</h5>
                                    @endforelse

                                </div>
                                <div class="col-md-6 col-lg-6 mb-3">
                                    <h5 class="card-title mb-10" style="font-size: 24px;">Daftar suka</h5>
                                    @forelse ($form->likes as $like)
                                        <div class="column" style="margin-top: 10px; margin-bottom: 10px">
                                            <div class="d-flex align-items-center" style="justify-content: space-between;">
                                                <div class="column" style="gap: 5px">
                                                    <h5 class="card-title" style="margin-bottom: 5px">{{ $like->user->name }}</h5>
                                                    <h6 style="color: #a2a1a1;">{{ $like->user->email }}</h6>
                                                </div>
                                                <p>{{ $like->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    @empty
                                        <h5 class="card-title" style="margin-bottom: 5px">tidak ada suka</h5>
                                    @endforelse
                                </div>
                            </div>

                          </div>
                        </div>
                      </div>
                </div>
                  <!-- /Bootstrap Validation -->
            </div>




            <!-- / Content -->

            <!-- Footer -->
            @include('layouts admin.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('layouts admin.script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete', function(e){
            var notificationid = $(this).attr('data-id');
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
            title: "Hapus komentar?",
            text: "Anda tidak bisa mengembalikan komentar jika dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus sekarang"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "Berhasil dihapus",
                text: "Komentar berhasil dihapus",
                icon: "success"
                });
            }
            });
        });
    </script>
    <!-- Vendors JS -->
  </body>
</html>
