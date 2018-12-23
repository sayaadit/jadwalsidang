  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="noczero.github.io">Zero Inside</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="<?php echo base_url('assets/Admin/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 --><!-- 
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url('assets/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/Admin/bower_components/bootstrap/js/collapse.js');?>"></script>
<script src="<?php echo base_url('assets/Admin/bower_components/bootstrap/js/transition.js');?>"></script>
<!-- FastClick -->
<!-- <script src="../plugins/fastclick/fastclick.min.js"></script> -->
<script src="<?php echo base_url('assets/Admin/plugins/fastclick/fastclick.min.js');?>"></script>

<!-- AdminLTE App -->
<!-- <script src="../dist/js/adminlte.min.js"></script> -->
<script src="<?php echo base_url('assets/Admin/dist/js/adminlte.min.js');?>"></script>


<!-- SlimScroll -->
<!-- <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<script src="<?php echo base_url('assets/Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>

<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<!-- <script src="docs.js"></script> -->
<script src="<?php echo base_url('assets/Admin/documentation/docs.js');?>"></script>

<script src="<?php echo base_url('assets/Admin/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/Admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>

<!-- Select -->
<script type="text/javascript" src="<?php echo base_url('assets/Admin/bower_components/bootstrap-select/js/bootstrap-select.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/Admin/bower_components/bootstrap-select/js/i18n/default-*.js');?>"></script>

<!-- time date picker -->
<script type="text/javascript" src="<?php echo base_url('assets/Admin/bower_components/moment/moment.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/Admin/bower_components/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js');?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url('assets/Admin/bower_components/bootstrap-datetimepicker-master/js/locales/bootstrap-datetimepicker.fr.js');?>" charset="UTF-8"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $(function () {
      $('#table_mahasiswa').DataTable()
      $('#table_dosen').DataTable()
      $('#table_jadwal_sidang').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      });
     
      $('#datetimepicker').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        startDate : '+1d',
        altField: '#input_jadwal'
        });
      $('#input_jadwal').change(function(){
          $('#datetimepicker').datetimepicker('setDate', $(this).val());
      });

       $('#datetimepicker_jadwal').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        startDate : '+1d'
                });



    });
 
  });

</script>
</body>
</html>