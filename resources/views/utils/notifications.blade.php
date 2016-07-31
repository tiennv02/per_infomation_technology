@if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger  margin-bottom-0p">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-exclamation-circle faa-pulse animated"></i>
                <strong>Error: </strong>
               Có lỗi xảy ra, Xin vui lòng thử lại sau!.
            </div>
        </div>
    </div>
@endif


@if ($message = Session::get('status'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success margin-bottom-0p">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-check faa-pulse animated"></i>
                <strong>Success: </strong>
                {{ $message }}
            </div>
        </div>
    </div>
@endif


@if ($message = Session::get('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success margin-bottom-0p">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-check faa-pulse animated"></i>
                <strong>Success: </strong>
                {{ $message }}
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert alert-danger margin-bottom-0p">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-exclamation-circle faa-pulse animated"></i>
                <strong>Error: </strong>
                {{ $message }}
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning margin-bottom-0p">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-warning faa-pulse animated"></i>
                <strong>Warning: </strong>
                {{ $message }}
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info margin-bottom-0p">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-info-circle faa-pulse animated"></i>
                <strong>Info: </strong>
                {{ $message }}
            </div>
        </div>
    </div>
@endif
