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
                            <select name="searchType" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;">
                                <option value="0" selected="selected"></option>
                                <option value="1">Chưa xử lý</option>
                                <option value="2">Đã xử lý</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="padding-top-10p" colspan="4">
                            <div class="col-sm-5">
                            </div>
                            <button class="btn btn-default" type="button" name="btnSearch">Tìm kiếm</button>
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
                            <div class="dataTables_length" id="cbPagesOnRows"><label>Hiển thị
                                    <select name="slRowsInPage" class="form-control input-sm"
                                            onchange="selectRowsInPage()">
                                        <option value="5">5</option>
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
                                        style="width: 60px;">#
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
                                @foreach($object['lstContacts']  as $iContacts)
                                    <tr role="row" class="odd">
                                        <td>
                                            <samp class="glyphicon glyphicon-edit"
                                                  name="lk_show_dialog_info"></samp>
                                            &nbsp;
                                            <samp class="glyphicon glyphicon-trash"
                                                  name="lk_delete_customer"></samp>
                                            <input type="hidden" name="contactsId" value="{{$iContacts->id}}"/>
                                        </td>
                                        <td> {{ $iContacts->name }}</td>
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
                                        <td class="word-break-all-200p">
                                            <div class="text-overflow-hide">{{ $iContacts->content }}</div>
                                        </td>
                                        <td>{{ $iContacts->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ $iContacts->updated_at->format('d/m/Y H:i:s') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="">
                                Hiển thị <span name="totalRowPage">{{ count($object['lstContacts']) }}</span> trong
                                <span name="countRows">{{ $object['count'] }}</span> dòng
                            </div>
                        </div>
                        <div class="col-sm-7" name="pagingDiv">
                            {{--Paging start--}}
                            @if ($object['limitRows'] < $object['count'])
                                <div class="">
                                    <div id="news_paginate" class="">
                                        <ul class="pagination margin-none float-right">
                                            @if($object['lastPage'] > $object['showLinkTotal'])
                                                <li id="pageFirts" class="paginate_button page-item {{ ($object['currentPage'] == 1) ? ' disabled' : '' }}">
                                                    @if($object['currentPage'] == 1)
                                                        <div class="page-link">Firts</div>
                                                    @else
                                                        <div class="page-link" onclick="selectPage(1)">Firts</div>
                                                    @endif
                                                </li>
                                            @endif
                                            <li id="news_previous"
                                                class="paginate_button page-item previous {{ ($object['currentPage'] == 1) ? ' disabled' : '' }}">
                                                @if($object['currentPage']-1>0)
                                                    <div class="page-link"
                                                         onclick="selectPage({{ $object['currentPage']-1 }})">Previous
                                                    </div>
                                                @else
                                                    <div class="page-link">Previous</div>
                                                @endif
                                            </li>
                                            @for ($i = 1; $i <= $object['lastPage']; $i++)
                                                <?php
                                                $half_total_links = floor($object['showLinkTotal'] / 2);
                                                $from = $object['currentPage'] - $half_total_links;
                                                $to = $object['currentPage'] + $half_total_links;
                                                if ($object['currentPage'] < $half_total_links) {
                                                    $to += $half_total_links - $object['currentPage'];
                                                }
                                                if ($object['lastPage'] - $object['currentPage'] < $half_total_links) {
                                                    $from -= $half_total_links - ($object['lastPage'] - $object['currentPage']) - 1;
                                                }
                                                ?>
                                                @if ($from < $i && $i < $to)
                                                    <li class="paginate_button page-item {{ ($object['currentPage'] == $i) ? ' active' : '' }}">
                                                        <div class="page-link"
                                                             onclick="selectPage({{ $i }})">{{ $i }}</div>
                                                    </li>
                                                @endif
                                            @endfor
                                            <li id="news_next"
                                                class="paginate_button page-item {{ ($object['currentPage'] == $object['lastPage']) ? ' disabled' : '' }}">
                                                @if($object['currentPage'] == $object['lastPage'])
                                                    <div class="page-link">End</div>
                                                @else
                                                    <div class="page-link"
                                                         onclick="selectPage({{ $object['currentPage']+1 }})">Next
                                                    </div>
                                                @endif
                                            </li>
                                            @if($object['lastPage'] > $object['showLinkTotal'])
                                                <li id="pageLast" class="paginate_button page-item {{ ($object['currentPage'] == lastPage) ? ' disabled' : '' }}">
                                                    @if($object['currentPage'] == $object['lastPage'])
                                                        <div class="page-link">Last</div>
                                                    @else
                                                        <div class="page-link" onclick="selectPage($object['lastPage'])">Last</div>
                                                    @endif
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            {{--Paging end--}}
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
