<!-- SELECT2 EXAMPLE -->
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $title;?> </h3>

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
            <tr><td>Nama Mtr</td><td><?php echo $nama_mtr; ?></td></tr>
            <tr><td>Jenis Mtr</td><td><?php echo $jenis_mtr; ?></td></tr>
            <tr><td>Gambar</td><td><?php if (empty($gambar)) { ?>
                    <img src="<?php echo base_url("uploads/default.png");?>">
                    <?php }else {?>
                    <img src="<?php echo base_url("uploads/motorcycle/" .$gambar);?>" style="width: 400px; height: 400px;">
                    <?php }?></td></tr>
            <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
            <tr><td><a href="<?php echo site_url('motorcycle') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->