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
            <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
            <tr><td>Tgl Upload</td><td><?php echo $tgl_upload; ?></td></tr>
            <tr><td>Gambar</td><td><?php if (empty($gambar)) { ?>
                    <img src="<?php echo base_url("../uploads/default.png");?>">
                    <?php }else {?>
                    <img src="<?php echo base_url("../uploads/corporate/" .$gambar);?>" style="width: 800px; height: 400px;">
                    <?php }?></td></tr>
            <tr><td>Ket Corporate</td><td><?php echo $ket_corporate; ?></td></tr>
            <tr><td><a href="<?php echo site_url('corporate') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->