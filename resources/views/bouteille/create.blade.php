@extends('layouts.app')
@section('title', 'Ajouter Btl')
@section('content')

<section class="formBtl_section">

<h1>Rechercher un Vin</h1>

<div class="formBtl_search">
    <input type="search" id="rechercher_bouteille" name="q" >
    <button><img src="/assets/img/icon_PW2/search_icon.png" alt="search icon"></button>
</div>

<h1>Ajouter une Bouteille</h1>

<form action="" enctype="multipart/form-data" class="formBtl_form">
    <input type="text" placeholder="Nom:">
    <input type="text" placeholder="Vignoble:">
    <input type="text" pattern="[0-9]*\.?[0-9]*" placeholder="Prix:" />
    <div>
        <label for="image">Télécharger une image :</label>
        <input type="file" id="image" name="image" accept="image/*">  
    </div>
    <select name="pays"  >
        <option value="null">Pays</option>
        <option value="Suede">Suede</option>
        <option value="Russie">Russie</option>
        <option value="Nigeria">Nigeria</option>
    </select>
    <textarea id="message" name="message"  placeholder="Description"></textarea>
     <input placeholder="Annee de Fabrication" type="number" id="annee" name="annee" min="1800" max="2099" >
     <input placeholder="Format (en ml):" type="number" id="quantity" name="quantity"  min="0">
    <select name="Type"  >
        <option value="null">Type</option>
        <option value="Rouge">Rouge</option>
        <option value="Blanc">Blanc</option>
        <option value="Brun">Brun</option>
    </select>
    <input type="submit">

</form>

</section>
@endsection
