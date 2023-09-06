@extends('base.base')

@section('title','Connexion')

@section('content')
<div class="container mt-4">
    <h1>Connexion</h1>
    <form action="" method="post" class="vstack gap-2">
        @csrf
        @include('shared.input',['label' => 'Email','name' => 'email','type' => 'email', 'placeholder' => 'Entrez votre email'])
        @include('shared.input',['label' => 'Mot de passe','name' => 'password','type' => 'password'])
        <button class="btn btn-primary mt-2">
            Se connecter
        </button>

    </form>
</div>

@endsection
