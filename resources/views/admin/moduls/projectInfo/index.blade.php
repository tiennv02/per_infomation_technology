@extends('templates.admin.template')
@section('moduls')
    <section class="content-header">
        <h1>
            Project Info
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Project Info</li>
        </ol>
    </section>
    <section class="content-header">
        <!-- notifications start -->
        @include('utils.notifications')
                <!-- notifications end -->
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="pull-left">
                    <a href="{{ URL::current() }}/create"
                       class="btn btn-primary pull-right">
                        Thêm mới</a>
                </div>
                {{--<div class="columns columns-right btn-group pull-right">--}}
                    {{--<button class="btn btn-default" type="button" name="refresh" title="Refresh"><i--}}
                                {{--class="fa fa-refresh"></i></button>--}}
                    {{--<div class="keep-open btn-group" title="Columns">--}}
                        {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i--}}
                                    {{--class="fa fa-columns"></i> <span class="caret"></span></button>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><label><input type="checkbox" data-field="id" value="0"> ID</label></li>--}}
                            {{--<li><label><input type="checkbox" data-field="name" value="1" checked="checked"> Asset--}}
                                    {{--Category Name</label></li>--}}
                            {{--<li><label><input type="checkbox" data-field="category_type" value="2"--}}
                                              {{--checked="checked">--}}
                                    {{--Type</label></li>--}}
                            {{--<li><label><input type="checkbox" data-field="count" value="3" checked="checked">--}}
                                    {{--Assets</label></li>--}}
                            {{--<li><label><input type="checkbox" data-field="acceptance" value="4" checked="checked">--}}
                                    {{--Acceptance</label></li>--}}
                            {{--<li><label><input type="checkbox" data-field="eula" value="5" checked="checked">--}}
                                    {{--EULA</label></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="export btn-group">--}}
                        {{--<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><i--}}
                                    {{--class="fa fa-download"></i> <span class="caret"></span></button>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li data-type="csv"><a href="javascript:void(0)">CSV</a></li>--}}
                            {{--<li data-type="txt"><a href="javascript:void(0)">TXT</a></li>--}}
                            {{--<li data-type="json"><a href="javascript:void(0)">JSON</a></li>--}}
                            {{--<li data-type="xml"><a href="javascript:void(0)">XML</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="pull-right search"><input class="form-control" type="text" placeholder="Search"></div>--}}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped dataTable" id="tblResults" role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="text-align-center"
                                    style="width: 60px;">STT
                                </th>
                                <th class="text-align-center"
                                    style="width: 175px;">Project
                                </th>
                                <th class="text-align-center"
                                    style="width: 150px;">Image
                                </th>
                                <th class="text-align-center"
                                    style="width: 150px;">Mô tả
                                </th>
                                <th class="text-align-center"
                                    style="width: 300px;">Nội dung
                                </th>
                                <th class="text-align-center"
                                    style="width: 100px;">Vị trí hiển thị
                                </th>
                                <th class="text-align-center"
                                    style="width: 100px;">#
                                </th>
                            </tr>
                            </thead>
                            <tbody id="dataTables_tbody">
                            <?php $i = 1; ?>
                            @foreach($object  as $iProjectInfo)
                                <tr role="row" class="odd">
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td>{{ $iProjectInfo->name }}</td>
                                    <td><img src="{{ url('/') }}/img/portfolio/{{ $iProjectInfo->image }}"
                                             class="img-responsive" alt="">
                                    </td>
                                    <td>
                                        <div class="div-text-overflow">{!! $iProjectInfo->description !!}</div>
                                    </td>
                                    <td>
                                        <div class="div-text-overflow">{!! $iProjectInfo->content  !!}</div>
                                    </td>
                                    <td class="text-center"><span
                                                class="badge bg-green span-green-radio-order">{{ $iProjectInfo->order }}</span>
                                    </td>
                                    <td>
                                        <a href="http://localhost/per_infomation_technology/public/admin/moduls/projectInfo/update/{{ $iProjectInfo->id }}"
                                           class="btn btn-warning btn-sm float-left"><i class="fa fa-pencil icon-white"></i></a>
                                        {{--!! Form::open(['method' => 'GET', 'route' => ['projectInfo.getEdit', $iProjectInfo->id], 'class' =>'float-left'])!!}--}}
                                        {{--{!! Form::hidden('id', $iProjectInfo->id)!!}--}}
                                        {{--{!! Form::button('<i class="fa fa-pencil icon-white"></i>', ['class' => 'btn btn-warning btn-sm', 'type'=>'submit']) !!}--}}
                                        {{--{!! Form::close() !!}--}}
                                        {{--<a class="glyphicon glyphicon-edit"--}}
                                        {{--href="{{ URL::current() }}/{{$iProjectInfo->id}}/edit"--}}
                                        {{--name="lk_show_dialog_info"></a>--}}
                                        <span class="float-left">&nbsp;&nbsp;</span>
                                        {{--<a class="glyphicon glyphicon-trash"  onclick="return confirm('Bạn có chắc chắn muốn xóa dữ liệu này đi không？')"--}}
                                        {{--href="{{ URL::current() }}/{{$iProjectInfo->id}}/destroy"--}}
                                        {{--name="lk_delete_customer"></a>--}}
                                        {{--<input type="hidden" name="projectInfo" value="{{$iProjectInfo->id}}"/>--}}
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['projectInfo.delete', $iProjectInfo->id], 'class' =>'delete-confirm float-left']) !!}
                                        {!! Form::hidden('id', $iProjectInfo->id)  !!}
                                        {!! Form::button('<i class="fa fa-trash icon-white"></i>', ['class' => 'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(".delete-confirm").on("submit", function () {
            return confirm("Bạn có chắc chắn muốn xóa bản ghi này?");
        });
    </script>
@stop
