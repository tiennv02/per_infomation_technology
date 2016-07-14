@extends('templates.admin.template')
@section('moduls')
    <section class="content-header">
        <h1>
            Management Contacts
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Management Contacts</li>
        </ol>
    </section>
    <section class="content-header">
        <div class="box box-default margin-bottom-0p">
            <div class="box-header with-border heading-css">
                <h3 class="box-title  font-size-14p">Tìm kiếm</h3>

                <div class="box-tools pull-right">
                    <button data-widget="collapse" class="btn btn-box-tool" type="button"><i
                                class="fa fa-chevron-down"></i>
                    </button>
                    {{--<button data-widget="remove" class="btn btn-box-tool" type="button"><i class="fa fa-remove"></i>--}}
                    {{--</button>--}}
                </div>
            </div>
            <div class="box-body" style="display: block;">
                <table class="table border-none" id="tblSearch">
                    <tr>
                        <td class="padding-top-10p">
                            <label class="control-label">Họ tên</label>
                        </td>
                        <td><input name="searchName" class="form-control" type="text">
                        </td>
                        <td class="padding-top-10p">
                            <label class="control-label">Email</label>
                        </td>
                        <td><input name="searchEmail" class="form-control" type="email">
                        </td>
                    </tr>
                    <tr>
                        <td class="padding-top-10p">
                            <label class="control-label">SĐT</label>
                        </td>
                        <td><input name="searchPhone" class="form-control" type="text">
                        </td>
                        <td class="padding-top-10p">
                            <label class="control-label">Loại</label>
                        </td>
                        <td>
                            <select name="searchType" class="form-control select2 select2-hidden-accessible" style="width: 100%;">
                                <option value="1" selected="selected">Chưa xử lý</option>
                                <option value="2">Đã xử lý</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="padding-top-10p" colspan="4">
                            <button class="btn btn-default float-right" type="button" name="btnSearch">Tìm kiếm</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Kết quả tìm kiếm</div>
            <div class="panel-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_length" id="cbPagesOnRows"><label>Hiển thị <select
                                            name="example1_length" aria-controls="example1"
                                            class="form-control input-sm">
                                        <option value="10" selected="selected">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> dòng</label></div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped dataTable" id="tblResults" role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="text-align-center"
                                        style="width: 75px;">#
                                    </th>
                                    <th class="text-align-center"
                                        style="width: 175px;">Họ và Tên
                                    </th>
                                    <th class="text-align-center"
                                        style="width: 150px;">
                                        Email
                                    </th>
                                    <th class="text-align-center"
                                        style="width: 150px;">Số điện thoại
                                    </th>
                                    <th class="text-align-center"
                                        style="width: 100px;">Trạng thái
                                    </th>
                                    <th class="text-align-center"
                                        style="width: 200px;">Nội dung
                                    </th>
                                    <th class="text-align-center"
                                        style="width: 100px;">
                                        Ngày tạo
                                    </th>
                                    <th class="text-align-center"
                                        style="width: 100px;">
                                        Cập nhật
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="dataTables_tbody">
                                @foreach($object  as $iContacts)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <samp class="glyphicon glyphicon-edit"
                                                  name="lk_show_dialog_info"></samp>
                                            &nbsp;
                                            <samp class="glyphicon glyphicon-trash"
                                                  name="lk_delete_customer"></samp>
                                            <input type="hidden" name="contactsId" value="{{$iContacts->id}}"/>
                                        </td>
                                        <td class="sorting_1">{{ $iContacts->name }}</td>
                                        <td>{{ $iContacts->email }}</td>
                                        <td>{{ $iContacts->phone }}</td>
                                        <td>
                                            @if($iContacts->type == '1')
                                                Chưa xử lý
                                            @elseif($iContacts->type == '2')
                                                Đã xử lý
                                            @else

                                            @endif
                                        </td>
                                        <td class="word-break-all-200p"><div class="text-overflow-hide">{{ $iContacts->content }}</div></td>
                                        <td>{{ $iContacts->created_at }}</td>
                                        <td>{{ $iContacts->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-align-center">#</th>
                                    <th class="text-align-center">Họ và Tên</th>
                                    <th class="text-align-center">Email</th>
                                    <th class="text-align-center">Số điện thoại</th>
                                    <th class="text-align-center">Trạng thái</th>
                                    <th class="text-align-center">Nội dung</th>
                                    <th class="text-align-center">Ngày tạo</th>
                                    <th class="text-align-center">Cập nhật</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="">
                                Hiển thị {{ ($object->currentPage() -1) * $object->perPage() + 1 }}
                                đến {{($object->currentPage()-1) * $object->perPage() + $object->count()}}
                                trong {{ $object->total() }} dòng
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="">
                                <?php
                                $link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
                                ?>

                                @if ($object->lastPage() > 1)
                                    <div id="news_paginate" class="">
                                        <ul class="pagination margin-none float-right">
                                            <li id="news_previous"
                                                class="paginate_button page-item previous {{ ($object->currentPage() == 1) ? ' disabled' : '' }}">
                                                <a class="page-link" tabindex="0"
                                                   href="{{ $object->url(1) }}">Previous</a>
                                            </li>
                                            @for ($i = 1; $i <= $object->lastPage(); $i++)
                                                <?php
                                                $half_total_links = floor($link_limit / 2);
                                                $from = $object->currentPage() - $half_total_links;
                                                $to = $object->currentPage() + $half_total_links;
                                                if ($object->currentPage() < $half_total_links) {
                                                    $to += $half_total_links - $object->currentPage();
                                                }
                                                if ($object->lastPage() - $object->currentPage() < $half_total_links) {
                                                    $from -= $half_total_links - ($object->lastPage() - $object->currentPage()) - 1;
                                                }
                                                ?>
                                                @if ($from < $i && $i < $to)
                                                    <li class="paginate_button page-item {{ ($object->currentPage() == $i) ? ' active' : '' }}">
                                                        <a class="page-link"
                                                           href="{{ $object->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endif
                                            @endfor
                                            <li id="news_next"
                                                class="paginate_button page-item {{ ($object->currentPage() == $object->lastPage()) ? ' disabled' : '' }}">
                                                @if($object->currentPage() == $object->lastPage())
                                                    <a class="page-link" tabindex="0"
                                                       href="{{ $object->url($object->currentPage()) }}">End</a>
                                                @else
                                                    <a class="page-link" tabindex="0"
                                                       href="{{ $object->url($object->currentPage()+1) }}">Next</a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--contacts include js_start--}}
    <script type="text/javascript" src="{{ URL::asset('js/admin/moduls/contacts/index.js') }}"></script>
    {{--contacts include js_end--}}
            <!-- modal start -->
    @include('admin.moduls.contacts.addAndEdit')
    <!-- modal end -->
@stop
