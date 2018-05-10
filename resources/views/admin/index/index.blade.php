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

                        <form method="post" action="{{route('admin.create')}}" class="form-horizontal">
                            {!!csrf_field()!!}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="inputEmail3" class="col-sm-2 control-label">标签<span style="color: red">*</span>：
                                    </label>

                                    <div class="col-sm-3 input-group">
                                        <select name="tags[]"  class="selectpicker btn-default" multiple data-max-options="3">
                                            <option value="0" selected>请选择</option>
                                            @foreach ($tags as $tag)
                                                <option value='{!! $tag->id !!}'>{{$tag->tag}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="inputEmail3" class="col-sm-2 control-label">摘要<span style="color: red">*</span>：
                                    </label>

                                    <div class="col-sm-6 input-group">
                                        <input type="text" class="form-control" name="summary" placeholder="摘要" value="">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('summary') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('image_path') ? ' has-error' : '' }}">
                                    <input type="hidden" name="_token" class="tag_token" value="<?php echo csrf_token(); ?>">
                                    <label for="inputEmail3" class="col-sm-2 control-label">头图<span style="color: red">*</span>：
                                    </label>

                                    <div class="layui-upload">
                                        <button type="button" class="layui-btn" id="test1" value="">上传图片</button>
                                        <input type="hidden" name="image_path" value="">
                                        <div class="layui-upload-list">
                                            <img class="layui-upload-img" id="demo1" style="width: 210px;margin-left: 175px;">
                                            <p id="demoText"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="inputEmail3" class="col-sm-2 control-label">内容<span style="color: red">*</span>：
                                    </label>

                                    <div class="col-sm-10">
                                        <!-- 加载编辑器的容器 -->
                                        <script id="container" name="content" type="text/plain" style='width:100%;height:300px;'>
                                        </script>

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
@include('UEditor::head')
@section('js')
    <script src="{{asset('js/bootstrap/bootstrap-select.js')}}"></script>
    <script src="js/layui.js"></script>
    <script>
        var ue = UE.getEditor('container');
        ue.ready(function(){
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
        layui.use('upload', function(){
            var upload = layui.upload;
            var tag_token = $(".tag_token").val();
            //执行实例
            var uploadInst = upload.render({
                elem: '#test1', //绑定元素
                exts: 'jpg|png|gif', //设置一些后缀，用于演示前端验证和后端的验证
                accept: 'images', //上传文件类型
                url: '/uploadImage/', //上传接口
                data: {'_token':tag_token},
                before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo1').attr('src', result); //图片链接（base64）
                    });
                },
                done: function(res){

                    if(res.status == 1){
                        console.log(res);
                        var demoText = $('#demoText');
                        demoText.html('<a style="margin-left: 30.5%; margin-top: -5.5%;" class="layui-btn layui-btn-mini demo-reload demo-delete" onclick="delete_image()">删除</a>');

                        $('input[name="image_path"]').val(res.message);
                        layer.alert('上传成功');
                    }else{
                        layer.alert(res.message);
                    }
                },
                error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload" >重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });
        });
        function delete_image() {
            var file_path = $('#test1').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                'url': '/deleteImage/',
                'type': 'get',
                'data': {'file_path' : file_path},
                'success': function (json) {

                }
            });
            $('#test1').val('');
            $("#demo1").attr('src', '');
            $('#demoText').html('');
        }
    </script>
@endsection
