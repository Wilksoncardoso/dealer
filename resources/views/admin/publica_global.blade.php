@extends('layouts.global_layout')

@section('body')
<br><br><br><br>
<h4> Postagem global</h4>
@foreach ($data1 as $row)
<div class="post">
    <div class="card mb-12">
        <div class="row no-gutters">
          <div class="col-md-3">
            <img src="{{asset('uploads/post/'. $row->image_post)}}" class="card-img" style="max-width:100%; object-fit:cover; width: 230px; height:230px;" >
          </div>
          <div class="col-md-8">
            <div class="card-body">
            <h3 class="card-title" style="position: relative; text-transform: uppercase; left:-40px;">{{$row->titulo}}</h3>
            <p class="card-text"  style="position: relative; text-transform: uppercase; left:-40px;">{{$row->assunto}}</p>

            <a  href="{{$row->id}}"><button class="continuar_lendo"> Continuar Lendo</button></a>
            <br>
            
            </div>
            <p class="card-text" style="position:absolute;  top:190px;">
                <small class="text-muted">Publicado no dia: {{ date('d/m/Y', strtotime($row->created_at)) }} por {{$row->name}} | Identificação de publicação #{{$row->id}} </small></p>
          </div>
        </div>
      </div>
</div>
<br>
@endforeach
<br>
<div class="liks">
    {{$data1->links()}}
</div>


@endsection