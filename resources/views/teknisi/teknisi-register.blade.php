<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Teknisi</title>


  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
    <div class="register-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="#" class="h1"><b>Tekni</b>Si</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Register a new membership3</p>

        @if (session('status'))
            <div class="alert alert-success">
                 {{ session('status') }}
            </div>
        @endif

          <form action="{{ route('teknisi.register') }}" method="post">
        @csrf
            <div class="input-group mb-0">
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ old('name') }}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="mb-3">
              @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
          @enderror
            </div>

            <div class="input-group mb-0">
              <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="mb-3">
              @error('email')
            <span class="text-danger">
                {{ $message }}
            </span>
         @enderror
            </div>

        <div class="input-group mb-0">
              <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="phone">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            <div class="mb-3">
              @error('phone')
            <span class="text-danger">
                {{ $message }}
            </span>
         @enderror
       </div>
        <div class="input-group mb-0">
              <input type="text" id="nm_bank" name="nm_bank" value="{{ old('nm_bank') }}" class="form-control @error('nm_bank') is-invalid @enderror" placeholder="Nama Bank">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-book"></span>
                </div>
              </div>
            </div>
            <div class="mb-3">
              @error('nm_bank')
            <span class="text-danger">
                {{ $message }}
            </span>
         @enderror
       </div>

       <div class="input-group mb-0">
            <input type="text" id="no_req" name="no_req" value="{{ old('no_req') }}" class="form-control @error('no_req') is-invalid @enderror" placeholder="No Req">
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-sort-numeric-down-alt"></span>
            </div>
            </div>
            </div>
            <div class="mb-3">
                @error('no_req')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
       </div>


       <div class="input-group mb-0">
                <input type="text" id="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
                </div>
            </div>
            <div class="mb-3">
                @error('password')
            <span class="text-danger">
                {{ $message }}
            </span>
          @enderror
      </div>


      <div class="input-group mb-0">
        <textarea name="alamat" id="alamat" placeholder="alamat" cols="36" rows="3"></textarea>

               <div class="input-group-append">
               <div class="input-group-text">
                   <span class="fas fa-address-book"></span>
               </div>
               </div>
           </div>
           <div class="mb-3">
               @error('alamat')
           <span class="text-danger">
               {{ $message }}
           </span>
          @enderror

      </div>

    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </div>

</form>

        </div>
        <a href="login" class="text-center">Saya Memiliki Akun</a>
      </div>
    </div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/js/adminlte.min.js') }}"></script>
</body>
</html>
