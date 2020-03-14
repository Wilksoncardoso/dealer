@extends('layouts.index_root')

@section('body')
<br><br><br><br>

<div class="row">
    <div class="col-8">
      
      <div class="card" >
        <div class="card-header"><div class="title"><h5>LISTAR ADMINISTRADORES </h5></div> </div>
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" style="width:500px;">Nome</th>
            <th scope="col">Ação</th>
          </tr>
      </thead>
          
      @foreach ($data1 as $row1)
        <tbody>
          
          <td><img src="{{asset('uploads/user/'. $row1->image)}}" alt="Image" class="rounded-bottom" style="max-width:100%; object-fit:cover; width:45px; height: 45px;"></td>
          <td>{{$row1->name}}</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ação
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                
                

                <form action="{{route('root.permissao.update', ['store' => $row1->id])}}" method="POST">
                  @csrf
                  
                  <input type="hidden" name="nivel" value="2">
                  <a><button class="dropdown-item" type="submit">Deixar Administração</button></a>
                  </form>
                
              
                
                
                <a class="dropdown-item" href="{{route('root.destroy.user', ['store' => $row1->id])}}">Excluir Membro</a>
                </div>
            </div>
          
          
          
          
          
          
          
          
          
          
          </td>

        
          
        </tbody>
        @endforeach

        
      </table>
      {{$data1->links()}}
    </div>
    <br>
    </div>
    <div class="col">
        @foreach ($data as $row)

        <div class="card" >
        <img src="{{asset('uploads/user/'. Auth::user () ->image)}}" alt="Image" class="rounded-bottom" style="max-width:100%; object-fit:cover; width:400px; height: 330px;">
          
              <div class="">
              <button  class="botao_foto" type="button" id="botModal"></button>
              </div>
      
          <div class="card-body">
            <h5 class="card-title">{{ Auth::user () ->name }}</h5>
            <p class="card-text">{{ Auth::user () ->titulo }}</p>
        
          </div>
          <ul class="list-group list-group-flush">
        
          <li class="list-group-item">Nivel de Acesso: {{$row->nivel_acesso}}</li>
            <li class="list-group-item">E-mail: {{ Auth::user () ->email }}</li>
            <li class="list-group-item">Data de Entrada:  {{ date('d/m/Y', strtotime($row->created_at)) }}</li>
            
      
          </ul>
          <div class="card-body">
            <a href="{{route('root.editar', ['store' => Auth::user () ->id])}}" class="card-link">Editar Perfil</a>
            <a href="#" class="card-link">Em Construção</a>
            
          </div>
        </div>
        @endforeach
    </div>
  </div>




@endsection