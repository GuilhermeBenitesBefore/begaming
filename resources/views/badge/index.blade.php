@extends('layouts.app')

@section('content')

@include('snippets.fonts')

    <div class="row justify-content-center">

        <div class="col-sm-8 flex-column d-flex stretch-card">
            <div class="row">
                @foreach($badges as $badge)
                    <div class="col-lg-6 d-flex grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <img class="figura-do-badge" src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x.png">
                                <div class="card-descricao">
                                    <p class="card-campo-nome"><b>Nome:</b></p>
                                    <h2 class="badge-nome mb-2 font-weight-bold">{{$badge->name}}</h2>
                                    <!--TODO: adicionar o campo descricao nas badges no banco de dados para isto funcionar...-->
                                    <p class="badge-descricao">{{$badge->descricao}}</p>
                                    <div class="card-footer">
                                        Classic: {{$badge->pontuacao_nivel_classic}}
                                        Silver: {{$badge->pontuacao_nivel_silver}}
                                        Gold: {{$badge->pontuacao_nivel_gold}}
                                        Black: {{$badge->pontuacao_nivel_black}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
