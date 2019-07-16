@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col s4">

            <user-private-list></user-private-list>

        </div>
        <div class="col s8">
            
            <private-grup-box>
            
            </private-grup-box>

        </div>
    </div>
</div>
@endsection
