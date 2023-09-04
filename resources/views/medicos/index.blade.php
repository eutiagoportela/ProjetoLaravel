@extends('site.layout')
@section('titulo', 'Cadastro de Médicos')
@section('conteudo')

    
    @include('medicos.create')

    <div class="row container crud">

        <div class="row titulo ">
            <h1 class="left">Medicos</h1>
            <span class="right chip">{{ $medicos->count() }} Medicos cadastrados</span>
        </div>
        
        <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
                <form action="{{route('medicos.search')}}"  method="POST">
                    <div class="input-field">
                        <input placeholder="Pesquisar...por nome ou crm do medico" id="search" name="search" type="search" >
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
                        <th scope="col">Ações</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($medicos as $medico)
                        <tr>
                            <td>{{ $medico->id }} </td>
                            <td>{{ $medico->nome }} </td>
                            <td>{{ $medico->CRM }} </td>
                            <td>{{ $medico->telefone }} </td>
                            <td>{{ $medico->email }} </td>
                            <td>{{ $medico->dt_cadastro }} </td>

                            <td>  
                                @include('medicos.update')
                                <a href="#update-{{ $medico->id }}" class="btn-floating  modal-trigger waves-effect waves-light orange"><i class="material-icons right">mode_edit</i></a>

                                @include('medicos.delete')
                                <a href="#delete-{{ $medico->id }}" class="btn-floating  modal-trigger waves-effect waves-light red"><i class="material-icons right">delete</i></a>
                                
                            </td>
                        </tr>
                    @endforeach

                </tbody>


            </table>
            @include('include.mensagem')
        </div>

    </div>
    
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
            <i class="large material-icons">add</i>
        </a>
    </div>


    <script>
        function searchMedicos() {
            var searchForm = document.getElementById('searchForm');
            var formData = new FormData(searchForm);
    
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'medicos.search');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var searchResults = document.getElementById('searchResults');
                    searchResults.innerHTML = xhr.responseText;
                }
            };
            xhr.send(formData);
        }
    </script>
@endsection
