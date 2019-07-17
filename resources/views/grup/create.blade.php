@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 35px">
    <div class="row ">
        
        <div class="col s12 m8 push-m2">
            <!-- <a href="{{ route('grup.create') }}" class="waves-effect waves-light btn-small center-align"><i class="material-icons left">create</i>button</a> -->
            <h5 class="center-align">Tambah Grup</h5>
            <hr>
            <form action="{{ route('grup.store') }}" method="post">
                
                {{ csrf_field() }}

                <div class="form-group">
                    <textarea class="materialize-textarea" placeholder="Tulis Nama Grup" name="nama_grup" id=""  rows="4"></textarea>
                    <textarea class="materialize-textarea" placeholder="Deskripsi Grup" name="deskripsi" id=""  rows="4"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>

        </div>
</div>
@endsection
