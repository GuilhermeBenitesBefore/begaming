@extends('layouts.app')

@section('content')

@include('snippets.fonts')

    <div class="row justify-content-center">

        <div class="col-sm-8 flex-column d-flex stretch-card">
            <div class="row">
                @foreach($badges as $badge)
                    <div class="col-lg-6 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <div class="card-body">
                                <div class="card-descricao">
                                    <p class="card-campo-nome"><b>Nome:</b></p>
                                    <h2 class="badge-nome mb-2 font-weight-bold">{{$badge->name}}</h2>
                                    <!--TODO: adicionar o campo descricao nas badges no banco de dados para isto funcionar...-->
                                    <p class="badge-descricao">{{$badge->descricao}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
