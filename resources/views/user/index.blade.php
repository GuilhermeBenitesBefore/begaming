@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-sm-8 flex-column d-flex stretch-card">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">{{$user->name}}</h2>
                                <h4 class="card-title mb-2" style="text-transform: lowercase">{{$user->email}}</h4>
                                <small class="text-muted">{{$user->created_at}}</small>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

    </div>
@endsection
