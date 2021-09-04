@extends('/layouts/main')

@section('title','Atendimento ao Cliente')

@section('content')

    <h2 class="mb-4 text-gray-600">Customer Service</h2>
    <form action="#">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-8">
                 <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-secondary">Clientes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-danger">
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Idade</th>
                                    <th>Data.Cadastro</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>145.452.652-45</td>
                                    <td>18</td>
                                    <td>10/08/2021</td>
                                    <td>
                                        <a href="#" class="btn btn-danger">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>452.141.365-25</td>
                                    <td>63</td>
                                    <td>20/07/2020</td>
                                    <td>
                                        <a href="" class="btn btn-danger">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>033.143.893-37</td>
                                    <td>66</td>
                                    <td>12/01/2021</td>
                                    <td>
                                        <a href="" class="btn btn-danger">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- table -->
            </div>


        </div>
    </form>
    <!-- HTML to write -->
<a href="#" data-bs-toggle="tooltip" title="Some tooltip text!">Hover over me</a>

<!-- Generated markup by the plugin -->
<div class="tooltip bs-tooltip-top" role="tooltip">
  <div class="tooltip-arrow"></div>
  <div class="tooltip-inner">
    Some tooltip text!
  </div>
</div>

@endsection