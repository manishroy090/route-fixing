@extends('backend.layouts.master')

@section('title')
{{ env('APP_NAME') }} | Blogs
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="shadow p-3 mb-5 bg-white rounded mt-4  border border-secondary">
        <div class="mt-3">
            <caption class="fw-semibold">Menus Category </caption>
            <div class="float-right  text-white">
                <a href="{{route('backend.rooms_create')}}">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-plus"></i>
                        Add Menus Category
                    </button>
                </a>
            </div>
        </div>
        <div class=" table-responsive{-sm|-md|-lg|-xl} ">
            <table class="table caption-top  table-striped table-hover border  border-secondary mt-5 mb-4 table-sm">
                <thead class="border border-secondary">
                    <tr>
                        <th class="border border-secondary" scope="col">S.N</th>
                        <th class="border border-secondary" scope="col">Category</th>
                        <th class="border border-secondary" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menuCategories as$key=> $category)
                    <tr>
                        <td class="border border-secondary">{{$key+1}}</td>
                        <td class="border border-secondary">{{$category->menu_category}}</td>
                        <td class="border border-secondary">
                            <form class="form-inline" method="post" action="{{route('backend.menucategories_delete',$category->id)}}">
                                @csrf
                                @method('delete')
                                <a href="{{route('backend.menucategories_edit',$category->id)}}" class="btn btn-secondary mr-2"><i class="fa fa-edit"> </i></a>
                                <button onclick="return confirm('Are you sure to delete this product?')" type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>


                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-center">
                {{ $menuCategories->links() }}
            </ul>
        </nav>

    </div>
</section>
@endsection