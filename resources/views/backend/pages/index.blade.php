@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Banner
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    {{-- sa_change means study abroad change --}}
    <div class="card">
        <div class="card-header">
           Pages
           <div class="float-right mb-3">
                <a href="{{ route('pages.create') }}" class="btn btn-primary btn-sm">Add Page</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Order</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $index => $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        
                        <td>{{ $value->pages_title }}</td>
                        <td>
                            <img src="{{ (($value->pages_image != '') && file_exists(public_path('images/pages/'.$value->pages_image))) ? asset('images/pages/'.$value->pages_image) : asset('images/fallback-logo.png') }}" alt="pages Image"
                         class="rounded" id="pages_image" style="height: 200px;width: 200px;object-fit: contain;">
                      </td>
                        <td>{{ $value->pages_order }}</td>
                        <td>
                              
                            <form class="form-inline" method="post"
                            action="{{ route('pages.destroy', $value->id) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('pages.edit', $value->id) }}"
                                class="btn btn-secondary m-2"><i class="fa fa-edit"> </i></a>
                            <button onclick="return confirm('Are you sure to delete this page?')" type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{-- {{ $pages->links() }} --}}
        </div>
    </div>
</section>
@endsection
