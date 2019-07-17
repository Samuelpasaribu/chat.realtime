@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 35px">
    <div class="row ">
        
        <div class="col s8 push-s2">
            <!-- <a href="{{ route('grup.create') }}" class="waves-effect waves-light btn-small center-align"><i class="material-icons left">create</i>button</a> -->
            <h5 class="center-align">Undang Teman Ke Grup</h5>
            <hr>
                @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            <form action="{{ route('grup-chat.store') }}" method="post">
                
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="hidden" class="materialize-textarea" placeholder="Tulis Email Teman Anda" name="id_grup" value="{{ $Grup->id }}" id="" />
                    <input type="email" class="materialize-textarea" placeholder="Tulis Email Teman Anda" name="email" id="" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>

        </div>
</div>
@endsection
