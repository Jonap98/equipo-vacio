<?php

namespace App\Http\Controllers\empaques;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\empaques\Empaques;

class EmpaquesController extends Controller
{
    public function index() {
        $empaques = Empaques::select(
            'id',
            'numero_de_parte',
            'descripcion',
            'standar_pack'
        )
        ->get();

        return view('empaques.index', array('empaques' => $empaques));
    }

    public function store(Request $request) {
        // return response([
        //     'data' => $request->all(),
        //     'numero_de_partre' => $request->numero_de_parte,
        //     'descripcion' => $request->descripcion,
        //     'standar_pack' => $request->standar_pack,
        // ]);
        $empaque = new Empaques();

        $empaque->numero_de_parte = $request->numero_de_parte;
        $empaque->descripcion = $request->descripcion;
        $empaque->standar_pack = $request->standar_pack;

        $empaque->save();

        return back()->with('success', 'El empaque fue registrado exitosamente');
    }
}
