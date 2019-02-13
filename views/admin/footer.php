    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        <a target="_blank" href="https://www.hcode.com.br">Hcode</a>
      </div>
      <!-- Default to the left -->
      Projeto desenvolvido no curso online de JavaScript da Hcode Treinamentos.
    </footer>

  </div>

  <!-- jQuery 3 -->
  <script src="./../../public/admin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="./../../public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- PACE -->
  <script src="./../../public/admin/bower_components/PACE/pace.min.js"></script>
  <!-- SlimScroll -->
  <script src="./../../public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="./../../public/admin/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="./../../public/admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./../../public/admin/dist/js/demo.js"></script>
  <!-- page script -->
  <script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
      Pace.restart()
    })
    $('.ajax').click(function () {
      $.ajax({
        url: '#', success: function (result) {
          $('.ajax-content').html('<hr>Ajax Request Completed !')
        }
      })
    })
  </script>

</body>

</html>