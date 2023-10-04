@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Banner
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="shadow p-2 mb-5 bg-white rounded mt-4 border  border-secondary ">
        <div class="mt-2">
            <caption class="fw-semibold"> Banners </caption>
            <div class="float-right  text-white">
                <a href="{{route('backend.banner_create')}}" class="btn btn-primary btn-sm">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-plus"></i>
                        Add Banner
                    </button>
                </a>
            </div>

        </div>
        <div class=" table-responsive{-sm|-md|-lg|-xl} ">
            <table class="table caption-top  table-striped table-hover border  border-secondary mt-5 mb-4 table-sm">
                <thead>
                    <tr>
                        <th class="border border-secondary" scope="col">S.N</th>
                        <th class="border border-secondary" scope="col">Image</th>
                        <th class="border border-secondary" scope="col">Order</th>
                        <th class="border border-secondary" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($banners as $key=> $banner)
                    <tr class="border border-secondary">
                        <td class="border border-secondary">{{$key+1}}</td>
                        <td class="border border-secondary">
                            <img src="{{asset('images/banners/'.$banner->banner_image)}}" alt="" width="100px" height="100px">
                        </td>
                        <td class="border border-secondary">
                            {{$banner->banner_order}}
                        </td>
                        <td class="border border-secondary">

                            <form class="form-inline" method="post" action="{{route('backend.banner_delete',$banner->id)}}">
                                @csrf
                                @method('delete')
                                <a href="{{route('backend.banner_edit',$banner->id)}}" class="btn btn-secondary m-2"><i class="fa fa-edit"> </i></a>
                                <button onclick="return confirm('Are you sure to delete this banner?')" type="submit" class="btn btn-danger">
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
        <div class="card-footer">

        </div>
    </div>
</section>
@endsection