@include('layouts.header')
    @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column text-secondary">

            <!-- Main Content -->
            <div id="content" class="text-gray-700 bg-gray-200">
                @include('layouts.topbar')

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
@include('layouts.footer')