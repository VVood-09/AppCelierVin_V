@extends('layouts.app')
@section('title', 'Modifier Btl')
@section('content')



<h1>Modifier Cette Bouteille</h1>

<form action="" enctype="multipart/form-data">
    <input type="text" placeholder="Nom:">
    <input type="text" pattern="[0-9]*\.?[0-9]*"   placeholder="Prix:"/>
    <label for="image">Télécharger une image :</label>
    <input type="file" id="image" name="image" accept="image/*">  
    <select name="pays"  >
        <option value="null">Pays</option>
        <option value="Suede">Suede</option>
        <option value="Russie">Russie</option>
        <option value="Nigeria">Nigeria</option>
    </select>
    <textarea id="message" name="message" rows="5" cols="50" placeholder="Description"></textarea>

    <input type="date">
    <label for="quantity">Quantité (en ml):</label>
<input type="number" id="quantity" name="quantity" step="0.01" min="0">
  
    <input type="submit" value="Modifier">

</form>
@endsection
