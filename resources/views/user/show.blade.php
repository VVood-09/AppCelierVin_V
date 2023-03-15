
@extends('layouts.app')
@section('title', 'Profil')
@section('content')

  <div class="profil_head">
        
        <img src="assets/img/icon_PW2/black_profil_icon.png" alt="profil_icon">

        <div>
            <h3>{{$utilisateur->name}}</h3>

            <!--<a href=""><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a> Edit User !!-->
        </div>
    </div>

  @endsection