<x-layoutf>
    <x-slot:title>{{ $title }}</x-slot>
    <x-slot:user>{{ $user }}</x-slot>
    <div class="container">
          <div class="row register-content">
            <div class="col-lg-6 image">
              <img src="{{ url('assets/frontend/images/auth.svg') }}" />
            </div>
            <div class="col-lg-6 form">
              <div class="wrapper">
                <form action="{{ route('frontend.register') }}" method="post">
                    @csrf
                  <div class="title">
                    <h1>Register</h1>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="masukan nama lengkap" value="{{ old('name') }}">
                  </div>
                  <div class="mb-3">
                      @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                  @enderror
                    </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukan alamat email" value="{{ old('email') }}">
                  </div>
                  <div class="mb-3">
                    @error('email')
                  <span class="text-danger">
                      {{ $message }}
                  </span>
                @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="masukan no hp" value="{{ old('phone') }}">
                  </div>
                  <div class="mb-3">
              @error('phone')
            <span class="text-danger">
                {{ $message }}
            </span>
          @enderror
            </div>
                  <div class="mb-3">
                    <label class="form-label">No. KTP</label>
                    <input type="text" name="ktp" class="form-control @error('ktp') is-invalid @enderror" placeholder="masukan no ktp" value="{{ old('ktp') }}">
                  </div>
                  <div class="mb-3">
                    @error('ktp')
                  <span class="text-danger">
                      {{ $message }}
                  </span>
                @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="masukan password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password" class="form-control" placeholder="masukan konfirmasi password">
                  </div>
                  <button type="submit" class="btn btn-default btn-login mb-3">Register</button>
                  <div>
                    sudah punya akun? <a href="{{ url('login') }}" class="form-text">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
</x-layoutf>
