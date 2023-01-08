@extends('admin.layouts.master')

@section('title')
Role
@endsection

@section('content')
    <div class="container">

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form action="{{ route('role.update', [$role->id]) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card">
                        <div class="card-header">Update Role User</div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                    @enderror
                                </span>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        value="{{ $role->description }}">

                                    @error('description')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                        @enderror
                                    </span>

                                    <div>

                                        <div class="form-group">
                                            <button class="btn btn-outline-primary mt-3">Update</button>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
