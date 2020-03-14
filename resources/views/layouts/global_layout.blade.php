<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token()}}">
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link href="{{asset('css/publicar_admin.css')}}" rel="stylesheet">





    <title>tela home</title>
</head>
<body>
    
    @foreach ($data as $row)

    <div class="top">
        <div class="nav">
        <a href="{{route('admin')}}" class=""> <button class="nav_button" type="menu">Dashboard</button></a>
            <a href="{{route('user.publicacao')}}" class=""> <button class="nav_button" type="menu">Minhas Publicações</button></a>
            <a href="#" class=""> <button class="nav_button" type="menu">Editar Perfil</button></a>


        </div>
        <div class="login">
            <div class="imagem_topo">
                <img src="{{asset('uploads/user/'. $row->image)}}"style="max-width:100%; object-fit:cover; width: 45px; height:45px; left:45px;" class="rounded-circle" > 
            </div>
            <p> {{ Auth::user () ->email }}   <a href="{{route('admin.logout')}}"> Sair</a></p>
            
        </div>
 @endforeach
    </div>


    <div class="container">
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif    
        </main>

    </div>
    
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/home.js')}}" charset="utf-8"></script>


</body>
</html>