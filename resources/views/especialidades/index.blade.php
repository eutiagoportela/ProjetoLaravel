@extends('site.layout')
@section('titulo','Cadastro de Especialidades')
@section('conteudo')

    @include('especialidades.create')

    <div class="row container crud">
      
            <div class="row titulo ">              
              <h1 class="left">Especialidades</h1>
              <span class="right chip">{{$especialidades->count()}} Especialidades cadastradas</span>  
            </div>
            
          
            <nav class="bg-gradient-blue">
              <div class="nav-wrapper">
                  <form action="{{route('especialidades.search')}}"  method="POST">
                      <div class="input-field">
                          <input placeholder="Pesquisar...por codigo ou nome da especialidade" id="search" name="search" type="search" >
                          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                          <i class="material-icons">close</i>
                      </div>

                      @csrf
                      @method('POST')
                  </form>
              </div>
          </nav> 

            <div class="card z-depth-4 registros" >
              <table class="striped ">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descricão</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
          

                  <tbody>
              
                    @foreach ($especialidades as $especialidade)
                        <tr>
                          <td>{{ $especialidade->id }} </td>
                          <td>{{ $especialidade->nome }} </td>
                          <td>{{ $especialidade->descricao }} </td>
                            <td>  
                                
                                    @include('especialidades.update')
                                    <a href="#update-{{ $especialidade->id }}" class="btn-floating  modal-trigger waves-effect waves-light orange"><i class="material-icons right">mode_edit</i></a>

                                    @include('especialidades.delete')
                                    <a href="#delete-{{ $especialidade->id }}" class="btn-floating  modal-trigger waves-effect waves-light red"><i class="material-icons right">delete</i></a>
                                    
                            </td>
                        </tr>
                        @endforeach
              
                  </tbody>


                </table>
                @include('include.mensagem')
            </div>   
     
    </div>
    <div class="fixed-action-btn">
      <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
        <i class="large material-icons">add</i>
      </a>   
    </div>


@endsection




