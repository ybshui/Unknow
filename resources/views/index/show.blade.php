@extends('index.inspinia')
@section('content')
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
                    {{--
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

                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                        <!-- /.Navbar-collapse -->

                    </div>
                    --}}
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
                            <h2 class="h-bold">{{ $article->title }}</h2>
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
                        {!! $article->content !!}
                    </div>
                </div>


            </div>
        </div>

    </section>
    <!-- /Section: about -->
@endsection
