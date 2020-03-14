@extends('layouts.index_root')

@section('body')
<br><br><br><br>


<div class="row">
  <div class="col">
    
       
    
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Data Entrada</th>
              <th scope="col">Ação</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($data as $row)
            <tr>
              <td><img src="{{asset('uploads/user/'. $row->image)}}" alt="Image" class="rounded-bottom" style="max-width:100%; object-fit:cover; width:45px; height: 45px;"></td>
              <td>{{$row ->name}}</td>
              <td>{{$row ->email}}</td>
              <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ação
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('root.destroy.user', ['store' => $row->id])}}">Excluir Usuario</a>
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