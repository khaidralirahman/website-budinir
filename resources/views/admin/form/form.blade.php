<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir artikel - super admin</title>
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Artikel</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                      <h5 class="card-header">Artikel</h5>
                      <div class="card-body">
                        <form action="{{ route('form.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="defaultInput" class="form-label">Title</label>
                                <input id="defaultInput" @error('title') is-invalid @enderror name="title"
                                    class="form-control" type="text" placeholder=" title" autofocus
                                    value="{{ old('title') }}" />
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="select2Primary" class="form-label">Pilih Tag</label>
                                <div class="select2-primary">
                                    <select id="select2Primary" name="tags[]" class="select2 form-select" multiple>
                                        @foreach ($tag as $item)
                                            <option value="{{ $item->tag }}" {{ in_array($item->tag, old('tags', [])) ? 'selected' : '' }}>
                                                {{ $item->tag }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="defaultInput" class="form-label">Contriburor</label>
                                <input id="defaultInput" @error('contributor') is-invalid @enderror name="contributor"
                                    class="form-control" type="text" placeholder="contributor" autofocus
                                    value="{{ old('contributor') }}" />
                                @error('contributor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description') }}"
                                    placeholder="input job description">
                                    <trix-editor input="editor" placeholder="Tulis sesuatu..."></trix-editor>
                                <input type="hidden" name="description" id="editor" trix-validate-content="true">

                            </div>
                            <small class="text-light fw-medium">Insert thumbnail</small>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" name="photo" type="file" id="formFile" />
                            </div>
                          <div class="row">
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="card-body">
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
    <script src="{{ asset('assets admin/assets/') }}/js/forms-file-upload.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/dropzone/dropzone.js"></script>

    <script>
        document.addEventListener('trix-attachment-add', function(event) {
            if (event.attachment.file) {
                uploadFileAttachment(event.attachment);
            }
        });

        function uploadFileAttachment(attachment) {
            var file = attachment.file;
            var form = new FormData();
            form.append('file', file);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route('upload') }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.upload.onprogress = function(event) {
                var progress = event.loaded / event.total * 100;
                attachment.setUploadProgress(progress);
            };

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    attachment.setAttributes({
                        url: response.url,
                        href: response.url
                    });
                }
            };

            xhr.send(form);
        }
    </script>

  </body>
</html>
