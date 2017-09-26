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
            <tr><td>Nama Ahass</td><td><?php echo $nama_ahass; ?></td></tr>
            <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
            <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
            <tr><td>No Telp</td><td><?php echo $no_telp; ?></td></tr>
            <tr><td>Gambar</td>Gambar</td><td><?php if (empty($gambar)) { ?>
                          <img src="<?php echo base_url("../uploads/default.png");?>">
                          <?php }else {?>
                          <img src="<?php echo base_url("../uploads/jaringan/" .$gambar);?>" style="width: 200px; height: 200px;">
                          <?php }?></td></tr>
            <tr><td><a href="<?php echo site_url('ahass') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->