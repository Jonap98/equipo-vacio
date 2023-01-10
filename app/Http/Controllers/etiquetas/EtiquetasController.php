<?php

namespace App\Http\Controllers\etiquetas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\empaques\Empaques;

class EtiquetasController extends Controller
{
    public function index() {

        $empaques = Empaques::select(
            'id',
            'numero_de_parte',
            'descripcion',
            'standar_pack'
        )
        ->get();

        return view('etiquetas.index', array('empaques' => $empaques));
    }
}
