@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Page Edit
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @include('flashMessage.message')
            </div>
        </div>
    </div>
</div>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{ route('pages.update', $pages->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Pages</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-9">
                                <label for="pages_title">Title</label>
                                <input type="text" id="pages_title" class="form-control" name="pages_title" value="{{ old('pages_title') ? old('pages_title') : $pages->pages_title }}" autocomplete="off" />
                                @if($errors->has('pages_title'))
                                <span class="text-danger">
                                    {{ $errors->first('pages_title') }}
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-9">
                                <label for="pages_description">Description</label>
                                <textarea name="pages_description" id="pages_description" autocomplete="off" class="form-control editor">{{ old('pages_description') ? old('pages_description') : $pages->pages_description }}</textarea>
                                @if($errors->has('pages_description'))
                                <span class="text-danger">
                                    {{ $errors->first('pages_description') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-9">
                                <label>Image</label>
                                <img src="{{ (($pages->pages_image != '') && file_exists(public_path('images/pages/thumb/'.$pages->pages_image))) ? asset('images/pages/thumb/'.$pages->pages_image) : asset('images/fallback-logo.png') }}" alt="pages Image"
                                    class="rounded" id="pages_image" height="200px" width="200px">
                            </div>

                            <div class="form-group col-md-9">
                                <input type="file" name="pages_image"
                                onchange="document.getElementById('pages_image').src = window.URL.createObjectURL(this.files[0])"
                                accept="image/*">
                                @if($errors->has('pages_image'))
                                <span class="text-danger">
                                    {{ $errors->first('pages_image') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-9">
                                <label for="pages_meta_title">Meta Title</label>
                                <textarea name="pages_meta_title" rows="5" class="form-control" id="pages_meta_title" autocomplete="off" >{{ old('pages_meta_title') ? old('pages_meta_title') : $pages->pages_meta_title }}</textarea>
                                @if($errors->has('pages_meta_title'))
                                <span class="text-danger">
                                    {{ $errors->first('pages_meta_title') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-9">
                                <label for="pages_meta_description">Meta Description</label>
                                <textarea name="pages_meta_description" rows="10" class="form-control" id="pages_meta_description" autocomplete="off">{{ old('pages_meta_title') ? old('pages_meta_description') : $pages->pages_meta_description }}</textarea>
                                @if($errors->has('pages_meta_description'))
                                <span class="text-danger">
                                    {{ $errors->first('pages_meta_description') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-9">
                                <label for="pages_order">Page Order</label>
                                <input type="number" id="pages_order" class="form-control" name="pages_order" min="1"
                                   value="{{ old('pages_order')?old('pages_order'):$pages->pages_order }}">
                                @if($errors->has('pages_order'))
                                <span class="text-danger">
                                {{ $errors->first('pages_order') }}
                                </span>
                                @endif
                             </div>

                        </div>

                        <div class="card-footer">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Publish">
                                <a href="{{ route('pages.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </form>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection