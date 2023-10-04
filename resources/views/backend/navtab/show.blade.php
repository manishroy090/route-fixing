<div class="row">
	<div class="col-md-12">		
		<table class="table table-bordered">
			<tr>
				<th>S.N</th>
				<th>Picture</th>
				<th>Title</th>
				<th>Sub-title</th>
				<th>Order</th>
				<th>Action</th>
			</tr>
			<!-- {{$count = 1}} -->
			@foreach($home_data as $value)
			<tr>
				<td scope="col">{{$count++}}</th>
					<td scope="col"><img src="{{asset(Storage::url($value->photo))}}" alt="pic.jpeg" class="img-thumbnail" id="homeimage" height="50px" width="50px"></td>
					<td scope="col">{!!$value->title!!}</td>
					<td scope="col">{!!$value->subtitle!!}</td>
					<td scope="col">{{$value->order}}</td>
					<td scope="col">
						<form class="form-inline" action="" method="post">
							{{csrf_field()}}
							{{-- {{method_field('DELETE')}} --}}
							<a class="btn btn-warning mx-1" href="{{url('edithome/'.$value->id.'/edit')}}">Edit</a>
							{{-- <button onclick='return confirm("Are you sure?")' class="form-control btn btn-danger" type="submit" style="border: none;">
								Delete
							</button> --}}
						</form>
					</td>
				</tr>
				@endforeach
			</table>			
		</div>
	</div>