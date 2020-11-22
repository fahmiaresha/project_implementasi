<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="icon" type="image/png" href="{{ asset('asset/admin/img/unair.png') }}">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Halaman Login Web PKM" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
	<!-- Custom Theme files -->
	<link href="{{ asset('asset/slide-login/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('asset/slide-login/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
    
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/Login_v18/css/main.css') }}">

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->
   

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- custom login google -->
<!-- Minified CSS and JS -->
<link   rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous">
</script>

</head>
<body>

@if(session('alert_gagal_login'))
      <font size="4"> 
      <script>
     Swal.fire({
        //   timer: 2000,
          icon: 'error',
          title: 'Maaf',
          text: 'Anda harus menggunakan email unair !',
        })
    </script>
    </font>
@endif

@if(session('salah_password'))
      <font size="4"> 
      <script>
     Swal.fire({
        //   timer: 2000,
          icon: 'error',
          title: 'Oops',
          text: 'Password Anda Salah !',
        })
    </script>
    </font>
@endif

@if(session('blm_login'))
      <font size="4"> 
      <script>
     Swal.fire({
        //   timer: 2000,
          icon: 'error',
          title: 'Oops',
          text: 'Anda Belum Login !',
        })
    </script>
    </font>
@endif

@if(session('tidak_terdaftar'))
      <font size="4"> 
      <script>
     Swal.fire({
        //   timer: 2000,
          icon: 'error',
          title: 'Oops',
          text: 'Akun Anda Tidak Terdaftar !',
        })
    </script>
    </font>
@endif


<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
        <h1 class="animate__animated animate__bounceInDown" style=" animation-duration: 3s;" ><font color="white"><strong>Admin</strong></font></h1>
		<div class="header-main animate__animated animate__fadeInDown" style=" animation-duration: 3s;" >
			<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>
			<div class="header-left-bottom">
                <!-- <form>
                {{ csrf_field() }}     -->
					<!-- <div class="icon1">
						<span class="fa fa-user"></span>
						<input type="email" placeholder="Email Address" required=""/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" placeholder="Password" required=""/>
                    </div> -->
                    <div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="USERNAME_ADMIN" style="color:white;" >
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="PASSWORD_ADMIN" style="color:white;" >
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
					<!-- <div class="login-check">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
					</div> -->
					<!-- <div class="bottom">
						<button class="btn">Log In</button>
                    </div> -->
                 
                    <a href="/data-customer">
                    <div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Log In
                        </button>
                    </div>
                    </a>
                    <br>
                    <center>
                   
                    <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-dark" href="{{ url('login/google') }}" >
                        <img width="20px" style="margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                       <font size="2" style=>Login with Google</font>
                        </a>
                    </div>
                    </div>
                    </center>

                    <!-- <a href="{{ url('login/google') }}" >
                            Sign in With Google
                    </a> -->
                <!-- </form>	 -->
            <!-- <div class="coba mt-3" style="text-align: right;">
                    <a href="/lupapassword"><font size="2" style="color:skyblue">Lupa Password ?</font></a>
                    </div> -->
            </div>
			<!-- <div class="social">
				<ul>
					<li>or login using : </li>
					<li><a href="#" class="facebook"><span class="fa fa-facebook"></span></a></li>
					<li><a href="#" class="twitter"><span class="fa fa-twitter"></span></a></li>
					<li><a href="#" class="google"><span class="fa fa-google-plus"></span></a></li>
				</ul>
			</div> -->
		</div>
		
        <!-- copyright -->
        
		<div class="copyright animate__animated animate__fadeInUp" style=" animation-duration: 3s;">
			<p>© 2020 M.Fahmi Aresha . All rights reserved</p>
		</div>
		<!-- //copyright --> 
	</div>
</div>	
<!-- //main -->

</body>
</html>
<script>

</script>