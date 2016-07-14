<div id="dialog_addAndEdit" class="modal fade bs-example-modal-xs" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="margin-none">Contacts management</h3>
            </div>
            <div class="modal-body">
                <div name="div-errors">
                    <p>Các lỗi sau đây đã xảy ra: <span name="total-errors"></span></p>
                    <ul name="list-error">
                    </ul>
                </div>
                <table class="table table-borderless border-none">
                    <tr>
                        <td width="15%">
                            Họ và tên
                        </td>
                        <td width="85%">
                            {!! Form::input('hidden', 'contactsId')!!}

                            {!! Form::text( 'contactsName', null,  array('maxlength' => '200','disabled' => 'disabled', 'class' => 'form-control width-250p')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            {!! Form::text( 'contactsEmail','', array('maxlength' => '200','disabled' => 'disabled', 'class' => 'form-control width-250p')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Số điện thoại
                        </td>
                        <td>
                            {!! Form::text( 'contactsPhone','', array('maxlength' => '25','disabled' => 'disabled', 'class' => 'form-control width-250p')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Trạng thái
                        </td>
                        <td>
                            {!! Form::select('contactsType', ['1'=>'Chưa xử lý','2'=>'Đã xử lý'], '1', ['class' => 'form-control width-250p']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ngày tạo
                        </td>
                        <td>
                            {!! Form::text('contactsCreateAt','', array('maxlength' => '50', 'disabled' => 'disabled', 'class' => 'form-control width-250p')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Cập nhật
                        </td>
                        <td>
                            {!! Form::text('contactsUpdateAt','', array('maxlength' => '50','disabled' => 'disabled' , 'class' => 'form-control width-250p')) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nội dung
                        </td>
                        <td>
                            {!! Form::textarea('contactsContent','', array('maxlength' => '1000', 'size' => '300x5','disabled' => 'disabled' ,'class' => 'form-control width-750p')) !!}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <a class="btn" name="dialog_addAndEdit_close">Đóng</a>
                <a class="btn btn-primary" name="dialog_addAndEdit_save">Lưu lại</a>
            </div>
        </div>
    </div>
</div>

{{--contacts include js_start--}}
<script type="text/javascript" src="{{ URL::asset('js/admin/moduls/contacts/addAndEdit.js') }}"></script>
{{--contacts include js_end--}}