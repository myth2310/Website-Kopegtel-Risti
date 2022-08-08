<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kopegtel Risti</title>
    <link rel="icon" type="image/png" href="assets/img/logo/logo_main.png"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <!-- Argon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/argon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/sweetalert2.min.css') }}">
</head>

<body class="bg-default">
    <!-- Core -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/js.cookie.js') }}"></script>

    <!-- Argon JS -->
    <script type="text/javascript" src="{{ URL::asset('js/argon.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/argon.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/sweetalert2.min.js') }}"></script>

  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-2">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">

            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2"><small>Login with admin account</small></div>
            </div>

            @if (Session::get('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                  <span class="alert-text">
                      {{ Session::get('loginError') }}
                  </span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>                        
            @endif

            <div class="card-body px-lg-5 py-lg-5">
                <form action="admin/login" method="POST">
                @csrf
                  <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input 
                            type="text" 
                            name="username" 
                            id="username" 
                            placeholder="Enter username..."
                            class="form-control @error('username') is-invalid @enderror"
                        >
                        <div class="invalid-feedback">
                          Please enter username
                        </div>
                    </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                          <input 
                              type="password" 
                              name="password" 
                              id="password" 
                              placeholder="Enter password..."
                              class="form-control @error('password') is-invalid @enderror"
                          >
                          <div class="invalid-feedback">
                            Please enter password
                          </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button 
                            type="submit" 
                            class="btn btn-primary my-4"
                        >
                            Login
                    </button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center">
        <div class="copyright text-center text-xl-left text-muted">
        &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>