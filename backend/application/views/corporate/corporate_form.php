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
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
        <div class="form-group">
            <label for="date">Tgl Upload <?php echo form_error('tgl_upload') ?></label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="tgl_upload" class="form-control pull-right" id="datepicker" value="<?php echo $tgl_upload; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="varchar">Gambar</label>
            <input type="file" name="gambar" id="gambar"/>
        </div>
      <div class="form-group">
            <label for="ket_corporate">Ket Corporate <?php echo form_error('ket_corporate') ?></label>
            <textarea class="form-control" placeholder="Place some text here" name="ket_corporate" id="ket_corporate"
                          style="width: 100%; height: 200px; resize: none"><?php echo $ket_corporate; ?></textarea>
        </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('products') ?>" class="btn btn-default">Cancel</a>
        </form>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->