@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col s12 m4 hide-on-small-only">

            <user-private-list></user-private-list>

        </div>
        <div class="col s12 m8">
            
            <private-grup-box>
            
            </private-grup-box>

        </div>
    </div>
</div>
@endsection
