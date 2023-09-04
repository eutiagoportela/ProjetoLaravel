@extends('site.layout')
@section('titulo', 'Relatório')
@section('conteudo')

    <div class="row container crud">
        <div class="row titulo ">              
            <h1 class="left">Relatório</h1>
            <span class="right chip">{{$medicosespecialidades->count()}} Registros consultados</span>  
            
        </div>
          
        <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
                <form action="{{route('relatorio.search')}}"  method="POST">
                    <div class="input-field">
                        <input placeholder="Pesquisar...por crm ou codigo da especialidade" id="search" name="search" type="search" >
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>

                    @csrf
                    @method('POST')
                </form>
            </div>
        </nav>
        
        <div class="card z-depth-4 registros">
            <table class="striped ">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Crm</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dt Cadastro</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($medicosespecialidades as $medicosespecialidade)
                        <tr>
                            <td>{{ $medicosespecialidade->id }} </td>
                            <td>{{ $medicosespecialidade->nome }} </td>
                            <td>{{ $medicosespecialidade->CRM }} </td>
                            <td>{{ $medicosespecialidade->telefone }} </td>
                            <td>{{ $medicosespecialidade->email }} </td>
                            <td>{{ $medicosespecialidade->dt_cadastro }} </td>

                            <tr>
                                <td style='text-align:center' colspan="2">
                                    @foreach ($medicosespecialidade->especialidades as $especialidade)
                                        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                                            <li>
                                                {{$especialidade->id}} - {{$especialidade->nome}}
                                            </li>
                                        </ul>
                                    @endforeach
                                </td>
                            </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @include('include.mensagem')
        </div>

    </div>
    
    <script>
        var searchInput = document.getElementById('search');
        
        searchInput.addEventListener('keydown', function(event) {

            if (event.keyCode === 13) {
                event.preventDefault();
                this.closest('form').submit();
            }
        });
    </script>
@endsection
