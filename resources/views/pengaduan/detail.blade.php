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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="card">
                    <div class="card-header">
                        <b>Detail Pengaduan</b>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            Nama Pelapor : <b>{{ $pengaduan->user->name }}</b><br>
                            NIK : <b>{{ $pengaduan->user->nik }}</b><br>
                            Tanggal Pengaduan : <b>{{ $pengaduan->tgl_pengaduan }}</b><br>
                            Status : <b>
                                @if ($pengaduan->status == '0')
                                    <span class="px-3 bg-gradient-danger text-white">
                                        {{ $pengaduan->status }}
                                    </span>
                                @elseif ($pengaduan->status == 'Proses')
                                    <span class="px-3 bg-gradient-warning text-white">
                                        {{ $pengaduan->status }}
                                    </span>
                                @else
                                    <span class="px-3 bg-gradient-success text-white">
                                        {{ $pengaduan->status }}
                                    </span>
                                @endif
                            </b><br>
                            Isi Pengaduan : <b>{{ $pengaduan->isi_laporan }}</b><br>
                            Foto : <br><img src="{{ asset('image') }}/{{ $pengaduan->image }}" width="50%"
                                alt="">
                        </div>

                        <div class="form-group">
                            Tanggapan : @if (empty($pengaduan->tanggapan->tanggapan))
                                <b>belum ada tanggapan</b>
                            @else
                                <b>{{ $pengaduan->tanggapan->tanggapan }}</b>
                            @endif
                        </div>

                        @if (Auth::user()->role != 0)
                            @if (empty($pengaduan->tanggapan->tanggapan))
                                <div class="form-group">
                                    <a href="{{ route('tanggapan.show', [$pengaduan->id]) }}">
                                        <button class="btn btn-primary">Beri Tanggapan</button>
                                    </a>
                                </div>
                            @else
                                <div class="form-group">
                                    <a href="{{ route('tanggapan.edit', [$pengaduan->tanggapan->id]) }}">
                                        <button class="btn btn-success">Update Tanggapan</button>
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
