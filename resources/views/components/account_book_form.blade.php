<div class="row mb-4 mt-2">
    <div class="col-12 col-sm-8 col-lg-3">
        <label for="dt_procedimento" class="col-form-label">Data:</label>
        <input type="date" name="dt_procedimento" id="" value="{{ Date('Y-m-d') }}" class="form-control" readonly>
    </div>
    <div class="col-12 col-sm-8 col-lg-2">
        <label for="hr_procedimento" class="col-form-label">Hora:</label>
        <input type="text" name="hora_aber" id="" value="{{ Date('H:i') }}" class="form-control" readonly>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-sm-12 col-lg-12">
        <label for="caixa">Caixa</label>
        <select name="caixa_id" id="" class="custom-select">
            @foreach ($account_reference as $reference)
                <option value="{{ $reference->id }}">{{ $reference->descricao }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
        <label for="dt_abertura">Data de Abertura:</label>
        <input type="date" name="data_aber" id="" value="{{date('Y-m-d')}}" class="form-control">
    </div>
    <div class="col-12 col-sm-6 col-lg-2">
        <label for="anual">Referência:</label>
        <input type="text" name="referencia" value="{{date('Y')}}" id="" class="form-control" readonly>
    </div>
</div>
