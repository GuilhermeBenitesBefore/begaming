@component('mail::message')
<h1>Esqueci minha senha</h1>
<p>Olá, {{ $user->name }}! Você solicitou a alteração de sua senha Begaming. Não se preocupe, basta acessar o link abaixo e preencher com a nova senha. </p>
@component('mail::button', [
    'url' => 'https://github.com/GuilhermeBenitesBefore/begaming/'
    ])
    Alterar senha!
@endcomponent
@endcomponent