@extends('admin.layouts.master')

@section('title')
Tanggapan
@endsection

@section('content')

<div class="container">
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <form action="{{ route('tanggapan.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="card-header"><b>Beri Tanggapan</b></div>

                <div class="card-body">
                    <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <label>Tanggal Tanggapan</label>
                        <input type="date" name="tgl_tanggapan" class="form_control @error('tgl_tanggapan') is-invalid @enderror">
                        @error('tgl_tanggapan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggapan</label>
                        <textarea name="tanggapan" class="form-control @error('tanggapan') is-invalid @enderror" id="" cols="30" rows="6"></textarea>
                        @error('tanggapan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">Pilih Status</option>
                            <option value="0">Pending</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
