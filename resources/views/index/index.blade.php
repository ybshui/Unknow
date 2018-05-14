<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bocor bootstrap 3 one page template</title>

    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/nivo-lightbox.css" rel="stylesheet" />
    <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
    <link href="css/animations.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <!-- =======================================================
      Theme Name: Bocor
      Theme URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<section class="hero" id="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right navicon">
                <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center inner">
                <div class="animatedParent">
                    <h1 class="animated fadeInDown">REVY 姐姐</h1>
                    <p class="animated fadeInUp">虽写物，是明心也。</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <a href="#about" class="learn-more-btn btn-scroll">more</a>
            </div>
        </div>
    </div>
</section>


<!-- Navigation -->
<div id="navigation">
    <nav class="navbar navbar-custom" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="site-logo">
                        <a href="index.html" class="brand">Bocor</a>
                    </div>
                </div>


                <div class="col-md-10">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#intro">主页</a></li>
                            <li><a href="#about">关于 我</a></li>
                            <li><a href="#service">点滴</a></li>
                            <li><a href="#works">聚焦</a></li>

                            {{--<li><a href="#contact">Contact</a></li>--}}
                        </ul>
                    </div>
                    <!-- /.Navbar-collapse -->

                </div>
            </div>
        </div>
        <!-- /.container -->
    </nav>
</div>
<!-- /Navigation -->

<!-- Section: about -->
<section id="about" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="animatedParent">
                    <div class="section-heading text-center animated bounceInDown">
                        <h2 class="h-bold">About our bocor team</h2>
                        <div class="divider-header"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">


        <div class="row">


            <div class="col-lg-8 col-lg-offset-2 animatedParent">
                <div class="text-center">
                    <p>
                        Lorem ipsum dolor sit amet, vis tale malis tacimates et, graece doctus omnesque ne est, deserunt pertinacia ne nam. Pro eu simul affert referrentur, natum mutat erroribus te his
                    </p>
                    <p>
                        Ne mundi fabulas corrumpit vim, nulla vivendum conceptam eu nam. Ius ex principes complectitur, ex quo duis suscipit. Ius fastidii reprimique no. Sadipscing appellantur pri ad. Oratio moderatius definitiones cum ex, mea ne brute vivendum percipitur.
                    </p>
                    <a href="#service" class="btn btn-skin btn-scroll">What we do</a>
                </div>
            </div>


        </div>
    </div>

</section>
<!-- /Section: about -->


<!-- Section: services -->
<section id="service" class="home-section color-dark bg-gray">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div>
                    <div class="section-heading text-center">
                        <h2 class="h-bold">我们的日记</h2>
                        <div class="divider-header"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="text-center">
        <div class="container">

            <div class="row animatedParent">
                @foreach($articles as $article)
                    <div class="col-md-4">
                        <div class="animated rotateInDownLeft">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-laptop fa-2x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5>{{ $article->title }}</h5>
                                    <div class="divider-header"></div>
                                    <p>
                                        {{ $article->summary }}
                                    </p>
                                    <a href="#" class="btn btn-skin">详 情</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            <!--
                <div class="col-md-4">
                    <div class="animated rotateInDownLeft slow">
                        <div class="service-box">
                            <div class="service-icon">
                                <span class="fa fa-camera fa-2x"></span>
                            </div>
                            <div class="service-desc">
                                <h5>Photography</h5>
                                <div class="divider-header"></div>
                                <p>
                                    Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
                                </p>
                                <a href="#" class="btn btn-skin">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="animated rotateInDownLeft slower">
                        <div class="service-box">
                            <div class="service-icon">
                                <span class="fa fa-code fa-2x"></span>
                            </div>
                            <div class="service-desc">
                                <h5>Graphic design</h5>
                                <div class="divider-header"></div>
                                <p>
                                    Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
                                </p>
                                <a href="#" class="btn btn-skin">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>
</section>
<!-- /Section: services -->


<!-- Section: works -->
<section id="works" class="home-section color-dark text-center bg-white">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div>
                    <div class="animatedParent">
                        <div class="section-heading text-center">
                            <h2 class="h-bold animated bounceInDown">What we have done</h2>
                            <div class="divider-header"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">

        <div class="row animatedParent">
            <div class="col-sm-12 col-md-12 col-lg-12">

                <div class="row gallery-item">
                    <div class="col-md-3 animated fadeInUp">
                        <a href="images/works/1.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="images/works/1@2x.jpg">
                            <img src="images/works/1.jpg" class="img-responsive" alt="img">
                        </a>
                    </div>
                    <div class="col-md-3 animated fadeInUp slow">
                        <a href="images/works/2.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="images/works/1@2x.jpg">
                            <img src="images/works/2.jpg" class="img-responsive" alt="img">
                        </a>
                    </div>
                    <div class="col-md-3 animated fadeInUp slower">
                        <a href="images/works/3.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="images/works/1@2x.jpg">
                            <img src="images/works/3.jpg" class="img-responsive" alt="img">
                        </a>
                    </div>
                    <div class="col-md-3 animated fadeInUp">
                        <a href="images/works/4.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="images/works/1@2x.jpg">
                            <img src="images/works/4.jpg" class="img-responsive" alt="img">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<!-- /Section: works -->

<!-- Section: contact -->
<!--
<section id="contact" class="home-section nopadd-bot color-dark bg-gray text-center">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="animatedParent">
                    <div class="section-heading text-center">
                        <h2 class="h-bold animated bounceInDown">Get in touch with us</h2>
                        <div class="divider-header"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">

        <div class="row marginbot-80">
            <div class="col-md-8 col-md-offset-2">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form id="contact-form" action="" method="post" role="form" class="contactForm">
                    <div class="row marginbot-20">
                        <div class="col-md-6 xs-marginbot-20">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs">
                                Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>
-->
<!-- /Section: contact -->


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

<script src="js/custom.js"></script>
<script src="js/css3-animate-it.js"></script>
<script src="contactform/contactform.js"></script>

</body>
</html>
