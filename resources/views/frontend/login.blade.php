<x-layoutf>
    <x-slot:title>{{ $title }}</x-slot>
    <x-slot:user>{{ $user }}</x-slot>
    <div class="container">
          <div class="row login-content">
            <div class="col-lg-6 image">
              <img src="{{ url('assets/frontend/images/login.svg') }}" />
            </div>
            <div class="col-lg-6 form">
              <div class="wrapper">
                <form action="{{ route('frontend.login') }}" method="post">
                    @csrf
                  <div class="title">
                    <h1>Login</h1>
                  </div>
                  @if (session('status'))
                  <div class="alert alert-success">
                       {{ session('status') }}
                  </div>
                  @elseif (session('pesan'))
                  <div class="alert alert-danger">
                       {{ session('pesan') }}
                  </div>
              @endif
                  <div class="d-flex gap-2 mb-4 login-sosmed">
                    <a class="btn btn-default google" type="button"><i class="fa-brands fa-google"></i> google</a>
                    <a class="btn btn-default fb" type="button"><i class="fa-brands fa-facebook-f"></i> facebook</a>
                  </div>
                  <div class="divider">
                    <p>atau</p>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" placeholder="masukan alamat email">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="masukan password">
                  </div>
                  <button type="submit" class="btn btn-default btn-login mb-3">Login</button>
                  <div class="mb-2">
                    <a href="lupa-password" class="form-text">lupa password?</a>
                  </div>
                  <div>
                    belum punya akun? <a href="{{ url('register') }}" class="form-text">Register</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
</x-layoutf>
