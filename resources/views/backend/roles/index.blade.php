@extends('backend.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | Roles
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="card">
        <div class="card-header">
            User Roles
            {{-- <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Create Role</a> --}}
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ($value->name) }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d F, Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            No data found!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $roles->links() }}
        </div>
    </div>
</section>
@endsection