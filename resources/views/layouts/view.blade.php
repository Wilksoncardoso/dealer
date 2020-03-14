<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token()}}">
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link href="{{asset('css/home_privado.css')}}" rel="stylesheet">





    <title>tela home</title>
</head>
<body>
    

    <div class="top">
        <div class="nav">
            
            
        </div>
     

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