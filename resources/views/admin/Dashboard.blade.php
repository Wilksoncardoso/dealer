@extends('layouts.home_admin')

@section('body')
<br>
<br>
<br>
<br>

<div class="row">
  <div class="col-8">
    <h4>Seja Bem vindo,{{ Auth::user () ->name }}  !</h4>
<br>
    <!--  aqui começa post -->
<div class="card" >
  <div class="card-header">
      Fazer uma Publicação
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
          <form action="{{route('admin.post')}}" method="POST" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="user" value="{{ Auth::user () ->id }}">

              <div class="form-group">
                  <label for="exampleInputEmail1">Titulo:</label>
                  <input type="text" name="titulo" class="form-control"  aria-describedby="emailHelp">
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">Assunto:</label>
                  <input type="text" name="Assunto" class="form-control"  aria-describedby="emailHelp">
              </div>

              <div class="form-group">
                  <label for="exampleFormControlTextarea1">Texto:</label>
                  <textarea class="form-control" name="texto" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

                <div class="form-group">
                  <label>Status de publicação</label>
                  <select name="estado" class="form-control">
                  @foreach ($estado as $row1) <!-- só foi possivel porque foi enviado todos usuarios-->
              
                  <option value="{{$row1->id}}">{{$row1->tipo}} </option>
                  
                  @endforeach
                  </select>
              </div>

              <label for="exampleFormControlFile1"><b>Selecione uma Foto</b></label>
              <input type="file" name="image_post"class="form-control-file" id="exampleFormControlFile1">

              <button type="submit" class="btn btn-info enviar_foto"> Enviar </button>
          </form>
     </li>
   </ul>
 </div>


 {{-- aqui termina post --}}
 <br>
{{-- aqui começa list 1 --}}

<div class="card">
  <div class="card-header">
      Ultimas Publicações
    </div>
    <ul class="list-group list-group-flush">
      <ul class="list-group list-group-flush">
        <table class="table table-striped ">
          <thead>
            <tr class="text-center">
              <th scope="col" style="width: 320px;">Titulo</th>
              <th scope="col">Criação</th>
               <th scope="col">Seguir</th>
               <th scope="col">Ação</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($data1 as $row2)
            <tr>
              <td class="text-justify">{{$row2->titulo}}</td>
              
              <td class="text-center">{{date('d/m/Y', strtotime($row2->created_at))}}</td>
              <td class="text-center">link</td>
              

              <td class="text-center"><a href="{{route('admin.publica.edit', ['store' => $row2->id])}}" class="btn btn-primary">Edit</a>
              <a href="{{route('admin.publica.destroy', ['store' => $row2->id])}}" class="btn btn-danger">X</a></td>
              
            </tr>
            
            @endforeach
            
          </tbody>
        </table>
        {{$data1->appends(['data2' => $data2->currentPage()])->links()}}    
    </ul>

    
    

</div>
<br>
{{-- aqui começa list 2 --}}
<div class="card" >
    <div class="card-header">
        Ultimas Publicações Salvas
      </div>
      <ul class="list-group list-group-flush">
        <ul class="list-group list-group-flush">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" class="text-center" style="width: 320px;">Titulo</th>
                
                <th scope="col" class="text-center">Criação</th>
                 <th scope="col" class="text-center">Seguir</th>
                 <th scope="col" class="text-center">Ação</th>
  
              </tr>
            </thead>
            <tbody>
              @foreach ($data2 as $row3)
              <tr>
                <td class="text-justify">{{$row3->titulo}}</td>
                
                <td class="text-center">{{date('d/m/Y', strtotime($row3->created_at))}}</td>
                <td class="text-center">link</td>
                <td class="text-center"><a href="{{route('admin.salva.edit', ['store' => $row3->id])}}" class="btn btn-primary">Edit</a>
                  <a href="{{route('admin.salva.destroy', ['store' => $row3->id])}}" class="btn btn-danger">X</a></td>
                
              </tr>
              
              @endforeach
              
            </tbody>
          </table>
          {{$data2->appends(['data1' => $data1->currentPage()])->links()}}  
      </ul>
</div>




  </div>
  <div class="col">
    
    
  @foreach ($data as $row)

  <div class="card" >
  <img src="{{asset('uploads/user/'. $row->image)}}" alt="Image" class="rounded-bottom" style="max-width:100%; object-fit:cover; width:400px; height: 330px;">
    
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
      <li class="list-group-item">Ultima Postagem: </li>

    </ul>
    <div class="card-body">
      <a href="{{route('user.editar', ['store' => Auth::user () ->id])}}" class="card-link">Editar Perfil</a>
      <a href="{{route('user.publicacao', ['store' => Auth::user () ->id])}}" class="card-link">Publicações</a>
      <a href="#" class="card-link">Em Construção</a>
      
    </div>
  </div>
  @endforeach
<br>
<!--  controle de publicação -->
<div class="card">
  <div class="card-header">
    Controle de Publicação
  </div>
  <ul class="list-group list-group-flush">
  <li class="list-group-item">Publicado  <span class="badge badge-light">

    {{$data3 = DB::table('post')->
    select('id_user', 'id_estado')
    ->where('id_user',Auth::user () ->id)
    ->where('id_estado',1)
    ->get()->count()}}

      </span></li>
    <li class="list-group-item">Em Produção <span class="badge badge-light">
      {{$data4 = DB::table('post')->
      select('id_user', 'id_estado')
      ->where('id_user',Auth::user () ->id)
      ->where('id_estado',2)
      ->get()->count()}}
      </span></li>
    <li class="list-group-item">Favorito <span class="badge badge-light">4</span></li>
  </ul>
</div>

  </div>
</div>






  









<!--  janela modal -->


  <div class="modal fade" id="modal-surf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
           
        <div class="modal-body">
        <form action="{{route('admin.upload')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
                <label for="exampleFormControlFile1"><b>Selecione uma Foto</b></label>
                <input type="file" name="image"class="form-control-file" id="exampleFormControlFile1">
                <br>
                <button type="submit" class="btn btn-info enviar_foto"> Enviar </button>

        </form>
         
  
        <br>
                   <div class="close_modal close" aria-label="Close"><a data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    </a></div>
        </div>
  
      </div>
    </div>
  </div>








@endsection

