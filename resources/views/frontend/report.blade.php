@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="page-tittle">Report Violation</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Report Violation</li>
            </ol>
        </nav>
    </div>
</section>
<section class="report-violation custom-margin">
    <div class="container">
        <div class="heading">
            <h2 class="title text-center">Report Violation</h2>
        </div>
        <div class="center-custom-width">
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse ullamco </p>
        </div>
        <div class="report-form-wrapper mt-5">

        	<div class="alert alert-success alert-dismissible show_success_message" role="alert" style="display: none"></div>
            <div class="alert alert-danger alert-dismissible show_error_message" role="alert" style="display: none"></div>

            <form action="{{ route('frontend.report_submit') }}" method="post" autocomplete="off" id="report_form">
            	@csrf()
                <div class="row gy-4">
                    <div class="col-lg-6 col-md-6">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : '' }}" />
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="email" class="form-label">Email*</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ? old('email') : '' }}" />
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="phone" class="form-label">Phone*</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') ? old('phone') : '' }}" />
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <label for="violation_type" class="form-label">Violation Type*</label>
                        <select class="form-select" id="violation_type" name="violation_type">
                            <option value=""> Select Violation Type </option>
                            <option {{ (old('violation_type') ==  'Spam, malware, and phishing') ? 'selected' : '' }} value="Spam, malware, and phishing">Spam, malware, and phishing</option>
                            <option {{ (old('violation_type') ==  'Violence') ? 'selected' : '' }} value="Violence">Violence</option>
                            <option {{ (old('violation_type') ==  'Hate speech') ? 'selected' : '' }} value="Hate speech">Hate speech</option>
                            <option {{ (old('violation_type') ==  'Terrorist content') ? 'selected' : '' }} value="Terrorist content">Terrorist content</option>
                            <option {{ (old('violation_type') ==  'Harassment, bullying, and threats') ? 'selected' : '' }} value="Harassment, bullying, and threats">Harassment, bullying, and threats</option>
                            <option {{ (old('violation_type') ==  'Sexually explicit material') ? 'selected' : '' }} value="Sexually explicit material">Sexually explicit material</option>
                            <option {{ (old('violation_type') ==  'Child exploitation') ? 'selected' : '' }} value="Child exploitation">Child exploitation</option>
                            <option {{ (old('violation_type') ==  'Impersonation') ? 'selected' : '' }} value="Impersonation">Impersonation</option>
                            <option {{ (old('violation_type') ==  'Personal and confidential information') ? 'selected' : '' }} value="Personal and confidential information">Personal and confidential information</option>
                            <option {{ (old('violation_type') ==  'Illegal activities') ? 'selected' : '' }} value="Illegal activities">Illegal activities</option>
                            <option {{ (old('violation_type') ==  'Public streaming') ? 'selected' : '' }} value="Public streaming">Public streaming</option>
                            <option {{ (old('violation_type') ==  'Copyright infringement') ? 'selected' : '' }} value="Copyright infringement">Copyright infringement</option>
                            <option {{ (old('violation_type') ==  'Content use and submission') ? 'selected' : '' }} value="Content use and submission">Content use and submission</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="urlofviolation" class="form-label">URL of Violation</label>
                        <input type="text" class="form-control" id="urlofviolation" name="urlofviolation" value="{{ old('urlofviolation') ? old('urlofviolation') : ''}}">
                        
                    </div>
                    <div class="col-lg-12">
                        <label for="violation_details" class="form-label">Violation Details</label>
                        <textarea class="form-control" rows="5" id="violation_details" name="violation_details">{{ old('violation_details') ? old('violation_details') : '' }}</textarea>
                    </div>
                </div>
                <div class="custom-buttons mt-5">
                    <button type="submit" class="btn_report_violation">Report Violation</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection