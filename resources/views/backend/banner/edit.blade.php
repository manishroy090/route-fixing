@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Banner Edit
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
        <form action="{{ route('backend.banner_update', $banner->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="bg-primary border border-secondary rounded">
                            <h3 class="card-title ml-5 mt-2">Banner</h3>
                        </div>
                        <div class="form-group col-md-9 mt-5">
                            <img src="{{ (($banner->banner_image != '') && file_exists(public_path('images/banners/'.$banner->banner_image))) ? asset('images/banners/'.$banner->banner_image) : asset('fallback-logo.png') }}" alt="Banner Image" class="rounded border border-secondary" id="banner_image img-fluid" style="height: 200px;width: 700px;object-fit: contain;">
                        </div>

                        <div class="card-body">
                            <div class="form-group col-md-9 ">
                                <input type="file" name="banner_image" onchange="document.getElementById('banner_image').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                                @if($errors->has('banner_image'))
                                <span class="text-danger">
                                    {{ $errors->first('banner_image') }}
                                </span>
                                @endif

                            </div>

                            <div class="form-group col-md-9">
                                <label for="banner_order">Order</label>
                                <input type="number" id="banner_order" class="form-control" name="banner_order" value="{{ old('banner_order') ? old('banner_order') : $banner->banner_order }}">
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
                                <a href="{{route('backend.banner_index') }}" class="btn btn-danger">Cancel</a>
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