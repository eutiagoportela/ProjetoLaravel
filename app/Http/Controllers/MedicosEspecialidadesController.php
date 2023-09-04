<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use App\Models\Medicos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicosEspecialidadesController extends Controller
{
    public function index()
    {
        $medicosespecialidades = Medicos::with('especialidades')->orderBy('nome')->get();

        return view('relatorio.index', compact('medicosespecialidades'));
    }

    public function search(Request $request)
    {
        $searchTerm =  $request->search;

            $medicosespecialidades = Medicos::with('especialidades')
            ->leftJoin('medicos_especialidades as me', 'medicos.id', '=', 'me.medicos_id')
            ->leftJoin('especialidades as e', 'e.id', '=', 'me.especialidades_id')
            ->orwhere('e.id', 'like', '%' . $searchTerm . '%')
            ->orwhere('crm', 'like', '%' . $searchTerm . '%')
            ->groupBy('medicos.id')
            ->select('medicos.*')
            ->get();

        return view('relatorio.index', compact('medicosespecialidades'));
    }
}
