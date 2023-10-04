@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }}|Services
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="shadow p-2 mb-5 bg-white rounded mt-4 border  border-secondary ">
        <div class="mt-2 pl-5  pr-10">
            <caption class="font-weight-bold text-xl">Services</caption>
            <div class="float-right pr-5">
                <a href="{{route('backend.service_create')}}" class="btn btn-primary btn-sm font-weight-bold">Add Services</a>
            </div>
        </div>
        <div class="table-responsive{-sm|-md|-lg|-xl}">
            <table class="table caption-top  table-striped table-hover border  border-secondary mt-3  mb-4 table-sm">
                <thead class="border border-secondary">
                    <tr>
                        <th class="border border-secondary text-center" scope="col" scope="col">S.N</th>
                        <th class="border border-secondary text-center" scope="col" scope="col">Cover Image</th>
                        {{-- <th scope="col">Icon</th> --}}
                        <th class="border border-secondary text-center" scope="col" scope="col">Icon</th>
                        <th class="border border-secondary text-center" scope="col" scope="col">Description</th>
                        <th class="border border-secondary text-center" scope="col" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $key=> $service)

                    <tr class="border border-secondary ">
                        <td class="border border-secondary text-center">{{$key+1}}</td>
                        <td class="border border-secondary text-center"> <img src="{{asset('images/services/'.$service->services_coverimage)}}" alt="" width="100px" height="100px"></td>
                        <td class="border border-secondary text-center"><img src="{{asset('images/services/'.$service->services_icon)}}" alt="" width="100px" height="100px"></td>
                        <td>{{$service->services_description}}</td>
                        <td class="border border-secondary">
                            <form class="form-inline" method="post" action="{{route('backend.Service_delete',$service->id)}}">
                                @csrf
                                @method('delete')
                                <a href="{{route('backend.Service_edit',$service->id)}}" class="btn btn-secondary m-2"><i class="fa fa-edit"> </i></a>
                                <button onclick="return confirm('Are you sure to delete this record?')" type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty

                    <tr class="align-middle">
                        <td colspan="5" class="text-center p-5">
                            No data found!
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer">
        </div>
    </div>
</section>
@endsection