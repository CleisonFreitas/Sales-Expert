
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
                <div class="modal-body">Clique em "Deslogar" abaixo caso queira encerrar a sessão.</div>
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
    <script src="{{ asset('js/googleapi.js') }}"></script>

    <!-- Bootstrap core JavaScript-->

    <!-- Masks -->
    <script src="{{ asset('js/mascara.js') }}"></script>
    <script src="{{ asset('js/jquery.maskMoney.min.js') }}" type="text/javascript"></script>


    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/internote.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>

    

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
    <script src="{{ asset('js/popper.js') }}" ></script>
    <script src="{{asset('js/jsdeliver.js')}}"></script>

    @yield('js')


</body>
</html>
