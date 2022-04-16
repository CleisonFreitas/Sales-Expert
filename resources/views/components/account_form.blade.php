<div class="row mt-2">
    <div class="col-12 col-sm-4 col-lg-3">
        <label for="categoria">Categoria:</label>
        <select name="categoria" id="" class="custom-select">
            @if (isset($account))
            @switch($account->categoria)
                @case('G')
                    <option value="G" selected>Grupo</option>
                    <option value="C">Conta</option>
                    @break
                @case('C')
                    <option value="G">Grupo</option>
                    <option value="C" selected>Conta</option>
                    @break
                @default
                <option value="G" selected>Grupo</option>
                <option value="C">Conta</option>
            @endswitch
            @else
            <option value="G" selected>Grupo</option>
                <option value="C">Conta</option>
            @endif


        </select>
    </div>
    <div class="col-12 col-sm-4 col-lg-3">
        <label for="status">Status:</label>
        <select name="status" id="" class="custom-select">
            @if (isset($account))

            @switch($account->status)
                @case('Inativo')
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo" selected>Inativo</option>
                    @break
                @default
                <option value="Ativo" selected>Ativo</option>
                <option value="Inativo">Inativo</option>
            @endswitch

            @else
                <option value="Ativo">Ativo</option>
                <option value="Inativo">Inativo</option>
            @endif

        </select>
    </div>
</div>
<div class="row mt-1">
    <div class="col-12 col-sm-12 col-lg-12">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="" value="{{ $account->descricao ?? old('descricao')  }}" class="form-control" placeholder="Descrição da Conta" required>
        @error('descricao')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="row mt-1">
    <div class="col-12 col-sm-6 col-lg-6">
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="" class="custom-select">
            @if (isset($account))
                @switch($account->tipo)
                    @case('Despesa')
                        <option value="Receita">Receita</option>
                        <option value="Despesa" selected>Despesa</option>
                        @break
                    @default
                        <option value="Receita" selected>Receita</option>
                        <option value="Despesa">Despesa</option>
                @endswitch
            @else
                <option value="">Escolha um tipo</option>
                <option value="Receita">Receita</option>
                <option value="Despesa">Despesa</option>
            @endif

        </select>
        @error('tipo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-12 col-sm-6 col-lg-6">
        <label for="parente">Pertence à:</label>
        <select name="pertence" class="custom-select">
            @if (isset($account))
                @foreach ($grupo_selected as $g)
                @switch($g)
                    @case('')
                        <option>Nenhum</option>
                        @break
                    @default
                    <option value=''>Nenhum</option>
                    <option value="{{ $g->pertence }}" selected>{{ $g->descricao}}</option> 
                @endswitch
                    
                @endforeach
            @endif
            @foreach ($grupo as $g)
                <option>Nenhum</option>
                <option value="{{ $g->pertence }}">{{ $g->descricao }}</option>
            @endforeach
            
        </select>
        @error('pertence')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="hidden" name="operador_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="operador_nome" value="{{ Auth::user()->name }}">
    </div>
</div>


<div class="row mt-2">
    <div class="col-12">
        <button type="submit" class="btn btn-danger">Gravar</button>
        <a href="{{ route('account.new') }}" class="btn btn-secondary">Novo</a>
    </div>
</div>
