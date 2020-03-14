@extends('layouts.registrar')

@section('body')

<br>
<br>
<div class="card" >
    <div class="card-header"><div class="title"><h5>EDITAR PUBLICAÇÃO - {{ Auth::user () ->name }}</h5></div> </div>
<br>



    <form action="{{route('admin.publica.update', ['store' => $store->id])}}" method="POST" >
        @csrf

        <input type="hidden" name="user" value="{{ Auth::user () ->id }}">

        <div class="form-group">
            <label for="exampleInputEmail1">Titulo:</label>
            <input type="text" name="titulo" value="{{$store->titulo}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Assunto:</label>
            <input type="text" name="assunto" value="{{$store->assunto}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Texto:</label>
            <textarea type="text" class="form-control" name="texto"  rows="5"> {{$store->texto}}</textarea>
          </div>

          <div class="form-group">
            <label>Status de publicação</label>
            <select name="id_estado"  class="form-control">

            @foreach ($estado as $row1) <!-- só foi possivel porque foi enviado todos usuarios-->
            <option value="{{$row1->id}}">{{$row1->tipo , $store->texto}} </option>
           
            @endforeach
            </select>
        </div>

 
        <button type="submit" class="btn btn-info enviar_foto"> Enviar </button>
        <a href="{{route('admin.salva.destroy', ['store' => $store->id])}}" class="btn btn-danger">X</a>
    </form>
    

<br>
    </div>

@endsection