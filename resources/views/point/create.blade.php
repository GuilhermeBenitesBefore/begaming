@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Pontuar Colaborador') }}</h4>
                        <form class="forms-sample" method="POST" action="{{ route('points.store') }}">
                            @csrf

                            <div class="form-group">
                                <label>{{ __('Colaborador') }}</label>
                                <select class="js-example-basic-single w-100" name="user_id" id="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Badge') }}</label>
                                <select class="js-example-basic-single w-100" name="badge_id" id="badge_id">
                                    @foreach($badges as $badge)
                                        <option value="{{$badge->id}}">{{$badge->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="point">{{ __('Pontos') }}</label>
                                <input id="point" type="point" class="form-control @error('point') is-invalid @enderror"
                                       name="point" required autocomplete="new-point">

                                @error('point')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Descricao') }}</label>

                                <textarea id="description" class="form-control" name="description" required
                                          autocomplete="description"
                                          rows="5" cols="33"></textarea>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Pontuar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
