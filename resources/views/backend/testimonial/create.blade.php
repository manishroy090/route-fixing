@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Testimonial Add
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
<div class="content">
   <div class="container-fluid">
      <form action="{{route('backend.testimonial_store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary card-tabs">
                  <div class="card-header">
                     <h3 class="card-title">Create Testimonial</h3>
                  </div>
                  <div class="card-body">
                     <div class="form-group col-md-9">
                        <label for="testimonial_author">Author</label>
                        <input type="text" id="testimonial_author" class="form-control" name="testimonial_author" value="{{ old('testimonial_author')?old('testimonial_author'):'' }}" />
                        @if($errors->has('testimonial_author'))
                        <span class="text-danger">
                           {{ $errors->first('testimonial_author') }}
                        </span>
                        @endif
                     </div>
                     <div class="form-group col-md-9">
                        <label for="testimonial_description">Description</label>
                        <textarea name="testimonial_description" id="testimonial_description" class="form-control" rows="5" style="resize:none;">{{ old('testimonial_description')?old('testimonial_description') : '' }}
                        </textarea>
                        @if($errors->has('testimonial_description'))
                        <span class="text-danger">
                           {{ $errors->first('testimonial_description') }}
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="card-footer">
                     <input type="submit" class="btn btn-primary" value="Publish">
                     <a href="" class="btn btn-danger">Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection