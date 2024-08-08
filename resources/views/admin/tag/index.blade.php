<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Tag - Admin</title>
    @include('layouts admin.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />

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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Table/</span>Tag</h4>
                <!-- Basic Bootstrap Table -->
                <div class="card" style="margin-bottom: 50px">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h5 class="card-header">Table Tag</h5>
                        <a href="/admin/tag/create" class="btn btn-primary" style="height: fit-content; padding: 15px 30px 15px 30px; margin-top: 20px; margin-right: 20px;">Add Tag</a>
                    </div>



                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tag</th>
                                    <th>Date</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($tag as $item)
                                    <tr>
                                        <td>#{{ $item->tag }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form >
                                                        <a class="dropdown-item" href="{{ route('tag.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Edit</a>
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
                            @if ($tag->currentPage() > 1)
                                <li class="page-item prev">
                                    <a class="page-link" href="{{ $tag->previousPageUrl() }}">
                                        <i class="tf-icon fs-6 ti ti-chevrons-left"></i>
                                    </a>
                                </li>
                            @endif

                            @if ($tag->lastPage() > 1)
                                <!-- First Page Link -->
                                @if ($tag->currentPage() > 3)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $tag->url(1) }}">1</a>
                                    </li>
                                    @if ($tag->currentPage() > 4)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endif

                                <!-- Page Numbers -->
                                @for ($i = max(1, $tag->currentPage() - 2); $i <= min($tag->lastPage(), $tag->currentPage() + 2); $i++)
                                    <li class="page-item {{ $i == $tag->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $tag->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Last Page Link -->
                                @if ($tag->currentPage() < $tag->lastPage() - 2)
                                    @if ($tag->currentPage() < $tag->lastPage() - 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $tag->url($tag->lastPage()) }}">{{ $tag->lastPage() }}</a>
                                    </li>
                                @endif
                            @endif

                            @if ($tag->hasMorePages())
                                <li class="page-item next">
                                    <a class="page-link" href="{{ $tag->nextPageUrl() }}">
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
  </body>
</html>
