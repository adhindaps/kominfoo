
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="mpls/10.png">
    <title>LOGIN ADMIN</title>
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src=https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(foto/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(foto/smklogo.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                      
                        <h2 class="mt-3 text-center">Masuk</h2>
                        <p class="text-center">Masukkan alamat email dan kata sandi Anda untuk mengakses panel admin.</p>
                        {{-- <form class="mt-4"> --}}
                            <form action="/postlogin" method="post" enctype="multipart/form-data" >
                                @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" >Email</label>
                                        <input class="form-control" name="email" type="text"
                                            placeholder="masukkan email">
                                            @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $message }}</strong> 
                                            </div>
                                             @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" >Password</label>
                                        <input class="form-control" name="password" type="password"
                                            placeholder="masukkan password">
                                            @error('password')
                                            <div class="alert alert-danger" role="alert">{{ $message }}
                                            </div>
                                             @enderror
                                             @if (Session::has('password'))
                                             <div>
                                             <div class="alert alert-danger" role="alert">Sandi salah</div>
                                            </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Masuk</button>
                                </div>
                            </form>
                                <div class="col-lg-12 text-center mt-5">
                                    Tidak memiliki akun? <a href="register" class="text-danger">Registrasi</a>
                                </div>
                            </div>
                            
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }} "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/assets/libs/popper.js/dist/umd/popper.min.js') }} "></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>