@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">

                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 style="text-align:center; margin-top:35px">Selamat Datang <br> Di Aplikasi PushChat</h3>
                </div>
            </div>
    </div>
</div>
@endsection
