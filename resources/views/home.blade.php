@extends('admin.layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ __('Dashboard') }}</b></div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    {{ Auth::user()->name }}
                </div> --}}
                <div class="card-body"><h4><b>Selamat Datang di Aplikasi Pengaduan Masyarakat.  {{ Auth::user()->name }}</b></h4></div>

            </div>
        </div>
    </div>
</div>
@endsection
