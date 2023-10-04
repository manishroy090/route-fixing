@extends('frontend.layouts.master')
@section('content')
@if(isset($career)!=null)
<section class="breadcrumbs-section">
    <div class="breadcrumbs-section-wrapper">
        <div class="container">
            <div class="page-heading"> {{ $career->career_title }}</div>
        </div>
    </div>
</section>
<section class="vaccancy-details-overview custom-margin">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="top-over-view">
                    <h1 class="title">{{ $career->career_title }}</h1>
                    <ul class="vaccancy-overview">
                        <li><span>Opening:</span>{{ $career->career_opening_number }}</li>
                        <li><span>Location:</span>{{ $career->career_location }}</li>
                         @if($career->career_type==1)
                                <li><span>type:</span>Full Time</li>
                            @elseif($career->career_type==2)
                                <li><span>type:</span>Casual</li>
                            @else
                                <li><span>type:</span>Part Time</li>
                            @endif
                            @if($career->career_end_date != '' || $career->career_end_date != NULL)
                            <li><span>Apply Before:</span>{{ \Carbon\Carbon::parse($career->career_end_date)->format('F d, Y') }}</li>
                            @endif
                    </ul>
                </div>
                <div class="dynamic-content">
                    {!! $career->career_description !!}
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="carrer-apply-form form-frame">
                    <h2 class="section-heading">Apply Now</h2>
                    <form class="apply-form" action="{{ route('frontend.career-apply') }}" method="POST" autocomplete="off" id="career_form">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" placeholder="Name" name="name" id="name">
                            </div>

                            <input type="hidden" value="{{ $career->career_title }}" name="career_title">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input type="text" placeholder="Phone" name="phone" id="phone">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="text" placeholder="Email" name="email" id="email">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea cols="30" rows="6" placeholder="Message" name="message" id="message"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="input-file-label" for="cover_letter">Upload Cover Letter (Max File Size: 5MB)</label>
                                <div class="input-file">
                                    <label for="cover_letter" class="custom-upload"><i class="fas fa-upload"></i></label>
                                    <input type="file" name="cover_letter" id="cover_letter">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="input-file-label" for="cv">Upload Your CV (Max File Size: 5MB)</label>
                                <div class="input-file">
                                    <label for="cv" class="custom-upload"><i class="fas fa-upload"></i></label>
                                    <input type="file" name="cv" id="cv">
                                </div>
                            </div>
                        </div>
                        <div class="custom-buttons">
                            <button type="submit" class="career_btn" id="career_apply">Apply Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
@section('script')
<script>
    $('#career_form').on('submit', function(e) {
        e.preventDefault();
        var baseUrl = $("body").attr('data-siteurl');
        var formaction = $('#career_form').attr('action');
        var formmethod = $('#career_form').attr('method');
        var formdata = new FormData(this);
        $.ajax({
            url: formaction
            , method: formmethod
            , data: formdata
            , contentType: false
            , cache: false
            , processData: false
            , beforeSend: function() {
                $('#career_apply').html("<i class='fas fa-spinner fa-pulse fa-1x'></i> Apply Now").prop("disabled", false);
            }
            , success: function(response) {
                if (response) {
                    if (response.success) {
                        showMessage(response.success, "success");
                    } else {

                        showMessage(response.error, "error");
                    }
                }
                $('#career_apply').html("Apply Now ").prop("disabled", false);
                $('#career_form')[0].reset();
                $('.error').remove();
            }
            , error: function(response) {
                if (typeof response.responseJSON.errors !== '' && response.responseJSON.errors) {
                    $(".error").remove();
                    $.each(response.responseJSON.errors, function(key, value) {
                        var dy_class = key + "_error";
                        if ($('.' + dy_class).length == 0) {
                            $("#" + key).after("<span class='" + dy_class + " error-message'>" + value + "</span>");
                        }
                    });
                }
                $('#career_apply').html("Apply Now ").prop("disabled", false);
            }
        }).fail(function(response) {
            $('#career_apply').html("Apply Now").prop("disabled", false);
        });
    });

    function showMessage(msg_content, msg_type) {
        if (msg_type == 'error') {
            toastr.error(msg_content, 'Error', {
                closeButton: true
                , positionClass: "toast-top-right"
                , progressBar: true
                , preventDuplicates: 1
            });
        }
        if (msg_type == 'success') {
            toastr.success(msg_content, 'Success', {
                closeButton: true
                , positionClass: "toast-top-right"
                , progressBar: true
            , });
        }
    }

</script>
@endsection
