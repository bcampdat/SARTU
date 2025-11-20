<?php

namespace App\Http\Controllers;

use App\Models\ResumenDiario;
use Illuminate\Http\Request;

class ResumenDiarioController extends Controller
{
    public function index()
    {
        $resumen = auth()->user()->rol->nombre === 'encargado'
            ? ResumenDiario::where('id_usuario', auth()->id())
                ->orWhereHas('usuario', function ($q) {
                    $q->where('id_empresa', auth()->user()->id_empresa);
                })->get()
            : ResumenDiario::where('id_usuario', auth()->id())->get();

        return view('resumen.index', compact('resumen'));
    }
}
