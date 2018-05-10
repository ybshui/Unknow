@extends('admin.inspinia')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="css/layui.css" media="all">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                文章预览
                <small></small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <h3 class="box-title" style="text-align: center;">
                                {{ $article->title }}
                            </h3>
                            <div>
                                {{ $article->tags }}
                            </div>
                            <div>
                                {!! $article->content !!}
                            </div>
                            <div>
                                {{ $article->update_time }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')

@endsection
