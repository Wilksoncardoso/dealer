@extends('layouts.registrar')

@section('body')

<br>
<br>
<div class="card" >
    <div class="card-header"><div class="title"><h5>CADASTRAR NOVO USUARIO</h5></div> </div>
<br>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group col-md-12">
        <label  >Nome:</label>
        <input  type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
   </div>

    <div class="form-group col-md-12">
        <label for="email" >E-mail: </label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
   </div>

    <div class="form-group col-md-12">
        <label for="password" >Senha</label>
        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
    </div>

    <div class="form-group col-md-12">
        <label for="password-confirm" >Confirma Senha:</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        
    </div> 

    
        <div class="button_registrar">
            <button type="submit" class="btn btn-primary btn-lg">
                {{ __('Registrar') }}
            </button>
        
    </div>
    <br><br>
</form>
<br>
    </div>

@endsection