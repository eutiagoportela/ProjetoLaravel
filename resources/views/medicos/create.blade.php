<div id="create" class="modal">
    <div class="modal-content" >
        <h4><i class="material-icons">playlist_add_circle</i> Novo Médico</h4>
        <form action="/medicos/salvar" method="post">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control"  required maxlength="45">

                <label for="nome" class="form-label">CRM:</label>
                <input type="text" id="crm" name="crm" class="form-control"  required maxlength="45">

                <label for="nome" class="form-label">Telefone:</label>
                <input placeholder="(18) 99999-9999" type="text" id="telefone" name="telefone" class="form-control"  required maxlength="15">

                <label for="nome" class="form-label">Email:</label>
                <input type="text" id="email" name="email" class="form-control"  required maxlength="45">

                <div class="input-field">
                    <select multiple id="especialidades" name="especialidades[]">
                        @foreach ($especialidades as $especialidade)
                            <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                        @endforeach
                    </select>
                    <label>Especialidades</label>
                </div>
            </div>


                <button type="submit" class="waves-effect waves-green btn green right">Cadastrar</button><br>
        </form>
    </div>
</div>


