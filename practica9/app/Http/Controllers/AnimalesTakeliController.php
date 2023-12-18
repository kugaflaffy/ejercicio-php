<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalesTakeliController extends Controller
{
    public function getanimales(){
        $animales = ['Takeli', 'Leon', 'Gato', 'Dani', 'Perro'];
        return response() -> json(['mensaje' =>'los animales son', 'datos'=> $animales]);
    }
}
