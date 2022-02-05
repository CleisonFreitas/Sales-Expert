<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório - Dashboard</title>

    <link href="{{ public_path('css/googleapi.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ public_path('css/internote.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ public_path('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Short Icon -->
    <link rel="shortcut icon" href="{{ public_path('icons/favicon.png') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 style="text-align: center;">Relatório geral</h1>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><b>Descrição:</b></th>
                        <th><b>Quantidade:</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Aniversariantes</td>
                        <td>{{$aniversariantes}}</td>
                    </tr>
                    <tr>
                        <td>Atendimentos</td>
                        <td>{{count($atendimentos)}}</td>
                    </tr>
                    <tr>
                        <td>Entradas(Prevista)</td>
                        <td>R$ {{number_format($entradas,2,',','.')}}</td>
                    </tr>
                    <tr>
                        <td>Ganhos atuais</td>
                        <td>R$ {{number_format($arrecadacao,2,',','.')}}</td>
                    </tr>

                    <tr>
                        <td>Contas à Receber</td>
                        <td>R$ 400,00</td>
                    </tr>
                    <tr>
                        <td>Contas à Pagar</td>
                        <td>R$ 137,00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>






