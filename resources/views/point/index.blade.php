@extends('layouts.app')

@section('content')
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Últimas Pontuações</h4>
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
                            @foreach($points as $point)
                                <tr>
                                    <td>{{$point->badge->name}}</td>
                                    <td>{{$point->point}}</td>
                                    <td>{{ Carbon\Carbon::parse($point->created_at)->format('d/m/Y') }}</td>
                                    <td>{{$point->description}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
