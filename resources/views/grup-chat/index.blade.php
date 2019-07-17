@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col s12 m4 hide-on-small-only">

            <grup-list></grup-list>

        </div>
        <div class="col s12 m8">

            <div class="card">
                <div class="card-content" style="padding-left: 15px; padding-top: 15px; padding-bottom: 1px;">
                    <div class="row">
                        <div class="col s7 m9">
                            <p style="font-weight: bold; color: #0176be">{{$Grup->nama_grup}} </p>
                        </div>
                        <div class="col s5 m3">
                            <a  href="{{ route('undang',$Grup->id) }}" class="waves-effect waves-light btn-small center-align">Undang Teman</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <chat-grup-box>
            
            </chat-grup-box>

        </div>
    </div>
</div>
@endsection
