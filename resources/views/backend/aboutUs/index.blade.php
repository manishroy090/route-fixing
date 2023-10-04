@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | About Us
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
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
   <div class="container-fluid">
      <form action="{{route('backend.about_us_update')}}" method="post" enctype="multipart/form-data" autocomplete="off">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary card-tabs">
                  <div class="card-header">
                     <h3 class="card-title">About us</h3>
                  </div>
                  <div class="card-body">
                     <div class="form-group col-md-9">
                        <label for="about_us_title">Title</label>
                        <input id="about_us_title" class="form-control" type="text" name="about_us_title" value="{{isset($aboutUs->about_us_title) ? $aboutUs->about_us_title : ''}}">
                        @if($errors->has('about_us_title'))
                        <span class="text-danger">
                           {{ $errors->first('about_us_title') }}
                        </span>
                        @endif
                     </div>

                     <div class="form-group col-md-9">
                        <label for="about_us_description">Description</label>
                        <textarea name="about_us_description" id="about_us_description" class="form-control editor">{{isset($aboutUs->about_us_description) ? $aboutUs->about_us_description : '' }}</textarea>
                        @if($errors->has('about_us_description'))
                        <span class="text-danger">
                           {{ $errors->first('about_us_description') }}
                        </span>
                        @endif
                     </div>

                     <div class="form-group col-md-9">
                        <label for="about_us_image_preview">Images</label>
                     </div>
                     <div class="form-group col-md-9">
                        <img src="{{ ( ($aboutUs->about_us_fst_image  ?? '' != '') && file_exists(public_path('images/aboutus/thumb/'.$aboutUs->about_us_fst_image))) ? asset('images/aboutus/thumb/'.$aboutUs->about_us_fst_image) : getFallBackImage(586, 458, 'default') }}" alt="About Image" class="rounded" id="about_us_image_preview">
                     </div>

                     <div class="form-group col-md-9">
                        <label for="about_us_image">Image 1</label>
                        <input type="file" onchange="showPreview(event,'about_us_image_preview','586','458')" accept="image/*" class="form-control">
                        <input type="hidden" id="about_us_image" class="form-control" name="about_us_image" value="{{ old('about_us_fst_image') ? old('about_us_fst_image') : '' }}" readonly />
                        @if($errors->has('about_us_image'))
                        <span class="text-danger">
                           {{ $errors->first('about_us_image') }}
                        </span>
                        @endif
                     </div>

                     <div class="form-group col-md-9">
                        <img src="{{ (($aboutUs->about_us_sec_image  ?? '' != '') && file_exists(public_path('images/aboutus/thumb/'.$aboutUs->about_us_sec_image))) ? asset('images/aboutus/thumb/'.$aboutUs->about_us_sec_image) : getFallBackImage(586, 458, 'default') }}" alt="About Image" class="rounded" id="about_us_fstimage_preview">
                     </div>
                     <div class="form-group col-md-9">
                        <label for="about_us_sec_image">Image 2</label>
                        <input type="file" onchange="showPreview(event,'about_us_fstimage_preview','586','458')" accept="image/*" class="form-control">
                        <input type="hidden" id="about_us_fstimage" class="form-control" name="about_us_fstimage" value="{{ old('about_us_sec_image') ? old('about_us_sec_image') : '' }}" readonly />
                        @if($errors->has('about_us_image'))
                        <span class="text-danger">
                           {{ $errors->first('about_us_image') }}
                        </span>
                        @endif
                     </div>
                     <div class="form-group col-md-9">
                        <label for="about_us_meta_title">Meta Title</label>
                        <input id="about_us_meta_title" class="form-control" type="text" name="about_us_meta_title" value="{{isset($aboutUs->about_us_meta_title)}}">
                        @if($errors->has('about_us_meta_title'))
                        <span class="text-danger">
                           {{ $errors->first('about_us_meta_title') }}
                        </span>
                        @endif
                     </div>
                     <div class="form-group col-md-9">
                        <label for="about_us_meta_keywords">Meta Keywords</label>
                        <input id="about_us_meta_keywords" class="form-control" type="text" name="about_us_meta_keywords" value="{{isset($aboutUs->about_us_meta_keywords) ? $aboutUs->about_us_meta_keywords : '' }}">
                        @if($errors->has('about_us_meta_keywords'))
                        <span class="text-danger">
                           {{ $errors->first('about_us_meta_keywords') }}
                        </span>
                        @endif
                     </div>
                     <div class="form-group col-md-9">
                        <label for="about_us_meta_description">Meta Description</label>
                        <textarea name="about_us_meta_description" id="about_us_meta_description" class="form-control">{{isset($aboutUs->about_us_meta_keywords) ? $aboutUs->about_us_meta_keywords : ''}}</textarea>
                        @if($errors->has('about_us_meta_description'))
                        <span class="text-danger">
                           {{ $errors->first('about_us_meta_description') }}
                        </span>
                        @endif
                     </div>
                     <div class="form-group col-md-9">
                        <label for="about_us_schema">Schema</label>
                        <textarea name="about_us_schema" id="about_us_schema" class="form-control">{{isset($aboutUs->about_us_schema) ? $aboutUs->about_us_schema : '' }}</textarea>
                        @if($errors->has('about_us_schema'))
                        <span class="text-danger">
                           {{ $errors->first('about_us_schema') }}
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="card-footer">
                     <input type="submit" class="btn btn-primary" value="Update">
                     <a href="#" class="btn btn-danger">Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection