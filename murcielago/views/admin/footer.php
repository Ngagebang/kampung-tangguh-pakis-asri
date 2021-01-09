<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <!-- <b>Ijin Onlen</b> 1.0.0 -->
      </div>
      <strong>Copyright &copy; <?php echo date('Y') ?> </strong> <a href="https://www.instagram.com/angger.23/">Angger Pangestu Ari</a> All rights
      reserved. | Pakis Asri
 - <b>Memory Used (<?php echo $this->benchmark->memory_usage();?>)</b>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/admin/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/admin/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/admin/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url('assets/admin/') ?>plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/admin/') ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url('assets/admin/') ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url('assets/admin/') ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/admin/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url('assets/admin/') ?>bower_components/PACE/pace.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/admin/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/admin/') ?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/admin/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/admin/') ?>dist/js/demo.js"></script>
<script type="text/javascript">
function pesanSukses(pesan){
  Swal.fire({
   type: 'success',
   title: 'Sukses !',
   text: pesan,
  })
}
function pesanSuksesReload(pesan){
  Swal.fire({
    title: "Sukses !",
    text: pesan,
    type: "success",
  }).then(function(){
   location.reload();
 });
}
function pesanGagal(pesan){
  Swal.fire({
   type: 'error',
   title: 'Gagal !',
   text: pesan,
  }).then(function(){
    $("#loadxc").load("<?php echo base_url('p/load_csrf') ?>");
 });
}
function pesanGagal2(pesan){
  Swal.fire({
   type: 'error',
   title: 'Opps !',
   text: pesan,
  })
}
	$(function () {
		$('.select2').select2()
		 //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    $('input[type="checkbox"].flat-redq, input[type="radio"].flat-redq').iCheck({
      checkboxClass: 'icheckbox_flat-green ',
      radioClass   : 'iradio_flat-green pendekq'
    })
    $('input[type="checkbox"].flat-redq1, input[type="radio"].flat-redq1').iCheck({
      checkboxClass: 'icheckbox_flat-green ',
      radioClass   : 'iradio_flat-green panjangq'
    })
	});
  $('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
  })
</script>
</body>
</html>
