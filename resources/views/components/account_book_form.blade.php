<div class="row mt-2">
    <div class="col-12 col-sm-12 col-lg-12">
        <label for="caixa">Caixa</label>
        <input type="hidden" name="hora_aber" id="" value="{{ Date('H:i') }}" class="form-control" readonly>
        <select name="caixa_id" id="" class="custom-select">
            @foreach ($account_reference as $reference)
                <option value="{{ $reference->id }}">{{ $reference->descricao }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mt-2">
    @if ($caixa == 'A')
    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
        <label for="dt_abertura">Data de Abertura:</label>
        <input type="date" name="data_aber" id="" value="{{ Date('Y-m-d')}}" class="form-control" required>
    </div>
    @else
    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
        <label for="dt_abertura">Data de Fechamento:</label>
        <input type="date" name="data_fech" id="" value="{{ date('Y-m-d') }}" class="form-control" required>
    </div>
    <div class="col-12 col-sm-6 col-lg-2">
        <label for="valor">Valor:</label>
        <input type="text" name="valor" value="{{ number_format($valor_caixa,2,',','.') ?? 0.00}}" id="" class="form-control" readonly>
    </div>
    @endif
    <div class="col-12 col-sm-6 col-lg-2">
        <label for="anual">Referência:</label>
        <input type="text" name="referencia" value="{{date('Y')}}" id="" class="form-control" readonly>
    </div>
</div>
