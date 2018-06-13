@extends('index.inspinia')
@section('content')
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
                            <a href="{{ route('index') }}" class="brand">Bocor</a>
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
                            <h2 class="h-bold">Articles Model</h2>
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
                        <div class="col-md-4" >
                            <div class="animated rotateInDownLeft">
                                <div class="service-box" style="background-image:url({{ $article->image_path }});background-size: 100%;background-repeat: no-repeat;">
                                    <div class="service-icon">
                                        {{--<span class="fa fa-2x"><img src="{{ $article->image_path }}" /></span>--}}
                                    </div>
                                    <div class="service-desc">
                                        <h5>{{ $article->title }}</h5>
                                        <div class="divider-header"></div>
                                        <p>
                                            {{ $article->summary }}
                                        </p>
                                        <a href="{{ route('web.articles.show', ['id' => $article->id]) }}" class="btn btn-skin">详 情</a>
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
                        {{--
                        <div class="dropdown" style="margin-left: -140%;margin-bottom: -7%;">
                            <a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                默认
                                <span class="caret"></span>
                            </a>
                            <ul id="menu1" class="dropdown-menu" style="min-width: 90px;margin-left: 47%;" aria-labelledby="drop4">
                                @foreach($photoBooks as $photoBook)
                                    <li value="{{ $photoBook->id }}">{{ $photoBook->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        --}}
                        <div style="width: 75px;margin-left: -25%;margin-bottom: -4%;">
                            <select class="selectpicker" name="book">
                                @foreach($photoBooks as $photoBook)
                                    <option value="{{ $photoBook->id }}">{{ $photoBook->name }}</option>
                                @endforeach

                            </select>
                        </div>
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
                    <div class="row gallery-item" id="books">
                        @foreach ($photos as $photo)
                            <div class="col-md-3 animated fadeInUp">
                                <a href="{{ $photo->photo_path }}" title="{{ $photo->description }}" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{ $photo->photo_path }}">
                                    <img src="{{ $photo->photo_path }}" class="img-responsive" alt="img">
                                </a>
                            </div>
                        @endforeach

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
@endsection
@section('js')
    <script src="{{asset('js/bootstrap/bootstrap-select.js')}}"></script>

    <script>
        $('select[name="book"]').change(function () {
            var pid = $(this).val();
            var _token = "{{ csrf_token() }}";
            $.ajax({
                'url': '/webAjaxPhotos',
                'type': 'post',
                'data': {'pid': pid, '_token': _token},
                'success': function (json) {
                    if (json.status == '1') {
                        photos = json.data;
                        var str = '';
                        for (var photo in photos) {
                            str += '<div class="col-md-3 animated fadeInUp">';
                            str += '<a href=" '+ photos[photo].photo_name+ ' title="'+ photos[photo].description+ '" data-lightbox-gallery="gallery1" data-lightbox-hidpi="'+ photos[photo].photo_path+ '">';
                            str += '<img src="'+ photos[photo].photo_path+ '" class="img-responsive" alt="img">';
                            str += '</a>';
                            str += '</div>';
                        }
                        $('#books').html(str);
                    }
                }
            });
        });
    </script>
@endsection