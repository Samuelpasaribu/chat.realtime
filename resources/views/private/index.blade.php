@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 35px">
    <div class="row ">
        
        <div class="col s8 push-s2">
            <h5 class="center-align">Daftar User</h5>
            <hr>

            <div class="collection">
                @foreach($Users as $User)
                    <a href="{{ route('private-chat', $User->id) }}" class="collection-item">{{ $User->name }}</a>
                @endforeach
            </div>

        </div>
</div>
@endsection
