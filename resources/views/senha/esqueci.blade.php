<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ops... Esqueci minha senha!</title>
</head>
<body>

    <p>Digite o e-mail no campo para que seja enviado um link de recuperação de senha.</p>
<form action="{{ route('senha.resetaSenha') }}" method="post">

    {{ csrf_field() }}

    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <input type="email" name="email" id="email">
    <button type="submit">Enviar!</button>

</body>
</html>