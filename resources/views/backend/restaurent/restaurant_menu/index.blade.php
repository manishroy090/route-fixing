@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Banner
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="shadow p-3 mb-5 bg-white rounded mt-4  border border-secondary">
        <caption class="fw-semibold">Menus Category </caption>
        <div class="float-right  text-white">
            <a href="{{route('backend.menues_create')}}">
                <button class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add Menu Category
                </button>
            </a>

        </div>
        <div class=" table-responsive{-sm|-md|-lg|-xl} ">
            <table class="table caption-top  table-striped table-hover border  border-secondary mt-5 mb-4">
                <thead>
                    <tr>
                        <th class="border border-secondary" scope="col">S.N</th>
                        <th class="border border-secondary" scope="col">Food Name</th>
                        <th class="border border-secondary" scope="col">Food Category</th>
                        <th class="border border-secondary" scope="col">Price</th>
                        <th class="border border-secondary" scope="col">Food Description</th>
                        <th class="border border-secondary" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($foodMenus as $key => $foodMenu )
                    <tr>
                        <td class="border border-secondary">{{$key+1}}</td>
                        <td class="border border-secondary">{{$foodMenu->food_name}}</td>
                        <td class="border border-secondary">{{$foodMenu->menu_category}}</td>
                        <td class="border border-secondary">{{$foodMenu->food_price}}</td>
                        <td class="border border-secondary">{{$foodMenu->food_description}}</td>
                        <td class="border border-secondary">
                            <form class="form-inline" method="post" action="{{route('backend.menues_delete',$foodMenu->id)}}">
                                @csrf
                                @method('delete')
                                <a href="{{route('backend.menues_edit',$foodMenu->id)}}" class="btn btn-secondary m-2"><i class="fa fa-edit"> </i></a>
                                <button onclick="return confirm('Are you sure to delete this banner?')" type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr class="align-middle">
                        <td colspan="6" class="text-center p-5">
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