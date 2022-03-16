<!DOCTYPE html>
<html>
  <head>
    <title>Flores e Abelhas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <style>
            .button {
                width: 40%;
            }
            .pink{
                color: #FFBED7;
                font-weight: bold;
            }
            .dark-pink{
                color: #C87092;
            }
        </style>
</head>
  <body>
    <div class="container">
    <br>
        <br><h1 class="text-center dark-pink">Cadastro de abelhas</h1></br>
        <div class="container">
            <h6>Cadastre as abelhas</h6>
            <br>
            <form action="{{ route('abelhas.create') }}" method="post">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                       Não foi possível cadastrar abelha. Tente novamente.
                    </div>
                @endif
                @if(session()->has('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome_abelha" id="nome_abelha" placeholder="Qual é o nome da abelha">
                </div>
                <div class="form-group">
                    <label>Espécie</label>
                    <input type="text" class="form-control" name="especie_abelha" id="especie_abelha" placeholder="Qual é a espécie ou nome Científico">
                </div>
                <div class="col-lg-12" style="text-align: right;">
                    <a href="./"><button type="button" class="btn btn-outline-danger">Cancelar</button></a>
                    <button type="submit" class="btn btn-danger">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  </body>
</html>
