<div class="card-body text-danger">
    <div class="card-header bg-gray-300">
        <h5 class="m-0 font-weight-bold text-secondary">Criar Caixa Financeiro</h5>
    </div>
    <form action="{{ route('account.reference.create') }}" method="POST">
        @csrf
        <div class="row mt-2">
            <div class="col">
                <label for="caixa">Novo caixa:</label>
                <input type="text" name="descricao" id="" class="form-control" placeholder="Ex: Caixa Vendas">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <button type="submit" class="btn btn-danger">Criar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </div>
        </div>
    </form>
</div>