@extends('admin.layouts.master')

@section('title')
Permission
@endsection

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="card shadow mb-4 my-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Permission</h6>
            </div>

            <form action="{{ route('permission.update', [$permission->id]) }}" method="post">
                @csrf
                {{ method_field('PATCH') }}

                <div class="card-body">
                    <div class="form-group">
                        <h3>{{ $permission->role->name }}</h3>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Permission</th>
                                    <th>can-add</th>
                                    <th>can-edit</th>
                                    <th>can-delete</th>
                                    <th>can-view</th>
                                    <th>can-list</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Role</td>
                                    <td><input type="checkbox" name="name[role][can-add]"
                                            @if (isset($permission['name']['role']['can-add'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[role][can-edit]"
                                            @if (isset($permission['name']['role']['can-edit'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[role][can-delete]"
                                            @if (isset($permission['name']['role']['can-delete'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[role][can-view]"
                                            @if (isset($permission['name']['role']['can-view'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[role][can-list]"
                                            @if (isset($permission['name']['role']['can-list'])) checked @endif value="1"></td>
                                </tr>
                                <tr>
                                    <td>Permission</td>
                                    <td><input type="checkbox" name="name[permission][can-add]"
                                            @if (isset($permission['name']['permission']['can-add'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[permission][can-edit]"
                                            @if (isset($permission['name']['permission']['can-edit'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[permission][can-delete]"
                                            @if (isset($permission['name']['permission']['can-delete'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[permission][can-view]"
                                            @if (isset($permission['name']['permission']['can-view'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[permission][can-list]"
                                            @if (isset($permission['name']['permission']['can-list'])) checked @endif value="1"></td>
                                </tr>
                                <tr>
                                    <td>Pengaduan</td>
                                    <td><input type="checkbox" name="name[pengaduan][can-add]"
                                            @if (isset($permission['name']['pengaduan']['can-add'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[pengaduan][can-edit]"
                                            @if (isset($permission['name']['pengaduan']['can-edit'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[pengaduan][can-delete]"
                                            @if (isset($permission['name']['pengaduan']['can-delete'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[pengaduan][can-view]"
                                            @if (isset($permission['name']['pengaduan']['can-view'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[pengaduan][can-list]"
                                            @if (isset($permission['name']['pengaduan']['can-list'])) checked @endif value="1"></td>
                                </tr>
                                <tr>
                                    <td>Tanggapan</td>
                                    <td><input type="checkbox" name="name[tanggapan][can-add]"
                                            @if (isset($permission['name']['tanggapan']['can-add'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[tanggapan][can-edit]"
                                            @if (isset($permission['name']['tanggapan']['can-edit'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[tanggapan][can-delete]"
                                            @if (isset($permission['name']['tanggapan']['can-delete'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[tanggapan][can-view]"
                                            @if (isset($permission['name']['tanggapan']['can-view'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[tanggapan][can-list]"
                                            @if (isset($permission['name']['tanggapan']['can-list'])) checked @endif value="1"></td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td><input type="checkbox" name="name[user][can-add]"
                                            @if (isset($permission['name']['user']['can-add'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[user][can-edit]"
                                            @if (isset($permission['name']['user']['can-edit'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[user][can-delete]"
                                            @if (isset($permission['name']['user']['can-delete'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[user][can-view]"
                                            @if (isset($permission['name']['user']['can-view'])) checked @endif value="1"></td>
                                    <td><input type="checkbox" name="name[user][can-list]"
                                            @if (isset($permission['name']['user']['can-list'])) checked @endif value="1"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>


    </div>
@endsection
