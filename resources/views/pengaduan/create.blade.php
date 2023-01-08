@extends('admin.layouts.master')

@section('title')
Pengaduan
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
                <h6 class="m-0 font-weight-bold text-primary">Create Pengaduan</h6>
            </div>

            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="tgl">Tanggal Pengaduan</label>
                        <input id="tgl" type="date" name="tgl_pengaduan" value="{{ old('tgl_pengaduan') }}"
                            class="form-control @error('tgl_pengaduan') is-invalid @enderror">
                        @error('tgl_pengaduan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="isi">Deskripsi</label>
                        <textarea name="isi_laporan" id="isi" value="{{ old('isi_laporan') }}"
                            class="form-control @error('isi_laporan') is-invalid @enderror" cols="30" rows="10"></textarea>

                        @error('isi_laporan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" value="{{ old('image') }}"
                            class="form-control  @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-outline-primary" type="submit">Submit</button>

                        <button class="btn btn-outline-danger" type="reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
