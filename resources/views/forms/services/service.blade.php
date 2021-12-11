<div class="row mt-2">
    <div class="col-12 col-sm-3 col-lg-3">
        <label for="geracao">Cadastro:</label>
        <input type="date" name="dt_geracao" value="{{ date('Y-m-d') }}" id="" class="form-control">
        <input type="hidden" name="operador_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="operador" value="{{ Auth::user()->name }}">
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-sm-12 col-lg-12">
        <label for="descrição">Descrição:</label>
        <input type="text" name="descricao" value="{{ $service->descricao ?? old('descricao') }}" id="" class="form-control" placeholder="Descrição do Serviço">
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-sm-4 col-lg-3">
        <label for="status">Status:</label>
        <select name="status" id="" class="custom-select">
            @if (isset($service->status))
            <option value="{{ $service->status }}">{{ $service->status }}(Atual)</option>
            @endif
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
        </select>
    </div>
    <div class="col-12 col-sm-3 col-lg-3">
        <label for="valor">Valor:</label>
        @if (isset($service->descricao))
        <input type="text" name="valor" id="valor" value="{{$service->valor}}" class="form-control">
        @else
        <input type="text" name="valor" id="valor" value="" class="form-control">
        @endif

    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-sm-12 col-lg-12">
        <label for="observacao">Observação:</label>
        <textarea name="observacao" class="form-control" id="" cols="5" rows="5">{{ $service->observacao ?? old('observacao') }}</textarea>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <button type="submit" class="btn btn-danger">Gravar</button>
        <a href="{{ route('services') }}" class="btn btn-secondary">Novo</a>
    </div>
</div>
