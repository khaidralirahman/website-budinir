<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir tag - super admin</title>
    @include('layouts admin.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/dropzone/dropzone.css" />
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir dinas</h4>

                <!-- Bootstrap Validation -->
                <div class="row">
                        <form action="{{ route('tag.store') }}" class="col-md-12" method="post" enctype="multipart/form-data">
                            <!-- Form untuk tambah data -->
                            @csrf
                            <div class="card mb-4">
                                <h5 class="card-header">Input Tag</h5>
                                <div class="card-body">

                                    <div class="col-12">
                                        <div class="card" style="margin-bottom: 30px">
                                          <h5 class="card-header">Form Repeater</h5>
                                          <div class="card-body">
                                            <form class="form-repeater">
                                              <div data-repeater-list="group-a">
                                                <div data-repeater-item>
                                                  <div class="row">
                                                    <div class="mb-3 col-lg-6 col-xl-10 col-12 mb-0">
                                                      <label class="form-label" for="form-repeater-1-1">Input Tag</label>
                                                      <input type="text" id="form-repeater-1-1" name="tag[]" class="form-control" placeholder="input tag" value="{{ old('question') }}"/>
                                                    </div>
                                                    <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                                      <button class="btn btn-label-danger mt-4" data-repeater-delete>
                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                        <span class="align-middle">Delete</span>
                                                      </button>
                                                    </div>
                                                  </div>
                                                  <hr />
                                                </div>
                                              </div>
                                              <div class="mb-0">
                                                <button class="btn btn-primary" data-repeater-create>
                                                  <i class="ti ti-plus me-1"></i>
                                                  <span class="align-middle">Add</span>
                                                </button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>

                                    <div class="d-grid gap-2 col-lg-6 mx-auto">
                                        <button class="btn btn-primary btn-lg submit" type="submit">Save</button>
                                        <!-- Tombol untuk menyimpan data -->
                                    </div>
                                </div>
                            </div>
                        </form>

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
    <!-- Vendors JS -->
    <script src="{{ asset('assets admin/assets/') }}/js/forms-extras.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.submit', function(e){
            var notificationid = $(this).attr('data-id');
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
            title: "Simpan Tag?",
            text: "Tag yang anda simpan bisa di edit kembali",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, kirim sekarang"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "Tag berhasil disimpan",
                text: "Selamat menikmati hari anda",
                icon: "success"
                });
            }
            });
        });
    </script>
  </body>
</html>
