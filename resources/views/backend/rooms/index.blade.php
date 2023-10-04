@extends('backend.layouts.master')

@section('title')
{{ env('APP_NAME') }} | Blogs
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="card mt-5 border border border-secondary">
        <div class="card-body margin">
            <div class="mt-2 pl-5  pr-10">
                <span class="font-weight-bold text-md">Rooms</span>
                <div class="float-right ">
                    <a href="{{route('backend.rooms_create')}}" class="btn btn-primary btn-sm font-weight-bold      ">Add Rooms</a>
                </div>
            </div>
            <div class=" table-responsive{-sm|-md|-lg|-xl} ">

                <table class="table caption-top  table-striped table-hover border  border-secondary mt-3  mb-4 table-sm">

                    <thead class="border border-secondary">
                        <tr>
                            <th class="border border-secondary text-center" scope="col">S.N</th>
                            <th class="border border-secondary text-center" scope="col">Room Category</th>
                            <th class="border border-secondary text-center" scope="col">Image </th>
                            <th class="border border-secondary text-right" scope="col">No of Rooms</th>
                            <th class="border border-secondary text-center" scope="col"> Room Capacity</th>
                            <th class="border border-secondary text-right" scope="col">Price Per Room</th>
                            <th class="border border-secondary pl-5" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalroom=0;
                        @endphp
                        @forelse ($roomlists as $key=> $roomlist )
                        @php
                        $totalroom+=$roomlist->no_room;
                        @endphp
                        <tr class="border border-secondary ">

                            <td class="border border-secondary text-center">{{$key+1}}</td>
                            <td class="border border-secondary text-center">{{$roomlist->room_category}}</td>
                            <td class="border border-secondary text-center">
                                <img src="{{asset('images/rooms/'.$roomlist->room_images)}}" alt="" width="100px" height="100px">
                            </td>
                            <td class="border border-secondary text-right">{{$roomlist->no_room}}</td>
                            <td class="border border-secondary text-center">{{$roomlist->room_capacity}}</td>
                            <td class="border border-secondary text-right">{{$roomlist->room_price}}</td>
                            <td class="border border-secondary">
                                <form class="form-inline ml-4 mt-4 " method="post" action="{{route('backend.delete',$roomlist->id)}}">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('backend.edit',$roomlist->id)}}" class="btn btn-secondary mr-2"><i class="fa fa-edit"> </i></a>
                                    <button onclick="return confirm('Are you sure to delete this product?')" type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="align-middle">
                            <td colspan="7" class="text-center p-5">
                                No data found!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center">
                    {{ $roomlists->links() }}
                </ul>
            </nav>
        </div>
</section>
@endsection