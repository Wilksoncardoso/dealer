@extends('layouts.index_root')

@section('body')
<br><br><br><br>


<div class="row">
  <div class="col">


    <table class="table">
      <thead>
        <tr>
          <th scope="col">#POST</th>
          <th scope="col">Titulo</th>
          <th scope="col">Assunto</th>
          <th scope="col">Membro</th>
          <th scope="col">Perfil</th>
          
          <th scope="col">Ação</th>

        </tr>
      </thead>
     
          
      
      <tbody>
        @foreach ($data as $row)
        <tr>
        <td>{{$row->id}}</td>
          <td>{{$row->titulo}}</td>
          <td>{{$row->assunto}}</td>
          <td>{{$row->name}}</td>
          <td><img src="{{asset('uploads/user/'. $row->image)}}" alt="Image" class="rounded-bottom" style="max-width:100%; object-fit:cover; width:45px; height: 45px;"></td>
          
          <td>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Ação
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{route('root.destroy.post', ['store' => $row->id])}}">Excluir Publicação</a>
              <a class="dropdown-item" href="{{route('root.publica.edit', ['store' => $row->id])}}">Editar Publicação</a>

            </div>
            </div>
      

          </td>
        </tr>
        @endforeach
      </tbody>
    
    </table>
    
    
    
    {{$data->links()}}

  </div>
</div>


@endsection