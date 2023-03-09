@extends('layouts.app')
@section('title', 'Show Btl')
@section('content')
<div class="btl_head">
        
        <img src="assets/img/icon_PW2/black_profil_icon.png" alt="profil_icon">

        <div>
            <h3>John Canary</h3>
            <a href="">Cellier: Maison</a><!-- Edit User !!-->
        </div>
        <div>
            <h4>Quantite:</h4>
            <h2>12</h2>
        </div>

    </div>  

    <article class="carte_btl">
        <div class="carte_btl-header">
            <div class="carte_btl-header_title">
                <h1>Bouteille1</h1>
                <a href="#"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a><!-- Edit Btl !!-->
            </div>
            <div class="carte_btl-header_sub-title">
                <p>Type  </p>
                <p>4/5</p>
            </div>
        </div>
        <div class="carte_btl-body">
            <img src="" alt="">
        <details>
            <summary>Description</summary>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ipsam saepe dolorum, nobis, ex rerum earum commodi odit maiores quasi praesentium aperiam laudantium! Accusamus, perferendis non voluptatem voluptas fugit veritatis.</p>
        </details>
        <div class="carte_btl-commentaire">
            <details>
                <summary>Commentaire</summary>
                <div class="carte_btl-commentaire_carte">
                    <div>
                        <h3>John Canary</h3>
                        <small>2001</small>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet odio aspernatur, illo facere nisi repellendus aliquid ratione reprehenderit fuga soluta voluptatem, vitae quae architecto molestias nesciunt magni voluptatum nostrum esse.</p>
                </div>
            </details>
            <a href="#"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a><!-- Ajout de Commentaire !!-->
        </div>

        </div>
        
    </article>

@endsection