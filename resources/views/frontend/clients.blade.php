@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="page-tittle">Our valuable clients</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clients</li>
            </ol>
        </nav>
    </div>
</section>
<section class=" custom-margin">
    <div class="container">
        <div class="heading">
            <h2 class="title text-center">Our valuable clients</h2>
        </div>
        <div class="center-custom-width">
            <p class="text-center">
                {{ getSectionHeadings('home_client_section') }}
            </p>
        </div>
        <div class="row gy-4 mt-5">
        	@if($clients->isNotEmpty())
	        	@foreach($clients as $client)
	            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
	                <div class="client-card">
	                    <figure>
	                        <img src="{{ ($client->association_image != '' && file_exists(public_path('images/associations/thumb/'.$client->association_image))) ? asset('images/associations/thumb/'.$client->association_image) : getFallBackImage(156,84,'default') }}" alt="{{ $client->association_title }}" >
	                    </figure>
	                </div>
	            </div>
	            @endforeach

	            @if($clients->hasPages())
	            <div class="col-lg-12">
            		{{ $clients->links() }}
            	</div>
            	@endif

            @else
            	<div class="col-lg-12">
            		<p class="text-center">No client/s found</p>
            	</div>
            @endif
        </div>
    </div>
</section>
@endsection