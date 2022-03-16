<!DOCTYPE html>
<html>
  <head>
    <title>Flores e Abelhas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/app.css" rel="stylesheet">
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
        <br><a href="/"><h1 class="text-left dark-pink">Calendário de flores</h1></a></br>
        <br>
        <div class="row">
            <div class="col">
                <h6 class="text-left">Neste calendário encontram-se diversas flores.
                <br>
                Podem ser agrupadas pelos meses que florescem e
                <br>
                pelo tipo de abelha que poliniza a flor.</h6>
            </div>
            <div class="col-sm">
                <a href="/flores"><button type="button" class="btn btn-danger button">Cadastrar flor</button></a>
                <br>
                <br>
                <a href="/abelhas"><button type="button" class="btn btn-danger button">Cadastrar abelha</button></a>
            </div>
        </div>
        <form action="{{ route('abelhasflores.buscar') }}" method="post">
            @csrf
            <div class="form-group">
                @if($abelhas->isEmpty())
                    <br>
                    <strong><label>Não há abelhas cadastradas</label></strong><br><br>
                @else
                    <label>Selecione a abelha</label>

                    <select class="form-control" id="abelhaEspecie" name="abelhas">
                    <option selected disabled name="abelha" value="0">Selecione...</option>
                    @foreach ($abelhas as $abelha)
                        <option value="{{ $abelha->id_abelha }}" name="abelha">{{ $abelha->nome_abelha }} ({{ $abelha->especie_abelha }})</option>
                    @endforeach
                    </select>
                @endif
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label>Escolha os meses</label>
                    <br>
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
            </div>
            <div class="col-lg-12" style="text-align: right;">
                <button type="submit" class="btn btn-danger">Pesquisar</button>
            </div>
        </form>

        <div class="container">
        <br>
            @if(session()->has('msgfiltro'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('msgfiltro') }}
                    </div>
            @endif
            <div class="row">
            @if($flores->isEmpty())
                <br>
                <strong><label>Não há flores cadastradas</label></strong><br><br>
            @endif
            @foreach($flores as $flor)
                <div class="col-sm-2">
                    <div style="width: 10rem;">
                        <a href="" data-toggle="modal" data-target="#model{{$flor->nome_flor}}"><img class="card-img-top rounded-circle" src="{{ url('img/fotosFlores/'.$flor->foto_flor) }}" alt="{{ $flor->nome_flor }}" height="150" width="300"></a>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $flor->nome_flor }}</h5>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="model{{$flor->nome_flor}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <img class="card-img-top" src="{{ url('img/fotosFlores/'.$flor->foto_flor) }}" alt="{{ $flor->nome_flor }}">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h7><strong>{{$flor->nome_flor }}</strong></h7>
                                    <p>{{$flor->descricao }}</p>
                                    <h7><strong>Abelhas Relacionadas</strong></h7>
                                    <p>{{$flor->abelhas }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        <br>

        {{ $flores->links() }}

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
        crossorigin="anonymous"></script>
  </body>
</html>
