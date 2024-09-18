@extends('emails.layouts.emailLayout')

@section('content')

<p> Esqueceu sua senha? Não se preocupe! </p>
<p> Seu código de redefinição de senha é: <strong>{{ $code }}</strong> </p>

<p> Para redefinir sua senha, clique no botão abaixo. </p>

<a href="https://agrotracker.vercel.app/forgot-password" class="btn btn-primary">Redefinir Senha</a>
@endsection