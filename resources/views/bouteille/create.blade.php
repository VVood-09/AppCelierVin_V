@extends('layouts.app')
@section('title', 'Ajouter Btl')
@section('content')
<h1>Rechercher une biere</h1>

<input type="search" id="rechercher_bouteille" name="q" >
<span></span>

<button>Rechercher</button>


<h1>Ajouter une Bouteille</h1>

<form action="" enctype="multipart/form-data">
    <input type="text" placeholder="Nom:">
    <input type="text" placeholder="Vignoble:">
    <input type="text" pattern="[0-9]*\.?[0-9]*" />
    <label for="image">Télécharger une image :</label>
    <input type="file" id="image" name="image" accept="image/*">  
    <select name="pays"  >
        <option value="null">Pays</option>
        <option value="Suede">Suede</option>
        <option value="Russie">Russie</option>
        <option value="Nigeria">Nigeria</option>
    </select>
    <input type="textarea">
    <input type="date">
    <label for="quantity">Quantité (en ml):</label>
<input type="number" id="quantity" name="quantity" step="0.01" min="0">
<select name="Type"  >
        <option value="null">Type</option>
        <option value="Rouge">Rouge</option>
        <option value="Blanc">Blanc</option>
        <option value="Brun">Brun</option>
    </select>
    <input type="submit">

</form>
@endsection
