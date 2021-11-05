<div class="row mt-2">
    <div class="col-12 col-sm-4 col-lg-3">
        <label for="categoria">Categoria:</label>
        <select name="categoria" id="" class="custom-select">
            <option value="G">Grupo</option>
            <option value="C">Conta</option>
        </select>
    </div>
    <div class="col-12 col-sm-4 col-lg-3">
        <label for="status">Status:</label>
        <select name="status" id="" class="custom-select">
            <option value="A">Ativo</option>
            <option value="I">Inativo</option>
        </select>
    </div>
</div>
<div class="row mt-1">
    <div class="col-12 col-sm-12 col-lg-12">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="" class="form-control" placeholder="Descrição da Conta" required>
    </div>
</div>
<div class="row mt-1">
    <div class="col-12 col-sm-6 col-lg-6">
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="" class="custom-select">
            <option>Escolha um tipo</option>
            <option value="R">Receita</option>
            <option value="D">Despesa</option>
            <option value="C">Passivo</option>
            <option value="I">Investimento</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg-6">
        <label for="uso">Uso: </label>
        <select name="uso" id="" class="custom-select">
            <option value="N">Normal</option>
            <option value="E">Específico</option>
        </select>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-sm-6 col-lg-6">
        <label for="parente">Pertence à:</label>
        <select name="pertence" class="custom-select">
            <option value="">Nenhum</option>
            @foreach ($grupo as $g)
                <option value="{{ $g->id }}">{{ $g->descricao }}</option>
            @endforeach
        </select>
        <input type="hidden" name="operador_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="operador_nome" value="{{ Auth::user()->name }}">
    </div>
</div>

<div class="row mt-2">
    <div class="col-12">
        <button type="submit" class="btn btn-danger">Gravar</button>
        <button type="reset" class="btn btn-secondary">Novo</button>
    </div>
</div>
