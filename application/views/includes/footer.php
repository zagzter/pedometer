</div>
</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/jquery.min.js') ;?>"></script>
<script src="<?php echo base_url('assets/libraries/bootstrap/js/bootstrap.min.js') ;?>"></script>
<script src="<?php echo base_url('assets/js/moment.min.js') ;?>"></script>
<script src="<?php echo base_url('assets/libraries/daterangerpicker/daterangepicker.js') ;?>"></script>
<script src="<?php echo base_url('assets/libraries/morris/morris.min.js') ;?>"></script>
<script src="<?php echo base_url('assets/js/raphael.min.js') ;?>"></script>
<script src="<?php echo base_url('assets/libraries/toastr/toastr.min.js') ;?>"></script>
<script src="<?php echo base_url('assets/js/script.js') ;?>"></script>

<script>
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>

<?php if ($this->session->flashdata('error')) : ?>
<script>
  toastr["error"]('<?php echo $this->session->flashdata('error'); ?>');
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('success')) : ?>
<script>
  toastr["success"]('<?php echo $this->session->flashdata('success') ;?>')
</script>
<?php endif; ?>

</body>
</html>