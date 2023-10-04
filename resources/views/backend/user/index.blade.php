@extends('backend.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | Users
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $value)
                        @php
                            $roles = $value->getRoleNames();
                            $all_roles = implode(",", [ucfirst($roles[0])]);
                        @endphp
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>
                             <figure>
                        <img style="max-width: 146px; max-height: 150px;" src="{{ ($value->avatar != '' && file_exists(public_path('images/user/thumb/'.$value->avatar))) ? asset('images/user/thumb/'.$value->avatar) : getFallBackImage(146,150,'user') }}" alt="{{ $value->name }}">
                     </figure>
                     <p>{{$value->name}}</p>
                        </td>
                        <td>{{$value->email}}</td>
                        <td>
                            <label class="badge badge-success">{{ $all_roles }}</label>
                        </td>
                        <td>{{$value->order}}</td>
                        <td>
                            <form class="form-inline" method="post"
                                action="{{ route('backend.user_destroy', $value->id) }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('backend.user_edit', $value->id) }}" class="btn btn-secondary m-2"><i
                                        class="fa fa-edit"> </i></a>
                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            No data found!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
</section>
@endsection