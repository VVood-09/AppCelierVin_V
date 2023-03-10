
<!-- PAGE ACCEUIL/ SIGN_IN SIGN+UP -->

@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<section class="welcome">
    <div>
        <h1>Bienvenue au VinoClub</h1>

        <a class="btn" href="{{ route('register')}}">S'inscrire</a>
        <a class="btn" href="{{ route('login')}}">Se Connecter</a>
    </div>



</section>



@endsection

