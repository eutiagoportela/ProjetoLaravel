<div id="update-{{ $medico->id }}" class="modal">
    <div class="modal-content" >
        <h4><i class="material-icons">playlist_add_circle</i> Alterar Medico</h4>
        <form action="/medicos/alterar" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <input type="hidden" id="id" name="id" value="{{$medico->id}}" />
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" value="{{$medico->nome}}" id="nome" name="nome" class="form-control"  required  maxlength="45">

                <label for="nome" class="form-label">CRM:</label>
                <input type="text" value="{{$medico->CRM}}" id="crm" name="crm" class="form-control"  required  maxlength="45">

                <label for="nome" class="form-label">Telefone:</label>
                <input type="text" value="{{$medico->telefone}}" id="telefone" name="telefone" class="form-control"  required  maxlength="45">

                <label for="nome" class="form-label">Email:</label>
                <input type="text" value="{{$medico->email}}" id="email" name="email" class="form-control"  required  maxlength="45">
            </div>

            <div class="input-field">
                <select multiple id="especialidades" name="especialidades[]">
                    @foreach ($especialidades as $especialidade)
                        <option value="{{ $especialidade->id }}" {{ in_array($especialidade->id, $medico->especialidades->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $especialidade->nome }}
                        </option>
                    @endforeach
                </select>
                <label>Especialidades</label>
            </div>

            <button type="submit" class="waves-effect waves-green btn green right">Alterar</button><br>
        </form>
    </div>
</div>
