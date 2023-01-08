@extends('admin.layouts.master')

@section('title')
Pengaduan
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Pengaduan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Image</th>
                                            <th>Status</th>
                                            @if (Auth::user()->role == 0)
                                                <th>Detail</th>
                                            @else
                                                <th class="text-center" width="130px">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Image</th>
                                            <th>Status</th>
                                            @if (Auth::user()->role == 0)
                                                <th>Detail</th>
                                            @else
                                                <th class="text-center" width="130px">Action</th>
                                            @endif
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($pengaduans as $pengaduan)
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                                <td>{{ Str::limit($pengaduan->isi_laporan, 50) }}</td>
                                                <td><img src="{{ asset('image') }}/{{ $pengaduan->image }}" alt="foto"
                                                        width="100"></td>
                                                <td>
                                                    @if ($pengaduan->status == '0')
                                                        <span class="px-3 bg-gradient-danger text-white">
                                                            {{ $pengaduan->status }}
                                                        </span>
                                                    @elseif ($pengaduan->status == 'proses')
                                                        <span class="px-3 bg-gradient-warning text-white">
                                                            {{ $pengaduan->status }}
                                                        </span>
                                                    @else
                                                        <span class="px-3 bg-gradient-success text-white">
                                                            {{ $pengaduan->status }}
                                                        </span>
                                                    @endif
                                                </td>

                                                @if (Auth::user()->role == 0)
                                                    <td>
                                                        <a href="{{ route('pengaduan.show', [$pengaduan->id]) }}">
                                                            <button class="btn btn-warning">Detail</button>
                                                        </a>
                                                    </td>
                                                @else

                                                    <td>
                                                        <a href="{{ route('pengaduan.edit', [$pengaduan->id]) }}"><button
                                                                class="btn btn-white"><i
                                                                    class="fas fa-edit text-warning"></i>
                                                            </button></a>

                                                        <a href="{{ route('pengaduan.show', [$pengaduan->id]) }}"><button
                                                                class="btn btn-white"><i
                                                                    class="fas fa-eye text-success"></i>
                                                            </button></a>


                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-white" data-toggle="modal"
                                                            data-target="#exampleModal{{ $pengaduan->id }}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal{{ $pengaduan->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form
                                                                    action="{{ route('pengaduan.destroy', [$pengaduan->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Modal
                                                                                title</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">

                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah Anda Yakin ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>

                                                                            <button type="submit"
                                                                                class="btn btn-outline-danger">Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
