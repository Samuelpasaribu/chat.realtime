@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 35px">
    <div class="row ">
        
        <div class="col s12 m8 push-m2">
            <a  href="{{ route('grup.create') }}" class="waves-effect waves-light btn-small center-align"><i class="material-icons left">create</i>Tambah Grup</a>
            <h5 class="center-align">Daftar Grup</h5>
            <hr>

            <div class="collection">
                @foreach($GrupUser as $Grup)
                    <a href="{{ route('grup-chat', $Grup->grub_id) }}" class="collection-item">{{ $Grup->grup->nama_grup }}</a>
                @endforeach
            </div>

        </div>
</div>
@endsection
