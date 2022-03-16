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
        <br><h1 class="text-center dark-pink">Cadastro de flores</h1></br>
        <div class="container">
            <h5>Cadastre as flores de acordo com o mês em que ela floresce</h5>

            <form action="{{ route('flores.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                       Não foi possível cadastrar flor. Tente novamente.
                    </div>
                @endif
                @if(session()->has('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="nome_flor" name="nome_flor" placeholder="Qual é o nome da flor">
                </div>
                <div class="form-group">
                    <label>Espécie</label>
                    <input type="text" class="form-control" id="especie_flor" name="especie_flor" placeholder="Qual é a espécie ou nome Científico">
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Escreva uma breve descrição sobre a flor">
                </div>
                <style>
                    label {
                        display: inline-block;
                    }
                    input {
                        padding: 0;
                        margin:0;
                        vertical-align: center;
                        position: relative;
                        top: 1px;
                        overflow: hidden;
                    }
                </style>
                <div class="form-group">
                    <label>Quais os meses a flor irá florescer</label><br>
                    <label><input id="1" name="meses[]" type="checkbox" value="Janeiro">  Janeiro</label>
                    <label><input id="2" name="meses[]" type="checkbox" value="Fevereiro">  Fevereiro</label>
                    <label><input id="3" name="meses[]" type="checkbox" value="Março">  Março</label>
                    <label><input id="4" name="meses[]" type="checkbox" value="Abril">  Abril</label>
                    <label><input id="5" name="meses[]" type="checkbox" value="Maio">  Maio</label>
                    <label><input id="6" name="meses[]" type="checkbox" value="Junho">  Junho</label>
                    <label><input id="7" name="meses[]" type="checkbox" value="Julho">  Julho</label>
                    <label><input id="8" name="meses[]" type="checkbox" value="Agosto">  Agosto</label>
                    <label><input id="9" name="meses[]" type="checkbox" value="Setembro">  Setembro</label>
                    <label><input id="10" name="meses[]" type="checkbox" value="Outubro">  Outubro</label>
                    <label><input id="11" name="meses[]" type="checkbox" value="Novembro">  Novembro</label>
                    <label><input id="12" name="meses[]" type="checkbox" value="Dezembro">  Dezembro</label>
                </div>
                <div class="form-group">
                    <label>Selecione as abelhas que polinizam essas flores</label><br>
                    @if($abelhas->isEmpty())
                        <br>
                        <strong><label>Não há abelhas cadastradas</label></strong><br><br>
                    @else
                        @foreach($abelhas as $abelha)
                            <label><input id="{{ $abelha->id_abelha }}" name="abelhas[]" type="checkbox" value="{{ $abelha->id_abelha }}">  {{$abelha->nome_abelha}} ({{$abelha->especie_abelha}})</label>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label>Escolha uma imagem</label>
                        <input type="file" class="form-control-file" id="foto_flor" name="foto_flor">
                    </div>
                    <div class="col-lg-12" style="text-align: right;">
                        <a href="./"><button type="button" class="btn btn-outline-danger">Cancelar</button></a>
                        <button type="submit" class="btn btn-danger">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>



    </div>


    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  </body>
</html>
