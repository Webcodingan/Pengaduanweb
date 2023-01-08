@extends('admin.layouts.master')

@section('title')
Role
@endsection

@section('content')
    <div class="container mt-5">

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">Manage Role</div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description"
                                        class="form-control @error('description') is-invalid @enderror">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <div class="form-group">
                                            <button class="btn btn-outline-primary mt-3">Submit</button>
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
@endsection
