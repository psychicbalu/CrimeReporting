
	<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../Others/Logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

	<script src="../../vendors/jquery/dist/jquery.min.js"></script>
	<script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>

	<script src="../../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<!--<script src="../../vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>-->

	<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../../assets/js/main.js"></script>
	
	<!-- Dashboard --->
    <script src="../../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/widgets.js"></script>
    <script src="../../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
	
	
	

	<!---- Data Table ----->
	
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../../assets/js/init-scripts/data-table/datatables-init.js"></script>
	
	
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
	
</body>
</html>
