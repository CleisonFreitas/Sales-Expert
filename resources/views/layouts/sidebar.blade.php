<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center  " href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('image/logo.png') }}" class="rounded-circle " alt="logo" style="width:83%">
        </div>
        <div class="sidebar-brand-text mx-1 "><h5><span class="badge bg-secondary">Inter</h5></span></div>
        <div class="sidebar-brand-text mt-3"><h4><sub><span class="badge bg-danger">Note</span><sub></h4></div>
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
            <span>Área administrativa</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Painel de Cadastro:</h6>
                <a class="collapse-item" href="{{ route('company') }}">
                  <i class="fas fa-building mx-1"></i><span>Empresa</span>
                </a>
                <a class="collapse-item" href="{{ route('employer') }}">
                  <i class="fas fa-handshake mx-1"></i><span>Profissionais</span>
                </a>
                <a class="collapse-item" href="{{route('account.new')}}">
                    <i class="fas fa-file-invoice-dollar mx-1"></i>
                    <span>Contas</span>
                </a>
                <a class="collapse-item" href="{{ route('supplier') }}">
                    <i class="fas fa-store mx-1"></i><span>Fornecedores</span>
                </a>
                <a class="collapse-item" href="{{ route('services') }}">
                    <i class="fas fa-concierge-bell mx-1"></i><span>Serviços</span>
                </a>

                <a class="collapse-item" href="{{ route('payment_method') }}">
                    <i class="fas fa-money-bill-alt mx-1"></i>
                    <span>Formas.pagamento</span>
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
                <h6 class="collapse-header">Cadastro/Atendimentos:</h6>
                <a class="collapse-item" href="{{ route('customer') }}">
                    <i class="fas fa-users mx-2"></i>
                    Clientes
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
                <a class="collapse-item" href="{{route('posting.account')}}">
                    <i class="fas fa-receipt mx-2"></i>
                    Movimentações
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
