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
                文章列表
                <small></small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">文章列表</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>标题</th>
                                        <th>摘要</th>
                                        <th>标签</th>
                                        <th>头图路径</th>
                                        <th>创作时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->summary }}</td>
                                            <td>{!! $article->tags !!}</td>
                                            <td>{{ $article->image_path }}</td>
                                            <td>{{ $article->create_time }}</td>
                                            <td>{{ $article->update_time }}</td>
                                            <td>
                                                <a href="{{ route('admin.articles.view', ['id' => $article->id]) }}" class="btn btn-xs btn-info " data-original-title="查看" data-placement="top">
                                                    查看
                                                </a>
                                                <a href="{{ route('admin.articles.update', ['id' => $article->id]) }}" class="btn btn-xs btn-warning " data-original-title="修改" data-placement="top">
                                                    修改
                                                </a>
                                                <a href="{{ route('admin.articles.delete', ['id' => $article->id]) }}" class="btn btn-xs btn-danger " data-original-title="删除" data-placement="top">
                                                    删除
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
