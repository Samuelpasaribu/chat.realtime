@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col s4">

            <grup-list></grup-list>

        </div>
        <div class="col s8">

            <div class="card">
                <div class="card-content" style="padding-left: 15px; padding-top: 15px; padding-bottom: 1px;">
                    <div class="row">
                        <div class="col s9">
                            <p style="font-weight: bold; color: #0176be">{{$Grup->nama_grup}} </p>
                        </div>
                        <div class="col s3">
                            <a  href="" class="waves-effect waves-light btn-small center-align">Undang Teman</a>
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
