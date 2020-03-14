@extends('layouts.view')

@section('body')
<br><br><br><br>


@foreach ($store as $row)

<div class="card mb-3">
 
      
 
  <img src="{{asset('uploads/post/'. $row->image_post )}}" alt="Image" class="rounded-bottom" style="max-width:100%; object-fit:cover; width: 1110px; height: 300px;">

  <div class="card-body">
    <h3 class="card-title">Titulo:{{$row->titulo}}</h3>
    <h5 class="card-title">Assunto:{{$row->assunto}}</h5>
    <p class="card-text">{{$row->texto}}</p>
    <p class="card-text"><small class="text-muted">{{ date('d/m/Y', strtotime($row->created_at)) }}</small></p>
  </div>
  
<a class="btn btn-primary" href="{{route('home')}}">Voltar Ao inicio</a>

</div>
@endforeach
@endsection