<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Message - Admin</title>
    @include('layouts admin.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/pickr/pickr-themes.css" />

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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Tabel/</span>Pesan</h4>
                <!-- Basic Bootstrap Tabel -->

                <div class="card">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="card-header" style="padding: 25px 0px 10px 25px;">Tabel Pesan</h5>
                            <p style="padding: 0px 0px 0px 25px">Data pesan yang dikirim dari user</p>
                        </div>
                        <a href="/admin/form/create" class="btn btn-primary" style="height: fit-content; padding: 15px 30px 15px 30px; margin-top: 20px; margin-right: 20px;">Tambah artikel</a>

                    </div>
                    <form action="{{ route('form.search') }}" method="GET">
                        @csrf
                        <div class="col-md-12 d-flex justify-flex-start justify-content-space-between align-items-center ">
                            <div  style="display: flex; align-items: center; height: fit-content; margin-right: 10px; width: 100%;">
                                <h5 class="card-header" style="font-size: 16px;">cari artikel</h5>
                                <input
                                    type="search"
                                    name="nama"
                                    class="form-control"
                                    placeholder="cari artikel berdasarkan judul"/>
                              </div>
                              <div style="display: flex; align-items: center; height: fit-content; margin-right: 10px; width: 100%;">
                                <h5 class="card-header" style="font-size: 16px;">tanggal</h5>
                                <input
                                  type="text"
                                  name="time"
                                  class="form-control"
                                  placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                  id="flatpickr-range" />
                              </div>
                            <div style="margin-right: 20px; width: 30%;" >
                                <button type="submit" class="btn btn-outline-primary">
                                    Cari data
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>

                        </div>
                    </form>
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama pengirim</th>
                            <th>Email</th>
                            <th>Nomor hp</th>
                            <th>Pesan</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ( $message as $item )
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('form.delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item" href="{{ route('form.detail', $item->id) }}"><i class="ti ti-eye me-2"></i> Detail</a>
                                                <a class="dropdown-item" href="{{ route('form.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Edit</a>
                                                <button type="submit" class="dropdown-item"><i
                                                        class="ti ti-trash me-2"></i> Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{-- <nav aria-label="Page navigation" style="margin: 30px 30px 30px 20px;">
                        <ul class="pagination pagination-sm">
                            @if ($form->currentPage() > 1)
                                <li class="page-item prev">
                                    <a class="page-link" href="{{ $form->previousPageUrl() }}">
                                        <i class="tf-icon fs-6 ti ti-chevrons-left"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($form->lastPage() > 1)
                                <!-- First Page Link -->
                                @if ($form->currentPage() > 3)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $form->url(1) }}">1</a>
                                    </li>
                                    @if ($form->currentPage() > 4)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                <!-- Page Numbers -->
                                @for ($i = max(1, $form->currentPage() - 2); $i <= min($form->lastPage(), $form->currentPage() + 2); $i++)
                                    <li class="page-item {{ $i == $form->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $form->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Last Page Link -->
                                @if ($form->currentPage() < $form->lastPage() - 2)
                                    @if ($form->currentPage() < $form->lastPage() - 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $form->url($form->lastPage()) }}">{{ $form->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif

                            @if ($form->hasMorePages())
                                <li class="page-item next">
                                    <a class="page-link" href="{{ $form->nextPageUrl() }}">
                                        <i class="tf-icon fs-6 ti ti-chevrons-right"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav> --}}
                </div>
                <!--/ Basic Bootstrap Table -->

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
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/form-layouts.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/form-validation.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/pickr/pickr.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/forms-pickers.js"></script>
  </body>
</html>
