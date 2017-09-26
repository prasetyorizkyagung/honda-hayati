<!-- SELECT2 EXAMPLE -->
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $title;?></h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
         <table class="table">
            <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
            <tr><td>Username</td><td><?php echo $username; ?></td></tr>
            <tr><td>No Telp</td><td><?php echo $no_telp; ?></td></tr>
            <tr><td>Email</td><td><?php echo $email; ?></td></tr>
            <tr><td>Status</td><td><?php echo $status; ?></td></tr>
            <tr><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->