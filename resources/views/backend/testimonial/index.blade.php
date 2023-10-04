@extends('backend.layouts.master')

@section('title')
{{ env('APP_NAME') }} | Blogs
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="shadow p-3 mb-5 bg-white rounded mt-4  border border-secondary">
        <div class="mt-3">
            <caption class="fw-semibold">Testimonial</caption>
            <div class="float-right  text-white">
                <a href="{{route('backend.testimonial_create')}}">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-plus"></i>
                        Add Testimonial
                    </button>
                </a>
            </div>
        </div>
        <div class=" table-responsive{-sm|-md|-lg|-xl} ">
            <table class="table caption-top  table-striped table-hover border  border-secondary mt-5 mb-4 table-sm">
                <thead class="border border-secondary">
                    <tr>
                        <th class="border border-secondary text-center" scope="col">S.N</th>
                        <th class="border border-secondary text-center" scope="col">Author</th>
                        <th class="border border-secondary text-center" scope="col">Description</th>
                        <th class="border border-secondary pl-5 text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonialList as $testimonial)



                    <tr>
                        <td class="border border-secondary align-middle text-center">{{$key+1}}</td>
                        <td class="border border-secondary align-middle text-center">{{$testimonial->testimonial_author}}</td>
                        <td class="border border-secondary text-wrap w-50 align-middle">{{$testimonial->testimonial_description}}</td>
                        <td class="border border-secondary align-middle text-center">
                            <form class="form-inline d-flex flex-nowrap justify-content-center" method="post" action="{{route('backend.testimonial_delete',$testimonial->id)}}">
                                @csrf
                                @method('delete')
                                <a href="{{route('backend.testimonial_edit', $testimonial->id)}}" class="btn btn-secondary mr-2"><i class="fa fa-edit"> </i></a>
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

        <div class="card-footer">
            <div class="page-pagination">
                pageination
            </div>
        </div>

    </div>
</section>
@endsection