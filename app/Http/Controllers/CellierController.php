<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CellierController extends Controller
{
    //
    public function index(){
        return view("users.dashboard");
    }
 }
