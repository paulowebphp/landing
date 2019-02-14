<?php 

require_once('header.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Últimos E-mails
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">E-mails</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista</h3>
            <a href="#" class="btn btn-xs pull-right btn-success" data-toggle="modal" data-target="#modal-create"><i class="fa fa-download"></i> Download XLSX</a>
        </div>  
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>E-mail</th>
                    <th>Nome</th>
                    <th style="min-width: 134px;">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach( $emails as $email ): ?>
                    <tr>
                        <td><?php echo $i++; ?>.</td>
                        <td><?php echo $email['desemail']; ?></td>
                        <td><?php echo $email['desname']; ?></td>
                        
                        <td>
                            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-update"><i class="fa fa-pencil"></i> Editar</button>&nbsp;
                            <button type="button" class="btn btn-xs btn-warning btn-update" data-toggle="modal" data-target="#modal-update-password">
                                <i class="fa fa-lock"></i> Alterar Senha</button>&nbsp;
                            <button type="button" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Excluir</button>
                          </td>
                          
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-update-password">
    <div class="modal-dialog">
      <div class="modal-content" style="border-top: 3px solid #f39c12;">
        <form method="post">
          <input type="hidden" name="id">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Alterar Senha</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputPassword">Nova Senha</label>
              <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
            <div class="form-group">
              <label for="inputPasswordConfirm">Confirmar Senha</label>
              <input type="password" class="form-control" id="inputPasswordConfirm" name="passwordConfirm">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning">Salvar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
  <div class="modal fade" id="modal-create">
    <div class="modal-dialog">
      <div class="modal-content" style="border-top: 3px solid #00a65a;">
        <form method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Nova Usuário</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputNameCreate">Nome</label>
              <input type="text" class="form-control" id="inputNameCreate" name="name">
            </div>
            <div class="form-group">
              <label for="inputEmailCreate">E-mail</label>
              <input type="email" class="form-control" id="inputEmailCreate" name="email">
            </div>
            <div class="form-group">
              <label for="inputPasswordCreate">Senha</label>
              <input type="password" class="form-control" id="inputPasswordCreate" name="password">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
  <div class="modal fade" id="modal-update">
    <div class="modal-dialog">
      <div class="modal-content" style="border-top: 3px solid #00c0ef;">
        <form method="post">
          <input type="hidden" name="id">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Editar Usuário</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputNameUpdate">Nome</label>
              <input type="text" class="form-control" id="inputNameUpdate" name="name">
            </div>
            <div class="form-group">
              <label for="inputEmailUpdate">E-mail</label>
              <input type="email" class="form-control" id="inputEmailUpdate" name="email">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info">Salvar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<?php 

require_once('footer.php');

?>
