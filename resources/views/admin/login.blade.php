<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>ADMİN - Log in</title>

    <!-- Favicons -->
    <link href="{{asset('assets')}}/admin/img/favicon.png" rel="icon">
    <link href="{{asset('assets')}}/admin/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets')}}/admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets')}}/admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('assets')}}/admin/css/style.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/style-responsive.css" rel="stylesheet">

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: Nazire ALIÇ
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    BİR FORMUN VERİ GÖNDEREBİLMESİ İÇİN;
    actionda bir adres girilmesi gerekir post olması lazım
    *********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">
        <form class="form-login" action="{{ route('admin_logincheck') }}" method="post">
            @csrf
            <h2 class="form-login-heading">sign in now</h2>
            <div class="login-wrap">
                <input id="email" name="email" type="email" class="form-control" placeholder="email" autofocus>
                <br>
                <input id="password" name="password" type="password" class="form-control" placeholder="password">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
            <a data-toggle="modal" href="#"> Forgot Password?</a>
            </span>
                </label>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Login </button>
                <hr>
                <div class="login-social-link centered">
                    <p>Sosyal ağlardan bizi takip edebilirsiniz</p>
                    <button class="btn btn-twitter" type="submit" ><i class="fa fa-linkedin"></i> Linkedin</button>
                    <button class="btn btn-twitter" type="submit"><i class="fa fa-github"></i> GitHub</button>
                </div>

            </div>

        </form>
    </div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('assets')}}/admin/lib/jquery/jquery.min.js"></script>
<script src="{{asset('assets')}}/admin/lib/bootstrap/js/bootstrap.min.js"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{{asset('assets')}}/admin/lib/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("img/login-bg.jpg", {
        speed: 500
    });
</script>
</body>

</html>
