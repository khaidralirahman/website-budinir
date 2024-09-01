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

                    </div>
                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama pengirim</th>
                            <th>Email</th>
                            <th>Nomor hp</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ( $messages as $item )
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action=""
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="dropdown-item btn-lihat me-2" data-bs-toggle="modal" data-bs-target="#basicModal" data-message-id="{{ $item->id }}">
                                                        <i class="fa fa-eye me-2"></i>
                                                        <span>Detail</span>
                                                </button>
                                                <a class="dropdown-item"
                                                    href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to={{ $item->email }}" target="blank"><i
                                                        class="ti ti-pencil me-2"></i> send email</a>
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
                    <nav aria-label="Page navigation" style="margin: 30px 30px 30px 20px;">
                  <ul class="pagination pagination-sm">
                      @if ($messages->currentPage() > 1)
                          <li class="page-item prev">
                              <a class="page-link" href="{{ $messages->previousPageUrl() }}">
                                  <i class="tf-icon fs-6 ti ti-chevrons-left"></i>
                              </a>
                          </li>
                      @endif

                      @if ($messages->lastPage() > 1)
                          <!-- First Page Link -->
                          @if ($messages->currentPage() > 3)
                              <li class="page-item">
                                  <a class="page-link" href="{{ $messages->url(1) }}">1</a>
                              </li>
                              @if ($messages->currentPage() > 4)
                                  <li class="page-item disabled"><span class="page-link">...</span></li>
                              @endif
                          @endif

                          <!-- Page Numbers -->
                          @for ($i = max(1, $messages->currentPage() - 2); $i <= min($messages->lastPage(), $messages->currentPage() + 2); $i++)
                              <li class="page-item {{ $i == $messages->currentPage() ? 'active' : '' }}">
                                  <a class="page-link" href="{{ $messages->url($i) }}">{{ $i }}</a>
                              </li>
                          @endfor

                          <!-- Last Page Link -->
                          @if ($messages->currentPage() < $messages->lastPage() - 2)
                              @if ($messages->currentPage() < $messages->lastPage() - 3)
                                  <li class="page-item disabled"><span class="page-link">...</span></li>
                              @endif
                              <li class="page-item">
                                  <a class="page-link" href="{{ $messages->url($messages->lastPage()) }}">{{ $messages->lastPage() }}</a>
                              </li>
                          @endif
                      @endif

                      @if ($messages->hasMorePages())
                          <li class="page-item next">
                              <a class="page-link" href="{{ $messages->nextPageUrl() }}">
                                  <i class="tf-icon fs-6 ti ti-chevrons-right"></i>
                              </a>
                          </li>
                      @endif
                  </ul>
              </nav>
                </div>
                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Detail pesan</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                            <label for="name" class="form-label">Nama pengirim</label>
                            <input type="text" id="name" class="form-control" readonly  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" readonly  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="phone" class="form-label">No hp</label>
                            <input type="text" id="phone" class="form-control" readonly  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" id="address" rows="3" readonly
                            style="padding: 0.375rem 0.75rem 0.375rem 0.5rem; resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="message" class="form-label">Isi pesan</label>
                            <textarea class="form-control" id="message" rows="3" readonly
                            style="padding: 0.375rem 0.75rem 0.375rem 0.5rem; resize: none;"></textarea>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        </div>
                    </div>
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
    <script>
        $(document).ready(function () {
            $('.btn-lihat').on('click', function () {
                var messageId = $(this).data('message-id');
                $.ajax({
                    type: 'GET',
                    url: '/admin/message/' + messageId,
                    success: function (data) {
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);
                        $('#address').val(data.address);
                        $('#message').val(data.message);
                        $('#basicModal').modal('show');
                    }
                });
            });
        });
    </script>
  </body>
</html>
