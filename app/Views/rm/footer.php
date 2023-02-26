  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        ©
        <script>
          document.write(new Date().getFullYear());
        </script>
        , Developed By Team 3
      </div>
    </div>
  </footer>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?php echo base_url(); ?>/public/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="<?php echo base_url(); ?>/public/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?php echo base_url(); ?>/public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="<?php echo base_url(); ?>/public/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="<?php echo base_url(); ?>/public/assets/js/dashboards-analytics.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>


  <script>
    $(document).ready(function() {
      var table = $('#datatable').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf']
      });

      table.buttons().container()
        .appendTo('#datatable_wrapper .col-md-6:eq(0)');
    });
  </script>
  <!-- endbuild -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>

  </html>