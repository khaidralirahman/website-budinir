<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Komentar artikel - Admin</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Table/</span>Article</h4>
                <!-- Basic Bootstrap Table -->

                <div class="card">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="card-header" style="padding: 25px 0px 10px 25px;">Table Article</h5>
                            <p style="padding: 0px 0px 0px 25px">Disini tempat untuk melihat dan menambah artikel</p>
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
                              <div  style="display: flex; align-items: center; height: fit-content; margin-right: 10px; width: 100%;">
                                <h5 class="card-header" style="font-size: 16px;">Tag</h5>
                                <select id="tag" class="form-select" name="tag">
                                    <option value="" disabled selected>pilih tag</option>
                                    @foreach ($tag as $item)
                                    <option value="{{ $item->title }}" {{ old('title') === $item->title ? 'selected' : '' }}>
                                        {{ $item->title }}
                                    </option>
                                    @endforeach
                                </select>
                              </div>
                              <div style="display: flex; align-items: center; height: fit-content; margin-right: 10px; width: 100%;">
                                <h5 class="card-header" style="font-size: 16px;">Hasil pencarian</h5>
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
                            <th>Judul artikel</th>
                            <th>Tag</th>
                            <th>Komentar</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ( $form as $item )
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->tags }}</td>
                                <td>{{ $item->time }}</td>
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
                                                <a class="dropdown-item" href=""><i class="ti ti-eye me-2"></i> Detail</a>
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
