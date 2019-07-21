<footer class="container">
      <p>&copy; Bootstrap 4.0 2017-2018</p>
    </footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url(); ?>assets/select/select2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $(".chz-select").select2({
            placeholder: "Please Select"
        });
    });
</script>

  </body>
</html>