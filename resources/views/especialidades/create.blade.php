<div id="create" class="modal">
    <div class="modal-content" >
        <h4><i class="material-icons">playlist_add_circle</i> Nova Especialidade</h4>
        <form action="/especialidades/salvar" method="post">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required  maxlength="45">

                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="form-control" required  maxlength="45">
            </div>

            <button type="submit" class="waves-effect waves-green btn green right">Cadastrar</button><br>
        </form>
    </div>
</div>
