    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Resetar Senha</title>
        </head>
        <body>

    @extends('layouts.app_login')

        @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Resetar Senha</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    Resetar Senha
                                </div>
                            @endif

                            @if(session('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                            @else
                            <p>Digite o e-mail no campo para que seja enviado um link de recuperação de senha.</p>
                            @endif

    <form action="{{ route('senha.resetaSenha') }}" method="post">

        {{ csrf_field() }}

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Endereço de e-mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>E-mail incorreto!</strong>
                    </span>
                @enderror

            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Enviar!</button>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection
    </body>
    </html>