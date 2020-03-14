<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token()}}">
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link href="{{asset('css/home_public.css')}}" rel="stylesheet">





    <title> Tela de Cadastro</title>
</head>
<body>
    
    <div class="top">

        <div class="login">
            <form action="{{ route('admin.login.do')}}" method="POST">
                @csrf    

               
                      <label for="exampleInputEmail1">E-mail: </label>
                      <input type="email" name="email"   aria-describedby="emailHelp">
                      <label for="exampleInputPassword1">Senha: </label>
                      <input type="password" name="password"  id="exampleInputPassword1">
                   
        
                    <button type="submit" class="btn btn-success">Entrar</button>
                  </form>

                  <div class="alert text-danger">

                    @if($errors ->all())
                    @foreach ($errors->all() as $error)
                   
                    
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                
                    @endforeach
                @endif
                </div>
        </div>
            <div class="cad">
            <a href="{{route('registrar')}}"  class="btn btn-primary"> Cadastre-se</a>
            </div>
    </div>


    <div class="container">
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif    
        </main>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>