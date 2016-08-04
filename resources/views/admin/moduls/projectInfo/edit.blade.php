@extends('templates.admin.template')
@section('moduls')
    <section class="content-header">
        <h1>
            Project Info
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{ URL::to('admin/moduls/projectInfo') }}">Project Info</a></li>
            <li class="active"><a href="{{ URL::current() }}">Thêm mới</a></li>
        </ol>
    </section>
    <section class="content-header">
        <!-- notifications start -->
        @include('utils.notifications')
                <!-- notifications end -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            @if($projectInfo->id)
                                Chỉnh sửa Project
                            @else
                                Thêm mới Project
                            @endif
                        </h3>
                    </div>
                    @if($projectInfo->id)
                        {{ Form::open(['url' => 'admin/moduls/projectInfo/update', 'method' => 'POST', 'files' => true, 'autocomplete' => 'off'
                        ]) }}
                    @else
                        {{ Form::open(['url' => 'admin/moduls/projectInfo/create', 'method' => 'POST', 'files' => true, 'autocomplete' => 'off'
                        ]) }}
                    @endif
                    {{--{{ Form::token() }}--}}
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="id" value="{{ Input::old('id', $projectInfo->id)  }}">

                    <div class="box-body">
                        <div class="form-group">
                            <label>Project</label>
                            <input type="text" placeholder="Nhập tên project" name="name"
                                   value="{{ $projectInfo->name }}"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" placeholder="Nhập mô tả" name="description"
                                   value="{{ $projectInfo->description }}"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                                <textarea placeholder="Nhập nội dung" name="contents" type="text" id="contents"
                                          class="form-control">{{ Input::old('contents', $projectInfo->content) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            {{ Form::file('image') }}
                            {!! $errors->first('image', '<span class="alert-msg">:message</span>') !!}
                            @if($projectInfo->image)
                                <br/>
                                <img src="{{ url('/') }}/img/portfolio/{{ $projectInfo->image }}"
                                     class="img-responsive" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-5"></div>
                        <button class="btn btn-success" type="submit" name="btnSubmit"><i
                                    class="fa fa-check icon-white"></i>
                            @if($projectInfo->id)
                                Chỉnh sửa
                            @else
                                Thêm mới
                            @endif
                        </button>
                        &nbsp;&nbsp;
                        <button class="btn btn-default" name="btnResetForm">Làm lại</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
    @include('utils.ckeditors')
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('contents');
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>
@stop
