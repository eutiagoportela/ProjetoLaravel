<div id="update-{{ $especialidade->id }}" class="modal">
    <div class="modal-content" >
        <h4><i class="material-icons">playlist_add_circle</i> Alterar Especialidade</h4>
        <form action="especialidades/alterar"  method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" value="{{$especialidade->nome}}" id="nome" name="nome" class="form-control"  required  maxlength="45">

                <input type="hidden" id="id" name="id" value="{{$especialidade->id}}" />
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" value="{{$especialidade->descricao}}" id="descricao" name="descricao" class="form-control"  required  maxlength="45">
            </div>

            <button type="submit" class="waves-effect waves-green btn green right">Alterar</button><br>
        </form>
    </div>
</div>

