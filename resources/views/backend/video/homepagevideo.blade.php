@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Homepage Video
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
      <form action="{{ route('video.homepage_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary card-tabs">
                  <div class="card-header">
                     <h3 class="card-title">Add / Update Video</h3>
                  </div>
                  <div class="card-body">

                     <div class="form-group col-md-9">
                        <label for="video_title">Video Title</label>
                        <input type="text" id="video_title" class="form-control" name="video_title" value="{{ old('video_title') ? old('video_title') : $video->video_title }}" placeholder="Video Title" autocomplete="off" />
                        @if($errors->has('video_title'))
                        <span class="text-danger">
                        {{ $errors->first('video_title') }}
                        </span>
                        @endif
                     </div>

                     <div class="form-group col-md-9">
                        <label for="video_sub_title">Video Sub-Title</label>
                        <input type="text" id="video_sub_title" class="form-control" name="video_sub_title" value="{{ old('video_sub_title') ? old('video_sub_title') : $video->video_sub_title }}" placeholder="Video Sub-Title" autocomplete="off" />
                        @if($errors->has('video_sub_title'))
                        <span class="text-danger">
                        {{ $errors->first('video_sub_title') }}
                        </span>
                        @endif
                     </div>

                     

                     <div class="form-group col-md-9">
                        <label for="video_url">Video Url</label>
                        <input type="text" id="video_url" class="form-control" name="video_url" value="{{ old('video_url') ? old('video_url') : $video->video_url }}" autocomplete="off" placeholder="Eg:https://www.youtube.com/watch?v=yBabc9dG-q0" />
                        @if($errors->has('video_url'))
                        <span class="text-danger">
                        {{ $errors->first('video_url') }}
                        </span>
                        @endif
                     </div>

                     <div class="form-group col-md-9">
                        <label for="video_fallbackimage_preview">Fallback Image</label>
                     </div>
                     <div class="form-group col-md-9">
                        <img src="{{ (($video->video_fallbackimage != '') && file_exists(public_path('images/videos/thumb/'.$video->video_fallbackimage))) ? asset('images/videos/thumb/'.$video->video_fallbackimage) : getFallBackImage(300, 300, 'default') }}" alt="Blog Image" class="rounded" id="video_fallbackimage_preview">
                     </div>
                     <div class="form-group col-md-9">
                        <input type="file" onchange="showPreview(event,'video_fallbackimage_preview','397','249')" accept="image/*" class="form-control">
                        <input type="hidden" id="video_fallbackimage" class="form-control" name="video_fallbackimage" value="{{ old('video_fallbackimage') ? old('video_fallbackimage') : $video->video_fallbackimage }}"  readonly />
                        @if($errors->has('video_fallbackimage'))
                        <span class="text-danger">
                        {{ $errors->first('video_fallbackimage') }}
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="card-footer">
                     <input type="submit" class="btn btn-primary" value="Save">
                     <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection