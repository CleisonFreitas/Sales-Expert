<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
        ...
    </div>
    <div class="tab-pane fade show active" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
        <div class="card-header bg-gray-300">
            <h5 class="m-0 font-weight-bold text-secondary">Gerenciamento de Contas</h5>
        </div>
        <form action="{{route('posting.account.store')}}" method="POST" class="">
            @csrf
            <div class="row mt-3">
                <div class="col-12 col-sm-8 col-lg-3">
                    <label for="operador">Operador:</label>
                    <input type="text" name="operador" id="" value="{{ Auth::user()->name;}}" class="form-control" readonly>
                </div>
                <div class="col-12 col-sm-8 col-lg-3">
                    <label for="data">Data:</label>
                    <input type="date" name="lancamento" id="" value="{{ Date('Y-m-d') }}" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-lg-12">
                    <label for="caixa">Caixa:</label>
                    <select name="caixa_id" id="" class="custom-select">
                        @foreach ($accountbook as $accountbook)
                            <option value="{{ $accountbook->id }}">{{ $accountbook->id }} - {{ $accountbook->descricao }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-6 col-lg-6">
                    <label for="conta_id">Conta:</label>
                    <select name="conta_id" id="" class="custom-select">
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->descricao }} - ({{$account->tipo}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <label for="forma">Forma de Pagamento:</label>
                    <select name="form_pagamento_id" id="" class="custom-select">
                        @foreach ($paymethod as $paymethod)
                            <option value="{{$paymethod->id}}">{{$paymethod->descricao}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-sm-4 col-lg-3">
                    <label for="valor">Valor:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-dark">R$</button>
                        </div>
                        <input type="text" name="valor" id="valor" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="observacao">Observação:</label>
                    <textarea name="observacao" id="note" cols="30" rows="1" maxlength="255" class="form-control"></textarea>
                    <small class="text-form text-muted text-secondary">*Até 255 caractéres no máximo</small>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-danger">Gravar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>
            </div>
        </form>
    </div>
</div>
