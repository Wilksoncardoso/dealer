@extends('layouts.index_root')

@section('body')
<br><br><br><br>


<div class="row">
  <div class="col-8">

    <div class="card" >
      <div class="card-header"><div class="title"><h5>EDITAR ADMINISTRADOR - {{ Auth::user () ->name }}</h5></div> </div>
      <br>
      
      
      <div class="form_user">
          <form action="{{route('root.edit.update', ['store' => Auth::user () ->id])}}" method="POST" >
              @csrf
      
              <div class="form-group">
                  
                  <label for="exampleInputEmail1">Nome:</label>
                  <input type="text" name="name" value="{{Auth::user()->name }}" class="form-control">
                      
                  <label for="exampleInputEmail1">Titulo:</label>
                  <input type="text" name="titulo" value="{{Auth::user()->titulo }}" class="form-control">
      
                  <label for="exampleInputEmail1">E-mail:</label>
                  <input type="text" name="email" value="{{Auth::user()->email }}" class="form-control">
      
                  <label for="exampleInputEmail1">Password:</label>
                  <input type="password" name="password"  class="form-control">
      
                 </div>
      
      
      
       
              <button type="submit" class="btn btn-info enviar_foto"> Enviar </button>
      
          </form>
      </div>  
      
      <br>
      </div>

  </div>

  <div class="col">
    
    <div class="card" >
      <img class="card-img-top" src="{{asset('uploads/user/'. Auth::user () ->image)}}" alt="Card image cap" style="max-width:100%; object-fit:cover; width:400px; height: 330px;">
      <div class="card-body">
      <h5 class="card-title">Nome: {{Auth::user () ->name}}</h5>
        <p class="card-text">Titulo: {{Auth::user () ->titulo}}</p>
        <p class="card-text">E-mail: {{Auth::user () ->email}}</p>
        <p class="card-text">Data de Cadastro: {{ date('d/m/Y', strtotime(Auth::user () ->created_at)) }}</p>
      </div>
      <a href="{{route('user.destroy', ['user' => Auth::user () ->id])}}" class="btn btn-danger">CANSELAR REGISTRO</a></td>
    </div>

  </div>

  <div class="">
  <button  class="botao_root" type="button" id="botModal"></button>
  </div>



</div>








{{-- modal foto --}}
<div class="modal fade" id="modal-surf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
         
      <div class="modal-body">
      <form action="{{route('root.image.update', ['store' => Auth::user () ->id])}}" method="POST" enctype="multipart/form-data">
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