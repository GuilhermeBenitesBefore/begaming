@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-sm-8 flex-column d-flex stretch-card">
            <div class="row">
                @foreach($badges as $badge)
                <div class="col-lg-4 d-flex grid-margin stretch-card">
                    <div class="card sale-diffrence-border">
                        <div class="card-body">
                            <h2 class="text-dark mb-2 font-weight-bold">{{$badge->name}}</h2>
                            <h4 class="card-title mb-2">{{$badge->pivot->points}}</h4>
                            <small class="text-muted">{{$badge->pivot->updated_at}}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-4 grid-margin stretch-card">
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($points as $point)
                                <tr>
                                    <td>{{$point->badge->name}}</td>
                                    <td>{{$point->point}}</td>
                                    <td>{{ Carbon\Carbon::parse($point->created_at)->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
