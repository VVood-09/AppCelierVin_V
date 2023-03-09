<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VinController extends Controller
{
    //
    public function ajouterBtl(){
        return view("bouteille.create");
    }
    public function showBtl(){
        return view("bouteille.show");
    }
    public function editBtl(){
        return view("bouteille.edit");
    }
}
