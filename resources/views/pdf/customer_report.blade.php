<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório - Clientes</title>

    <link href="{{ public_path('css/googleapi.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ public_path('css/internote.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ public_path('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Short Icon -->
    <link rel="shortcut icon" href="{{ public_path('icons/favicon.png') }}">
</head>
<body>
    @include('pdf.header')
    <div class="container mb-3 text-dark">
        <div class="row">
            <div class="col">
                <h1 style="text-align: center;" class="text-danger">Relatório de Clientes</h1>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="table-responsive">
            <table class="table" style="text-align: center;">
                <thead>
                    <tr>
                        <th><b>Nome:</b></th>
                        <th><b>Endereço:</b></th>
                        <th><b>Telefone:</b></th>
                        <th><b>Data de Nascimento:</b></th>
                    </tr>
                </thead>
                <tbody class="text-danger">
                    @foreach ($customers as $customer)
                    <tr>
                        <td><b>{{ $customer->name }}</b></td>
                        <td><b>{{ $customer->logradouro }},{{ $customer->numero }}</b></td>
                        <td><b>{{ $customer->ct_num }}</b></td>
                        <td><b>{{ date('d/m/Y',strtotime($customer->nascimento)) }}</b></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>






