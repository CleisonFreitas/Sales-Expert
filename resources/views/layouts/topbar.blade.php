     <!-- Topbar -->
     <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-danger d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        @foreach ($company as $company)
        <h5 class="my-2 my-md-0 mw-100"><i class="far fa-building"></i>&nbsp;{{ $company->empr_nome }}</h5>
        @endforeach
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