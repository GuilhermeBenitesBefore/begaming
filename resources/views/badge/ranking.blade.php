@extends('layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
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
                            <tr>
                                <td>{{$ranking->nomeDoUsuario}}</td>
                                <td>{{$ranking->nomeDaBadge}}</td>
                                <td>{{$ranking->pontos}}</td>
                                <td>@TODO status atual...</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
