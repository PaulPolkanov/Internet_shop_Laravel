<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png" />
  <!-- Bootstrap CSS -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="/assets/css/style.css" rel="stylesheet" />
  <link href="/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="/assets/css/pace.min.css" rel="stylesheet" />

  <title>Onedash - Bootstrap 5 Admin Template</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    
       <!--start content-->
       
       <main class="authentication-content">
        <div class="container-fluid">
          <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('error')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    
                @endif
              </div>
              <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
                  <img src="/assets/images/error/forgot-password-frent-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title">Forgot Password?</h5>
                    <p class="card-text mb-5">Enter your registered email ID to reset the password</p>
                    <form class="form-body" method="POST" action="/admin/forgotPasswordRequest">
                        @csrf
                        <div class="row g-3">
                          <div class="col-12">
                            <label for="inputEmailid" class="form-label">Email id</label>
                            <input type="email" class="form-control form-control-lg radius-30" id="inputEmailid" placeholder="Email id" name='mail'>
                          </div>
                          <div class="col-12">
                            <div class="d-grid gap-3">
                              <button type="submit" class="btn btn-lg btn-primary radius-30">Send</button>
							                <a href="/admin/login" class="btn btn-lg btn-light radius-30">Back to Login</a>
                            </div>
                          </div>
                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </main>
        
       <!--end page main-->

  </div>
  <!--end wrapper-->


  <!--plugins-->
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/pace.min.js"></script>


</body>

</html>