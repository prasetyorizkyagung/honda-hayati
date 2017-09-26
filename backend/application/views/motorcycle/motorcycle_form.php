<!-- SELECT2 EXAMPLE -->
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $title;?> - <?php echo $button;?></h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="varchar">Nama Mtr <?php echo form_error('nama_mtr') ?></label>
                <input type="text" class="form-control" name="nama_mtr" id="nama_mtr" placeholder="Nama Mtr" value="<?php echo $nama_mtr; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Jenis Mtr <?php echo form_error('jenis_mtr') ?></label>
                <select class="form-control" name="jenis_mtr" id="jenis_mtr" placeholder="Status" value="<?php echo $jenis_mtr; ?>">
                <option value="matic">Matic</option>
                <option value="sport">Sport</option>
                <option value="cub">CUB</option>
            </select>
            </div>
            <div class="form-group">
                <label for="varchar">Gambar</label>
                <input type="file" name="gambar" id="gambar"/>
            </div>
            <div class="form-group">
                <label for="keterangan">keterangan <?php echo form_error('keterangan') ?></label>
                <textarea class="form-control" placeholder="Place some text here" name="keterangan" id="keterangan"
                              style="width: 100%; height: 200px; resize: none"><?php echo $keterangan; ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('motorcycle') ?>" class="btn btn-default">Cancel</a>
        </form>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->