@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Settings
@endsection
@section('content')
<section class="content">
    <div class="card my-2">
        @include('flashMessage.message')
        <form method="post" name="logo_form" action="" autocomplete="off">
            @csrf
            <div class="card-header">
                Settings
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_email">Email</label>
                            <input type="text" class="form-control" id="setting_email" name="setting_email" value="{{ old('setting_email') ? old('setting_email') : $setting->setting_email }}" autocomplete="off" />
                            @if($errors->has('setting_email'))
                            <span class="text-danger">
                                {{ $errors->first('setting_email') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="setting_phone_number" name="setting_phone_number" value="{{ old('setting_phone_number') ? old('setting_phone_number') : $setting->setting_phone_number }}" autocomplete="off" />
                            @if($errors->has('setting_phone_number'))
                            <span class="text-danger">
                                {{ $errors->first('setting_phone_number') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-9 d-none">
                        <div class="form-group">
                            <label for="setting_mobile_number">Mobile Number</label>
                            <input type="text" class="form-control" id="setting_mobile_number" name="setting_mobile_number" value="{{ old('setting_mobile_number') ? old('setting_mobile_number') : $setting->setting_mobile_number }}" autocomplete="off" />
                            @if($errors->has('setting_mobile_number'))
                            <span class="text-danger">
                                {{ $errors->first('setting_mobile_number') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_address">Address</label>
                            <input type="text" class="form-control" id="setting_address" name="setting_address" value="{{ old('setting_address') ? old('setting_address') : $setting->setting_address }}" autocomplete="off" />
                            @if($errors->has('setting_address'))
                            <span class="text-danger">
                                {{ $errors->first('setting_address') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_lunch_time">Lunch Time</label>
                            <input type="time" class="form-control" id="setting_lunch_time" name="setting_lunch_time" value="{{ old('setting_lunch_time') ? old('setting_lunch_time') : '' }}" autocomplete="off" />
                            @if($errors->has('setting_lunch_time'))
                            <span class="text-danger">
                                {{ $errors->first('setting_lunch_time') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_dinner_time">Dinner Time</label>
                            <input type="time" class="form-control" id="setting_dinner_time" name="setting_dinner_time" value="{{ old('setting_dinner_time') ? old('setting_dinner_time') :'' }}" autocomplete="off" />
                            @if($errors->has('setting_dinner_time'))
                            <span class="text-danger">
                                {{ $errors->first('setting_dinner_time') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_facebook_link">Facebook</label>
                            <input type="text" class="form-control" id="setting_facebook_link" name="setting_facebook_link" value="{{ old('setting_facebook_link') ? old('setting_facebook_link') : $setting->setting_facebook_link }}" autocomplete="off" />
                            @if($errors->has('setting_facebook_link'))
                            <span class="text-danger">
                                {{ $errors->first('setting_facebook_link') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_twitter_link">Twitter</label>
                            <input type="text" class="form-control" id="setting_twitter_link" name="setting_twitter_link" value="{{ old('setting_twitter_link') ? old('setting_twitter_link') : $setting->setting_twitter_link }}" autocomplete="off" />
                            @if($errors->has('setting_twitter_link'))
                            <span class="text-danger">
                                {{ $errors->first('setting_twitter_link') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_instagram_link">Instagram</label>
                            <input type="text" class="form-control" id="setting_instagram_link" name="setting_instagram_link" value="{{ old('setting_instagram_link') ? old('setting_instagram_link') : $setting->setting_instagram_link }}" autocomplete="off" />
                            @if($errors->has('setting_instagram_link'))
                            <span class="text-danger">
                                {{ $errors->first('setting_instagram_link') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-9">
                        <div class="form-group">
                            <label for="setting_linkedIn_link">LinkedIn</label>
                            <input type="text" class="form-control" id="setting_linkedIn_link" name="setting_linkedIn_link" value="{{ old('setting_linkedIn_link') ? old('setting_linkedIn_link') : $setting->setting_linkedIn_link }}" autocomplete="off" />
                            @if($errors->has('setting_linkedIn_link'))
                            <span class="text-danger">
                                {{ $errors->first('setting_linkedIn_link') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-9 d-none">
                        <div class="form-group">
                            <label for="setting_youtube_link">Youtube</label>
                            <input type="text" class="form-control" id="setting_youtube_link" name="setting_youtube_link" value="{{ old('setting_youtube_link') ? old('setting_youtube_link') : $setting->setting_youtube_link }}" autocomplete="off" />
                            @if($errors->has('setting_youtube_link'))
                            <span class="text-danger">
                                {{ $errors->first('setting_youtube_link') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-9 d-none">
                        <div class="form-group">
                            <label for="setting_tiktok_link">Tiktok</label>
                            <input type="text" class="form-control" id="setting_tiktok_link" name="setting_tiktok_link" value="{{ old('setting_tiktok_link') ? old('setting_tiktok_link') : $setting->setting_tiktok_link }}" autocomplete="off" />
                            @if($errors->has('setting_tiktok_link'))
                            <span class="text-danger">
                                {{ $errors->first('setting_tiktok_link') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="setting_googlemap">Google Map</label>
                        <textarea class="form-control" name="setting_googlemap" id="setting_googlemap" rows="5">{{ old('setting_googlemap') ? old('setting_googlemap') : $setting->setting_googlemap }}</textarea>
                        @if($errors->has('setting_googlemap'))
                        <span class="text-danger">
                            {{ $errors->first('setting_googlemap') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group col-md-9">
                        <label for="setting_meta_title">Meta Title</label>
                        <input type="text" id="setting_meta_title" class="form-control" name="setting_meta_title" value="{{ old('setting_meta_title') ? old('setting_meta_title') : $setting->setting_meta_title }}" placeholder="Meta Title" />
                        @if ($errors->has('setting_meta_title'))
                        <span class="text-danger">
                            {{ $errors->first('setting_meta_title') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-9">
                        <label for="setting_meta_keywords">Meta Keywords</label>
                        <input type="text" id="setting_meta_keywords" class="form-control" name="setting_meta_keywords" value="{{ old('setting_meta_keywords') ? old('setting_meta_keywords') : $setting->setting_meta_keywords }}" placeholder="Meta Keywords" />
                        @if ($errors->has('setting_meta_keywords'))
                        <span class="text-danger">
                            {{ $errors->first('setting_meta_keywords') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-9">
                        <label for="setting_meta_description">Meta Description</label>
                        <textarea name="setting_meta_description" id="setting_meta_description" class="form-control" placeholder="Meta Description">{{ old('setting_meta_description') ? old('setting_meta_description') : $setting->setting_meta_description }}</textarea>
                        @if ($errors->has('setting_meta_description'))
                        <span class="text-danger">
                            {{ $errors->first('setting_meta_description') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-9">
                        <label for="setting_schema">Schema</label>
                        <textarea name="setting_schema" id="setting_schema" class="form-control" placeholder="Schema">{{ old('setting_schema') ? old('setting_schema') : $setting->setting_schema }}</textarea>
                        @if ($errors->has('setting_schema'))
                        <span class="text-danger">
                            {{ $errors->first('setting_schema') }}
                        </span>
                        @endif
                    </div>


                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Update">
                <a class="btn btn-danger" href="{{ route('home') }}">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection