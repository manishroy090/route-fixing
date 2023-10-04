<form action="{{url('storehome')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-5">
			<div class="form-group ">
				<label for="title">Title </label><br>
				<textarea class="form-control" rows="5" id="title" name="title">{!!(old('title'))?old('title'):(empty($exists->title)?'':$exists->title)!!}</textarea>
				<span class=" form-control-feedback"></span>
				@if ($errors->has('title'))
				<span class="text-danger">
					<strong>{{ $errors->first('title') }}</strong>
				</span>
				@endif
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group ">
				<label for="subtitle">Subtitle </label><br>
				<textarea class="form-control" rows="5" id="subtitle" name="subtitle">{!! (old('subtitle'))?old('subtitle'):(empty($exists->subtitle)?'':$exists->subtitle) !!}</textarea>
				<span class=" form-control-feedback"></span>
				@if ($errors->has('subtitle'))
				<span class="text-danger">
					<strong>{{ $errors->first('subtitle') }}</strong>
				</span>
				@endif
			</div>
		</div>	
		<div class="col-md-2">
			<img src="{{asset($url)}}" alt="pic.jpeg" class="img-thumbnail" id="homeimage" height="200px" width="200px">	
			<div class="form-group ">
				<input type="file" name="homeimage" onchange="loadFile(event)">
				@if ($errors->has('homeimage'))
				<span class="text-danger">
					<strong>{{ $errors->first('homeimage') }}</strong>
				</span>
				@endif

				<button type="submit" class="btn btn-primary">Save</button>
			</div>			
		</div>
	</div>								
</form>