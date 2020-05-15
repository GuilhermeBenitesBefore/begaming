@extends('layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('badges.ranking.csv') }}" style="margin-left: 85%;" class="btn btn-secondary">Exportar
                    CSV</a>
                <h4 class="card-title">Ranking</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Funcionário</th>
                            <th>Badge</th>
                            <th>Pontuação Atual</th>
                            <th>Status Atual</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($registrosDoRanking as $ranking)
                            <tr class="tabela-ranking">
                                @if($ranking->nomeDoUsuario == $nomeUsuarioLogado)
                                    <td style="background-color: #b0d4f1;">{{$ranking->nomeDoUsuario}}</td>
                                    <td style="background-color: #b0d4f1">{{$ranking->nomeDaBadge}}</td>
                                    <td style="background-color: #b0d4f1">{{$ranking->pontos}}</td>
                                    @if($ranking->pontos >= $ranking->pontuacao_nivel_black)
                                        <td style="color: black; font-weight: bold; background-color: #b0d4f1">Black
                                        </td>
                                    @elseif($ranking->pontos >= $ranking->pontuacao_nivel_gold)
                                        <td style="color: goldenrod; font-weight: bold; background-color: #b0d4f1">
                                            Gold
                                        </td>
                                    @elseif($ranking->pontos >= $ranking->pontuacao_nivel_silver)
                                        <td style="color: grey; font-weight: bold; background-color: #b0d4f1">Silver
                                        </td>
                                    @elseif($ranking->pontos >= $ranking->pontuacao_nivel_classic)
                                        <td style="color: saddlebrown; font-weight: bold; background-color: #b0d4f1">
                                            Classic
                                        </td>
                                    @else
                                        <td style="background-color: #b0d4f1">Não Elegível</td>
                                    @endif
                                @else
                                    <td>{{$ranking->nomeDoUsuario}}</td>
                                    <td>{{$ranking->nomeDaBadge}}</td>
                                    <td> {{$ranking->pontos}}</td>
                                    @if($ranking->pontos >= $ranking->pontuacao_nivel_black)
                                        <td style="color: black; font-weight: bold">Black</td>
                                    @elseif($ranking->pontos >= $ranking->pontuacao_nivel_gold)
                                        <td style="color: goldenrod; font-weight: bold">Gold</td>
                                    @elseif($ranking->pontos >= $ranking->pontuacao_nivel_silver)
                                        <td style="color: grey; font-weight: bold">Silver</td>
                                    @elseif($ranking->pontos >= $ranking->pontuacao_nivel_classic)
                                        <td style="color: saddlebrown; font-weight: bold">Classic</td>
                                    @else
                                        <td>Não Elegível</td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
