@extends('admin.inspinia')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                文章编辑
                <small></small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-sm-offset-1 col-md-10">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">文章编辑</h3>
                        </div>
                        <form method="post" action="{{route('admin.insert')}}" class="form-horizontal">

                            {!!csrf_field()!!}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="inputEmail3" class="col-sm-2 control-label">标题<span style="color: red">*</span>：
                                    </label>

                                    <div class="col-sm-6 input-group">
                                        <input type="text" class="form-control" name="title" placeholder="标题" value="">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="inputEmail3" class="col-sm-2 control-label">内容<span style="color: red">*</span>：
                                    </label>

                                    <div class="col-sm-6 input-group">
                                        <textarea type="text" class="form-control" name="content" value="">

                                        </textarea>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="" class="btn btn-default">返回</a>
                                    <button type="submit" class="btn btn-info pull-right">确认</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
