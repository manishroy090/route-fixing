@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Update Section / Page Contents
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
      <form action="{{ route('backend.updateSectionPageContent') }}" method="post" enctype="multipart/form-data" autocomplete="off">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary card-tabs">
                  <div class="card-header">
                     <h3 class="card-title">Headings / Sub-Headings</h3>
                  </div>
                  <div class="card-body">
                     <div class="col-md-12">

                     <div class="form-group col-md-9">
                        <label for="home_hamroqr_image_preview">Home Page Image</label>
                     </div>
                     <div class="form-group col-md-9">
                        <img src="{{ (($sectionpageheadings->home_hamroqr_image != '') && file_exists(public_path('images/section-headings/thumb/'.$sectionpageheadings->home_hamroqr_image))) ? asset('images/section-headings/thumb/'.$sectionpageheadings->home_hamroqr_image) : getFallBackImage(200, 200, 'default') }}" alt="Homepage Image" class="rounded" id="home_hamroqr_image_preview" />
                     </div>

                     <div class="form-group col-md-9">
                        <input type="file" onchange="showPreview(event,'home_hamroqr_image_preview','200','200')" accept="image/*" class="form-control">
                        <input type="hidden" id="home_hamroqr_image" class="form-control" name="home_hamroqr_image" value="{{ old('home_hamroqr_image') ? old('home_hamroqr_image') : '' }}"  readonly />
                        @if($errors->has('home_hamroqr_image'))
                        <span class="text-danger">
                        {{ $errors->first('home_hamroqr_image') }}
                        </span>
                        @endif
                     </div>

                     <div class="form-group col-md-9">
                           <label for="home_merchant_title">Merchant Section Title</label>
                           <input class="form-control" name="home_merchant_title"  id="home_merchant_title" value="{{ old('home_merchant_title') ? old('home_merchant_title') : $sectionpageheadings->home_merchant_title }}" />
                           @if($errors->has('home_merchant_title'))
                           <span class="text-danger">
                              {{ $errors->first('home_merchant_title') }}
                           </span>
                           @endif
                        </div>

                        <div class="form-group col-md-9">
                           <label for="home_merchant_description">Merchant Section Description</label>
                           <textarea class="form-control editor" name="home_merchant_description" id="home_merchant_description" rows="5">{{ old('home_merchant_description') ? old('home_merchant_description') : $sectionpageheadings->home_merchant_description }}</textarea>
                           @if($errors->has('home_merchant_description'))
                           <span class="text-danger">
                              {{ $errors->first('home_merchant_description') }}
                           </span>
                           @endif
                        </div>

                        <div class="form-group col-md-9">
                        <label for="home_merchant_image_preview">Home Page Image</label>
                     </div>
                     <div class="form-group col-md-9">
                        <img src="{{ (($sectionpageheadings->home_merchant_image != '') && file_exists(public_path('images/section-headings/thumb/'.$sectionpageheadings->home_merchant_image))) ? asset('images/section-headings/thumb/'.$sectionpageheadings->home_merchant_image) : getFallBackImage(612, 516, 'default') }}" alt="Merchant Section Image" class="rounded" id="home_merchant_image_preview" style="width: 200px;height: auto;" />
                     </div>

                     <div class="form-group col-md-9">
                        <input type="file" onchange="showPreview(event,'home_merchant_image_preview','612','516')" accept="image/*" class="form-control">
                        <input type="hidden" id="home_merchant_image" class="form-control" name="home_merchant_image" value="{{ old('home_merchant_image') ? old('home_merchant_image') : '' }}"  readonly />
                        @if($errors->has('home_merchant_image'))
                        <span class="text-danger">
                        {{ $errors->first('home_merchant_image') }}
                        </span>
                        @endif
                     </div>

                        <div class="form-group col-md-9">
                           <label for="home_client_section">Home Client Section</label>
                           <textarea class="form-control" name="home_client_section" id="home_client_section" rows="5">{{ old('home_client_section') ? old('home_client_section') : $sectionpageheadings->home_client_section }}</textarea>
                           @if($errors->has('home_client_section'))
                           <span class="text-danger">
                              {{ $errors->first('home_client_section') }}
                           </span>
                           @endif
                        </div>

                        <div class="form-group col-md-9">
                           <label for="plan_section_title">Section Title Plan Page</label>
                           <input class="form-control" name="plan_section_title"  id="plan_section_title" value="{{ old('plan_section_title') ? old('plan_section_title') : $sectionpageheadings->plan_section_title }}" />
                           @if($errors->has('plan_section_title'))
                           <span class="text-danger">
                              {{ $errors->first('plan_section_title') }}
                           </span>
                           @endif
                        </div>

                        <div class="form-group col-md-9">
                           <label for="plan_section_description">Section Description Plan Page</label>
                           <textarea class="form-control" name="plan_section_description" id="plan_section_description" rows="5">{{ old('plan_section_description') ? old('plan_section_description') : $sectionpageheadings->plan_section_description }}</textarea>
                           @if($errors->has('plan_section_description'))
                           <span class="text-danger">
                              {{ $errors->first('plan_section_description') }}
                           </span>
                           @endif
                        </div>


                        <div class="form-group col-md-9">
                           <label for="help_center_page">Help Center Page</label>
                           <textarea class="form-control" name="help_center_page" id="help_center_page" rows="5">{{ old('help_center_page') ? old('help_center_page') : $sectionpageheadings->help_center_page }}</textarea>
                           @if($errors->has('help_center_page'))
                           <span class="text-danger">
                              {{ $errors->first('help_center_page') }}
                           </span>
                           @endif
                        </div>

                        <div class="form-group col-md-9">
                           <label for="contactus_page">Contact Us Page</label>
                           <textarea class="form-control" name="contactus_page" id="contactus_page" rows="5">{{ old('contactus_page') ? old('contactus_page') : $sectionpageheadings->contactus_page }}</textarea>
                           @if($errors->has('contactus_page'))
                           <span class="text-danger">
                              {{ $errors->first('contactus_page') }}
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="card-footer">
                     <input type="submit" class="btn btn-primary" value="Update">
                     <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection