@extends('layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Últimas Pontuações - Todos os Usuários</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Badge</th>
                            <th>Pontuação</th>
                            <th>Data</th>
                            <th>Descrição</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pontos as $ponto)
                            <tr>
                                <td>{{$ponto->badge->name}}</td>
                                <td>{{$ponto->point}}</td>
                                <td>{{ Carbon\Carbon::parse($ponto->created_at)->format('d/m/Y') }}</td>
                                <td>{{$ponto->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
