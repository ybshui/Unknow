<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Personal Web</title>

    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/nivo-lightbox.css" rel="stylesheet" />
    <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
    <link href="css/animations.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
    <!-- =======================================================
      Theme Name: Bocor
      Theme URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="footer-menu">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Press release</a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-right copyright">
                    &copy;Copyright - Bocor. All Rights Reserved
                    <div class="credits">
                        <!--
                          All the links in the footer should remain intact.
                          You can delete the links only if you purchased the pro version.
                          Licensing information: https://bootstrapmade.com/license/
                          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bocor
                        -->
                        <a href="https://bootstrapmade.com/bootstrap-business-templates/">Bootstrap Business Templates</a> by BootstrapMade
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/nivo-lightbox.min.js"></script>
    <!-- AdminLTE App -->
    <script src="bower_components/admin-lte/dist/js/adminlte.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/css3-animate-it.js"></script>
    <script src="contactform/contactform.js"></script>

    <script src="{{asset('js/bootstrap/bootstrap-select.js')}}"></script>

    @yield('js')
</body>
</html>
