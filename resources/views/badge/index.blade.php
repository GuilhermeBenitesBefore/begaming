@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-sm-8 flex-column d-flex stretch-card">
            <div class="row">
                @foreach($badges as $badge)
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">{{$badge->name}}</h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
