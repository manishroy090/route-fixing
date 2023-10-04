@extends('backend.layouts.master')

@section('title')
	{{ env('APP_NAME') }} | Profile Settings
@endsection

@section('content')
<section class="content">
	<div class="card my-2">
		@include('flashMessage.message')
		<form method="post" name="logo_form" action="{{ route('backend.profile_update',$user->id) }}">
			@csrf
			@method('put')
			<div class="card-header">
				Profile Settings
			</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="form-group">
						<div class="form-group">
							<label for="email">Username Or Email</label>
							<input type="text" class="form-control" id="email" name="email"
								value="{{ old('email')?old('email'):$user->email }}" required>
							@if($errors->has('email'))
							<span class="text-danger">
								{{ $errors->first('email') }}
							</span>
							@endif
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password"
								placeholder="type only if you need to change password.">
							@if($errors->has('password'))
							<span class="text-danger">
								{{ $errors->first('password') }}
							</span>
							@endif
						</div>
						<div class="form-group">
							<label for="password_confirmation ">Confirm Password</label>
							<input type="password" class="form-control" id="password_confirmation"
								name="password_confirmation">
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" class="btn btn-primary" value="Update">
			</div>
		</form>
	</div>
</section>
@stop