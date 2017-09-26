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
            <tr><td>Nama Konsumen</td><td><?php echo $nama_konsumen; ?></td></tr>
            <tr><td>Plat Nomor</td><td><?php echo $plat_nomor; ?></td></tr>
            <tr><td>No Telp</td><td><?php echo $no_telp; ?></td></tr>
            <tr><td>Nama Mtr</td><td><?php echo $nama_mtr; ?></td></tr>
            <tr><td>Jenis Service</td><td><?php echo $jenis_service; ?></td></tr>
            <tr><td>Tgl Booking</td><td><?php echo $tgl_booking; ?></td></tr>
            <tr><td>Jam Booking</td><td><?php echo $jam_booking; ?></td></tr>
            <tr><td>Activated</td><td><?php echo $activated; ?></td></tr>
            <tr><td><a href="<?php echo site_url('booking') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->