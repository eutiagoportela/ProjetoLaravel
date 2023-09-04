<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class EspecialidadesController extends Controller
{
    public function index()
    {
        $especialidades = Especialidades::query()->orderBy('nome')->get();
       
        return view('especialidades.index',compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        try
        {
            $nome = $request->input('nome');
            $descricao = $request->input('descricao');

            $especialidade = new Especialidades();
            $especialidade->nome = $nome;
            $especialidade->descricao = $descricao;
            $especialidade->save();

            return redirect('/especialidades');

        } catch (\Exception $e) {
            return redirect()->route('especialidades')->with('erro', 'falha:'. $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try
        {
            $especialidade = Especialidades::find($request->id);
            if ($especialidade != null) 
            {
                $especialidade->nome = $request->nome;
                $especialidade->descricao = $request->descricao;
                $especialidade->save();

                return redirect()->route('especialidades')->with('sucesso', 'Alterado com sucesso');
            } else
            return redirect()->route('especialidades')->with('erro', 'Especialidade não encontrada');

        } catch (\Exception $e) {
            return redirect()->route('especialidades')->with('erro', 'falha:'. $e->getMessage());
        }
      
    }

    public function search(Request $request)
    {
        $searchTerm =  $request->search;

        if($searchTerm != null)
        {
            $especialidades = Especialidades::
            where('nome', 'like', '%' . $searchTerm . '%')
            ->orwhere('id', 'like', '%' . $searchTerm . '%')
            ->get();
        }
        else
        $especialidades = Especialidades::query()->orderBy('nome')->get();
        
        return view('especialidades.index',compact('especialidades'));
    }


    public function destroy($id)
    {
        try
        {
            $especialidade = Especialidades::find($id);
            //  dd($especialidade);
            if ($especialidade != null) 
            {
                $especialidade->delete();

                return redirect()->route('especialidades')->with('sucesso', 'Deletado com sucesso');
            } else
                return redirect()->route('especialidades')->with('erro', 'Especialidade não encontrada');
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() == "23000") {
                return redirect()->route('especialidades')->with('erro', 'Esta especialidade está sendo usada por um ou mais médicos. Não é possível excluí-la.');
            } else {
                return redirect()->route('especialidades')->with('erro', 'Ocorreu um erro ao processar a solicitação. Detalhes do erro: '.$e->getMessage());
            }
        }
    }
}
