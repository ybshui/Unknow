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
                图片上传
                <small></small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-sm-offset-1 col-md-10">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">图片上传</h3>
                        </div>

                        <form method="post" action="" class="form-horizontal">
                            {!!csrf_field()!!}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('book') ? ' has-error' : '' }}">
                                    <label for="inputEmail3" class="col-sm-2 control-label">相册<span style="color: red">*</span>：
                                    </label>

                                    <div class="col-sm-3 input-group">
                                        <select name="book"  class="selectpicker btn-default" >
                                            <option value='默认'>默认</option>
                                            <option value='青春'>青春</option>
                                            <option value='风景'>风景</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="inputEmail3" class="col-sm-2 control-label">描述：
                                    </label>

                                    <div class="col-sm-6 input-group">
                                        <input type="text" class="form-control" name="description" placeholder="描述" value="">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('image_path') ? ' has-error' : '' }}">
                                    <input type="hidden" name="_token" class="tag_token" value="<?php echo csrf_token(); ?>">
                                    <label for="inputEmail3" class="col-sm-2 control-label">照片<span style="color: red">*</span>：
                                    </label>

                                    <div class="layui-upload">
                                        <button type="button" class="layui-btn" id="test1" value="">上传图片</button>
                                        <input type="hidden" name="photo_path[]" value="">
                                        <div class="layui-upload-list" id="demo2" style="margin-left: 175px;"></div>
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
@section('js')
    <script src="{{asset('js/bootstrap/bootstrap-select.js')}}"></script>
    <script src="js/layui.js"></script>
    <script>
        layui.use('upload', function(){
            var upload = layui.upload;
            var tag_token = $(".tag_token").val();
            //执行实例
            var uploadInst = upload.render({
                elem: '#test1', //绑定元素
                exts: 'jpg|png|gif', //设置一些后缀，用于演示前端验证和后端的验证
                accept: 'images', //上传文件类型
                multiple: true,
                //url: '/uploadImage/', //上传接口
                data: {'_token':tag_token},
                before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo2').append('<img style="width: 180px;height: 110px;" src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                    });
                },
                done: function(res){
                    if(res.status == 1){
//                      $('#demo1').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                        var path_arr = $('input[name="photo_path"]').val();
                        path_arr.push(res.message);
                        console.log(path_arr);
                        $('input[name="photo_path"]').val(path_arr);
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