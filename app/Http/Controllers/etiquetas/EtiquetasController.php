<?php

namespace App\Http\Controllers\etiquetas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtiquetasController extends Controller
{
    public function index() {
        return view('etiquetas.index');
    }
}
