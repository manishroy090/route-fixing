@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Banner Add
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @include('flashMessage.message')
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{route('backend.roomcategories_update',$roomCategory->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Banner</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group col-md-9 ">
                                <label for="room_category">Room Category</label>
                                <input type="text" name="room_category" id="room_category" class="form-control" value="{{$roomCategory->room_category}}">
                                @if ($errors->has('room_category'))
                                <span class="text-danger">
                                    {{ $errors->first('room_category') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="no_room">No of Room</label>
                                <input type="number" id="no_room" class="form-control" name="no_room" value="{{$roomCategory->no_room}}">
                                @if ($errors->has('no_room'))
                                <span class="text-danger">
                                    {{ $errors->first('no_room') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="form-group col-md-9">
                                <input type="submit" class="btn btn-primary" value="Create">
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>

                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </form>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection