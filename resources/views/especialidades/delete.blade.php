<!-- Modal Structure -->
  <div id="delete-{{ $especialidade->id }}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> Tem certeza?</h4>
        <div class="row">
          <p>Tem certeza que deseja excluir: {{$especialidade->nome}} ?</p>
        </div>

        <div class="row">
          <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>

          <form action="{{route('especialidades.delete',$especialidade->id)}}"  method="POST">
              @csrf
              @method('DELETE')
            <button type="submit" class=" waves-effect  waves-green btn red right">Excluir</button>
          </form>
        </div>
    </div>
  </div>
