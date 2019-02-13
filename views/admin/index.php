<?php 

require_once('header.php');
?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Início
        </h1>
        <ol class="breadcrumb">
          <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Lista de E-mails</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box" onclick="window.location.href = '/reservations'" style="cursor:pointer">
              <span class="info-box-icon bg-aqua">
                <i class="ion ion-ios-email"></i>
              </span>

              <div class="info-box-content">
                <span class="info-box-text">E-mails</span>
                <span class="info-box-number">90</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
 

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box" onclick="window.location.href = '#'" style="cursor:pointer">
              <span class="info-box-icon bg-green">
                <i class="fa fa-user"></i>
              </span>

              <div class="info-box-content">
                <span class="info-box-text">Usuários</span>
                <span class="info-box-number">3</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
 
        </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



<?php 

require_once('footer.php');

?>

