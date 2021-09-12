<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SE - @yield('title')</title>

    <!-- Custom fonts for this template-->

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Short Icon -->
    <link rel="shortcut icon" href="{{ asset('icons/favicon.png') }}">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center  " href="#">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('image/logo.png') }}" class="rounded-circle img-fluid" alt="logo">
                </div>
                <div class="sidebar-brand-text mx-1 "><h5><span class="badge bg-secondary">Sales</h5></span></div>
                <div class="sidebar-brand-text mt-3"><h4><sub><span class="badge bg-danger">Expert</span><sub></h4></div>                    
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider ">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                  <i class="fas fa-home"></i>
                    <span>Início</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Principal
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-paste"></i>
                    <span>Área de Cadastro</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Painel de Cadastro:</h6>
                        <a class="collapse-item" href="{{ route('company') }}">
                          <i class="fas fa-building mx-1"></i><span>Empresa</span>
                        </a>
                        <a class="collapse-item" href="{{ route('employer') }}">
                          <i class="fas fa-handshake mx-1"></i><span>Funcionarios</span>
                        </a>
                        <a class="collapse-item" href="{{ route('supplier') }}">
                            <i class="fas fa-store mx-1"></i><span>Fornecedores</span>
                        </a>
                        <a class="collapse-item" href="{{ route('payment') }}">
                            <i class="far fa-money-bill-alt mx-1"></i>
                            Formas de Pagamento
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-friends"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cadastro de Clientes:</h6>
                        <a class="collapse-item" href="{{ route('customer') }}">
                            <i class="fas fa-users mx-2"></i>
                            Cadastrar
                        </a>
                        <a class="collapse-item" href="{{ route('customer_service') }}">
                            <i class="fas fa-hand-holding-heart mx-2"></i>
                            Atendimento
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gerência
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-cash-register"></i>
                    <span>Operações</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Financeiro:</h6>
                        <a class="collapse-item" href="{{route('account.book')}}">
                            <i class="fas fa-piggy-bank mx-2"></i>
                            Caixa
                        </a>
                        <a class="collapse-item" href="{{route('account.book')}}">
                            <i class="fas fa-wallet mx-2"></i>
                            Lançamentos
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRelatorios"
                    aria-expanded="true" aria-controls="collapseRelatorios">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Relatórios</span></a>
                    <div id="collapseRelatorios" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Relatórios:</h6>
                        <a class="collapse-item" href="{{route('archive.customer')}}">
                            <i class="fas fa-users mx-2"></i>
                            Clientes
                        </a>
                        <a class="collapse-item" href="{{route('payment.report')}}">
                            <i class="fas fa-search-dollar mx-2"></i>
                            Pagamentos
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column text-secondary">

            <!-- Main Content -->
            <div id="content" class="text-gray-700 bg-gray-200">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-danger d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h5 class="my-2 my-md-0 mw-100"><i class="far fa-building"></i>&nbsp;Clínica Virtude e Progresso</h5>

                    <!-- Topbar Search -->
                    <form action ="#" method="GET" 
                    class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-1 small" list="ContentList" 
                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <datalist id="ContentList">
                            <option value="Fornecedores">
                            <option value="Clientes">
                            <option value="Atendimento">
                            <option value="Pagamentos">
                            <option value="Resultados">
                          </datalist>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">             

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle rounded-circle " href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-800">{{ Auth::user()->name }}</span>
                                <img class="img-profile"
                                    src="{{ asset('image/undraw_profile.svg') }}">
                                    
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item text-gray-800" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-800"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item text-gray-800" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 "></i>
                                    Configurações
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-gray-800" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
                    <div class="container-fluid lead mb-4" >
                        <small>
                            @yield('content')
                        </small>
                    </div>
               
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer text-gray-700 shadow">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Weaver Systems &copy;  2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" abaixo caso queira encerrar a sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <a class="btn btn-primary" href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                         {{ __('Log Out') }}
                      </a>
                  </form>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          $("#btn1").click(function(){
            $("p").append(" <b>Appended text</b>.");
          });
        
          $("#btn2").click(function(){
            $("tbody").append("<tr><td>Skin Drainage</td><td><button type='button' class='btn btn-danger btn-sm btn-circle' id='rem'><i class='fas fa-minus'></i></button></td></tr>");
          });
        });
        $(document).ready(function(){
            $("button").click(function(){
            $("#div1").remove();
        });
        });
        </script>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Masks -->
    <script src="{{ asset('js/mascara.js') }}"></script>
    <script src="{{ asset('js/jquery.maskMoney.min.js') }}" type="text/javascript"></script>
    

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/charts/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/charts/chart-pie-demo.js') }}"></script>

    <!-- Datatables JS --> 
   
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    
    

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/datatables-demo.js') }}"></script>

    <!-- JS for boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>
    @if(session('sucesso'))
        <script>
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Procedimento realizado com sucesso!',
            showConfirmButton: false,
            timer: 1500
            })
        </script>
        @elseif ($errors->any())
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Erro ao tentar realizar procedimento!',
                })
            </script>
        @endif
</body>

</html>