@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col s12 m4 hide-on-small-only">

            <user-private-list></user-private-list>

        </div>
        <div class="col s12 m8">
            <div class="card">
                <div class="card-content" style="padding-left: 15px; padding-top: 15px; padding-bottom: 1px;">
                    <div class="row">
                        <div class="col s7 m9">
                            <p style="font-weight: bold; color: #0176be">{{$User->name}} </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <private-grup-box>
            
            </private-grup-box>

        </div>
    </div>
</div>
@endsection
