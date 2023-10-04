@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Services Add
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
      <form action="{{route('backend.Service_update', $service->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary card-tabs">
                  <div class="card-header">
                     <h3 class="card-title">Create Services</h3>
                  </div>

                  <div class="card-body">
                     <div class="form-group col-md-9">
                        <label for="services_title">Title</label>
                        <input type="text" id="services_title" class="form-control" name="services_title" value="{{ old('services_title')?old('services_title'): $service->services_title}}" autocomplete="off" />
                        @if($errors->has('services_title'))
                        <span class="text-danger">
                           {{ $errors->first('services_title') }}
                        </span>
                        @endif
                     </div>

                     <div class="form-group col-md-9">
                        <label for="services_description">Description</label>
                        <textarea name="services_description" id="services_description" class="form-control" autocomplete="off">{{ old('services_description')?old('services_description'): $service->services_description}}</textarea>
                        @if($errors->has('services_description'))
                        <span class="text-danger">
                           {{ $errors->first('services_description') }}
                        </span>
                        @endif
                     </div>

                     {{-- <div class="form-group col-md-9">
                        <label for="services_icon">Icon</label>
                     </div>
                     <div class="form-group col-md-9">
                        <img src="{{ asset('images/fallback-logo.png') }}" alt="Service Icon"
                     class="rounded" id="services_icon" height="76px" width="76px">
                  </div>
                  <div class="form-group col-md-9">
                     <input type="file" name="services_icon" onchange="document.getElementById('services_icon').src = window.URL.createObjectURL(this.files[0])" accept="image/*" class="form-control">
                     @if($errors->has('services_icon'))
                     <span class="text-danger">
                        {{ $errors->first('services_icon') }}
                     </span>
                     @endif
                  </div> --}}

                  <div class="form-group col-md-9">
                     <label for="services_coverimage">Cover Image</label>
                  </div>
                  <div class="form-group col-md-9">
                     <img src="{{ (($service->services_coverimage ?? '' != '') && file_exists(public_path('images/services/thumb/'.$service->services_coverimage))) ? asset('images/services/thumb/'.$service->services_coverimage) : asset('fallback-logo.png') }}" alt="Service Image" class="rounded" id="services_coverimage_preview" width="200px">
                  </div>
                  <div class="form-group col-md-9">
                     <input type="file" onchange="showPreview(event,'services_coverimage_preview','1903','485')" accept="image/*" class="form-control">
                     <input type="hidden" name="services_coverimage" readonly class="form-control" id="services_coverimage"  />
                     @if($errors->has('services_coverimage'))
                     <span class="text-danger">
                        {{ $errors->first('services_coverimage') }}
                     </span>
                     @endif
                  </div>
                  <div class="form-group col-md-9">
                     <label for="services_icon">icon</label>
                  </div>
                  <div class="form-group col-md-9">
                     <img src="{{ (($service->services_icon ?? '' != '') && file_exists(public_path('images/services/thumb/'.$service->services_icon))) ? asset('images/services/thumb/'.$service->services_icon) : asset('fallback-logo.png') }}" alt="Service Image" class="rounded" id="services_icon_preview" width="200px">
                  </div>
                  <div class="form-group col-md-9">
                     <input type="file" onchange="showPreview(event,'services_icon_preview','1903','485')" accept="image/*" class="form-control" >
                     <input type="hidden" name="services_icon" readonly class="form-control" id="services_icon"/>
                     @if($errors->has('services_icon'))
                     <span class="text-danger">
                        {{ $errors->first('services_icon') }}
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
   <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
   CKEDITOR.replace('services_description');
</script>
@endsection