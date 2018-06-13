@extends('layouts.app')

@section('content')
<div class="wrapper" style="font-size: 15px;">
    <!-- Left side column. contains the logo and sidebar -->

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="float: left">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>文章管理</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.articles') }}">文章列表</a></li>
                    <li><a href="{{ route('admin.articles.write') }}">文章编辑</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>图片管理</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.photos.list') }}">图片列表</a></li>
                    <li><a href="{{ route('admin.photos.upload') }}">上传图片</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>菜单三</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">二级菜单一</a></li>
                    <li><a href="#">二级菜单二</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
    <div class="container col-md-10 " style="float: right">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">文章列表</h4>

                        </div>
                        <table class="table table-hover">
                            <tbody>
                            <tr class="card-header">
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
                                <tr class="card-body">
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
            </div>
        </section>
    </div>
    {{--<div class="container ">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-md-8">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">Dashboard</div>--}}

                    {{--<div class="card-body">--}}
                        {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success">--}}
                                {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        {{--You are logged in!--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
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