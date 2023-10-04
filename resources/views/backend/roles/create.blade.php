@extends('backend.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | Merchant Add
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
        <form action="{{ route('backend.merchants.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Add Merchant</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name')?old('name'):'' }}">
                                @if($errors->has('name'))
                                <span class="text-danger">
                                    {{ $errors->first('name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email <small>(Email will be used for login purpose)</small></label>
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{ old('email')?old('email') : '' }}">
                                @if($errors->has('email'))
                                <span class="text-danger">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Create Role">
                                <a href="{{ route('roles.list') }}" class="btn btn-danger">Cancel</a>
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