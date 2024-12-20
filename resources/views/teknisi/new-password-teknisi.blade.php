<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Teknisi</title>


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
          <p class="login-box-msg">Login membership</p>

        @if (session('status'))
            <div class="alert alert-success">
                 {{ session('status') }}
            </div>
        @endif

          <form action="{{ route('teknisi.register') }}" method="post">
        @csrf


            <div class="input-group mb-0">
              <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="New Password">
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
                <input type="text" id="passsword" name="passsword" value="{{ old('passsword') }}" class="form-control @error('passsword') is-invalid @enderror" placeholder="passsword">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
                </div>
            </div>
            <div class="mb-3">
                @error('passsword')
            <span class="text-danger">
                {{ $message }}
            </span>
          @enderror
      </div>




    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
    </div>

</form>
<p class="mb-1">

        </div>


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
