@extends('backend.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | User Edit
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @include('flashMessage.message')
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{ route('backend.user_update', $user->id) }}" method="post" autocomplete="off">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name')?old('name'):$user->name }}" required>
                                @if($errors->has('name'))
                                <span class="text-danger">
                                    {{ $errors->first('name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{ old('email')?old('email'):$user->email }}" required>
                                @if($errors->has('email'))
                                <span class="text-danger">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <label for="user_role">Role</label>
                                </div>
                                <select class="custom-select" id="user_role" name="user_role">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->name }}"
                                        {{ (in_array($item->name, $user_role_array))?'selected':'' }}>
                                        {{ ucfirst($item->name) }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('user_role'))
                                <span class="text-danger">
                                    {{ $errors->first('user_role') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">
                                    Password
                                </label>
                                <input type="password" id="password" class="form-control" name="password"
                                    value="{{ old('password')?old('password'):'' }}">
                                <small class="text-red">Type password only if you want to change it!</small>
                                @if($errors->has('password'))
                                <span class="text-danger">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                    name="password_confirmation"
                                    value="{{ old('password_confirmation')?old('password_confirmation'):'' }}">
                                @if($errors->has('password_confirmation'))
                                <span class="text-danger">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                                <a href="{{ route('backend.user_index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </form>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
