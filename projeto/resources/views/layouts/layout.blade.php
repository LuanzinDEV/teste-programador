<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <script src="{{ asset('js/vagas.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <title>@yield('titulo')</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-links">
                <a href="{{ route('home') }}" class="navbar-link">Home</a>
                <a href="{{ route('formVaga') }}" class="navbar-link">Criar Vaga</a>
                <a href="{{ route('candidatos') }}" class="navbar-link">Candidatos</a>
                <a href="{{ route('formCandidato') }}" class="navbar-link">Criar Candidatos</a>
            </div>
        </nav>        
    </header>

    @yield('conteudo')
</body>
</html>