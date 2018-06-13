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
                照片列表
                <small></small>
            </h1>
        </section>
        {{ csrf_field() }}
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header" style="width: 130px;">
                            <form id="book" method="get" action="{{ route('admin.photos.list')}}" class="form-horizontal">
                                <select name="book"  class="selectpicker btn-default" >
                                    @foreach($books as $book)
                                        <option value='{!! $book->id !!}' @if ($pid == $book->id) selected @endif>{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>描述</th>
                                        <th>照片路径</th>
                                        <th>缩略图</th>
                                        <th>操作</th>
                                    </tr>
                                    @foreach($photos as $photo)
                                        <tr>
                                            <td>{!! $photo->description !!}</td>
                                            <td>{{ $photo->photo_path }}</td>
                                            {{--<td>{{ $photo->makeImage }}</td>--}}
                                            <td><img src="{!! $photo->small_photo_path !!}" /></td>
                                            <td>
                                                <a path="{{ $photo->photo_path }}" type="button" class="btn btn-xs btn-info model_show" data-toggle="modal" data-target=".bs-example-modal-sm" >查看大图</a>
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
    <div id="big_image" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document" style="margin-left: 530px;margin-top: 125px;">
            <div class="modal-content">
                <img id="photo" src="upload/images/111.jpg">
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/bootstrap/bootstrap-select.js')}}"></script>
    <script src="js/layui.js"></script>
    <script src="js/lay/modules/upload.js"></script>
    <script>
        $('select[name="book"]').change(function () {
            $('#book').submit();
        });

        //页面层-点击查看大图
        $('.model_show').on('click', function () {
            var big_photo_path = $(this).attr('path');
            $('#photo').attr('src', big_photo_path);

            //$('#big_image').show();
        });
    </script>
@endsection
