<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Especialidades;
use Illuminate\Http\Request;
use App\Models\Medicos;
use App\Models\MedicosEspecialidades;
use Illuminate\Support\Facades\DB;

class MedicosController extends Controller
{
    public function index()
    {
        $medicos = Medicos::with('especialidades')->orderBy('nome')->get();

        $especialidades = Especialidades::all();
        return view('medicos.index', compact('medicos'), compact('especialidades'));
    }

    public function create()
    {
        $especialidades = Especialidades::all();
        return view('medicos.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        try 
        {
            $especialidades = $request->input('especialidades');

            $nome = $request->input('nome');
            $crm = $request->input('crm');
            $telefone = $request->input('telefone');
            $email = $request->input('email');
            $datacadastro = date('Y-m-d H:i:s');

            $medico = new Medicos();
            $medico->nome = $nome;
            $medico->crm = $crm;
            $medico->telefone = $telefone;
            $medico->email = $email;
            $medico->dt_cadastro = $datacadastro;


            DB::beginTransaction();

            $medico->save();

            if($especialidades!=null)
            {
                foreach ($especialidades as $especialidade) {
                    $medicoEspecialidade = new MedicosEspecialidades();
                    $medicoEspecialidade->medicos_id = $medico->id;
                    $medicoEspecialidade->especialidades_id = (int) $especialidade;
                    $medicoEspecialidade->save();
                }
            }

            DB::commit();
            return redirect()->route('medicos')->with('sucesso', 'Cadastrado com sucesso');
        } catch (\Exception $e) 
        {
            DB::rollback();
            return redirect()->route('medicos')->with('erro', 'Não cadastrado'.$e->getMessage());
        }

        
    }

    public function search(Request $request)
    {
        $searchTerm =  $request->search;

        if($searchTerm != null)
        {
            $medicos = Medicos::
             where('nome', 'like', '%' . $searchTerm . '%')
            ->orwhere('crm', 'like', '%' . $searchTerm . '%')
            ->get();
        }
        else
            $medicos = Medicos::with('especialidades')->orderBy('nome')->get();
        
        $especialidades = Especialidades::all();
        return view('medicos.index', compact('medicos'), compact('especialidades'));
    }

    public function update(Request $request)
    {
        try 
        {
            DB::beginTransaction();

                $medico = Medicos::find($request->id);
                $especialidades = $request->input('especialidades');

                if ($medico != null) 
                {
                    $medico->nome = $request->nome;
                    $medico->crm = $request->crm;
                    $medico->telefone = $request->telefone;
                    $medico->email = $request->email;
                    $medico->save();
        
                    MedicosEspecialidades::where('medicos_id', $request->id)->delete();

                    if($especialidades!=null)
                    {
                        foreach ($especialidades as $especialidade) {
                            $medicoEspecialidade = new MedicosEspecialidades();
                            $medicoEspecialidade->medicos_id = $medico->id;
                            $medicoEspecialidade->especialidades_id = (int) $especialidade;
                            $medicoEspecialidade->save();
                        }
                    }

                } else
                  return redirect()->route('medicos')->with('sucesso', 'Não encontrado');

            DB::commit();

            return redirect()->route('medicos')->with('sucesso', 'Alterado com sucesso');
            
        } catch (\Exception $e) 
        {
            DB::rollback();
           
           return redirect()->route('medicos')->with('erro', 'Não alterado'.$e->getMessage());
        }

      
    }

    public function destroy($id)
    {
        $medico = Medicos::find($id);
  
        if ($medico != null) {

            try 
            {
              $medico->delete();
              return redirect('/medicos')->with('sucesso', 'Deletado com sucesso');
            } catch (\Exception $e) {
               return redirect()->route('medicos')->with('erro', 'Não deletado'.$e->getMessage());
            }
        } else
           return redirect()->route('medicos')->with('erro', 'medico nao encontrado');
          
    }
}
