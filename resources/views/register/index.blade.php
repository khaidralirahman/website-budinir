<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Register</title>
    @include('layouts auth.header')
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Login -->
          <div class="card" style="width: fit-content;">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-4 mt-2" style="width: fit-content;">
                <a href="" class="app-brand-link gap-2" style="width: fit-content;">
                  {{-- <span class="app-brand-logo demo">
                    <img src="" alt="" width="60px" height="40px">
                  </span> --}}
                  <span class="app-brand-text demo text-body fw-bold ms-1" style="font-size: 40px; width: 280px;">BudiNir</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-1 pt-2">Welcome back</h4>
              <p class="mb-4">Please sign-in to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                  <label for="username" class="form-label">Nama pengguna</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="name"
                    placeholder="Enter your username"
                    autofocus />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>sudah punya akun?</span>
                <a href="/login">
                  <span>masuk sekarang</span>
                </a>
              </p>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    @include('layouts auth.script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('logoutsuccess'))
        <script>
            Swal.fire('{{ $message }}', "", "success")
        </script>
    @endif
    @if ($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message }}', "", "warning");
        </script>
    @endif
  </body>
</html>
