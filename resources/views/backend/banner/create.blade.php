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
        <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="bg-primary border border-secondary rounded">
                            <h3 class="card-title ml-5 mt-2">Banner</h3>
                        </div>
                        <div class="form-group col-md-9">
                            <img src="{{(($banners->banner_image ?? '' != '' ) && file_exists(public_path('images/aboutus/thumb/'.$banners->banner_image))) ? asset('images/aboutus/thumb/'.$banners->banner_image) : getFallBackImage(586, 458, 'default') }}" alt="About Image" class=" rounded img-fluid" id="banner_image_preview">
                        </div>

                        <div class="card-body">
                            <div class="form-group col-md-9 ">
                                <input type="file" name="banner_image" id="banner_image" class="form-control file_video_upload" onchange="showPreview(event,'banner_image_preview','1903','485')" \>
                                @if ($errors->has('banner_image'))
                                <span class="text-danger">
                                    {{ $errors->first('banner_image') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-9">
                                <label for="banner_order">Order</label>
                                <input type="number" id="banner_order" class="form-control" name="banner_order" value="{{ old('banner_order') ? old('banner_order') : '' }}">
                                @if ($errors->has('banner_order'))
                                <span class="text-danger">
                                    {{ $errors->first('banner_order') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="form-group col-md-9">
                                <input type="submit" class="btn btn-primary" value="Publish">
                                <a href="{{ route('banners.index') }}" class="btn btn-danger">Cancel</a>
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