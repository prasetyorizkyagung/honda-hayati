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
                <label for="varchar">Nama Konsumen <?php echo form_error('nama_konsumen') ?></label>
                <input type="text" class="form-control" name="nama_konsumen" id="nama_konsumen" placeholder="Nama Konsumen" value="<?php echo $nama_konsumen; ?>" />
            </div>
          <div class="form-group">
                <label for="varchar">Plat Nomor <?php echo form_error('plat_nomor') ?></label>
                <input type="text" class="form-control" name="plat_nomor" id="plat_nomor" placeholder="Plat Nomor" value="<?php echo $plat_nomor; ?>" />
            </div>
          <div class="form-group">
                <label for="varchar">No Telp <?php echo form_error('no_telp') ?></label>
                <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
            </div>
          <div class="form-group">
                <label for="varchar">Nama Mtr <?php echo form_error('nama_mtr') ?></label>
                <input type="text" class="form-control" name="nama_mtr" id="nama_mtr" placeholder="Nama Mtr" value="<?php echo $nama_mtr; ?>" />
            </div>
          <div class="form-group">
                <label for="varchar">Jenis Service <?php echo form_error('jenis_service') ?></label>
                <select class="form-control" name="jenis_service" id="jenis_service" placeholder="Status" value="<?php echo $jenis_service; ?>">
                  <option value="service berkala">Service Berkala</option>
                  <option value="service berat">Service Berat</option>
                  <option value="penggantian spare part">Penggantian Spare Part</option>
              </select>
            </div>
          <div class="form-group">
                <label for="date">Tgl Booking <?php echo form_error('tgl_booking') ?><?php echo $this->session->userdata('info') <> '' ? $this->session->userdata('info') : ''; ?></label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_booking" class="form-control pull-right" id="datepicker" value="<?php echo $tgl_booking; ?>" />
                </div>            
          </div>
          <div class="form-group">
                <label for="time">Jam Booking <?php echo form_error('jam_booking') ?><?php echo $this->session->userdata('jam') <> '' ? $this->session->userdata('jam') : ''; ?></label>
                <select class="form-control" name="jam_booking" id="jam_booking" placeholder="Status" value="<?php echo $jam_booking; ?>">
                    <!-- <?php
                      // if ($time == []) {
                      //   echo "<option>Booking sudah penuh</option>";
                      // } else {
                      //   foreach ($time as $asd) {
                      //     if ($asd->time_booking == 8) {
                      //       $zxc = "08.00";
                      //     } else if ($asd->time_booking == 9) {
                      //       $zxc = "09.00";
                      //     }
                      //     echo "<option value='".$asd->time_booking."'>".$zxc."</option>";
                      //   }
                      // }
                    ?> -->
                    <option value="08:00:00">08:00</option>
                    <option value="09:00:00">09:00</option>
                    <option value="10:00:00">10:00</option>
                    <option value="11:00:00">11:00</option>
                    <option value="11:00:00">12:00</option>
                    <option value="11:00:00">13:00</option>
                    <option value="11:00:00">14:00</option>
                    <option value="11:00:00">15:00</option>
                </select>
                <!-- <input type="text" class="form-control" name="jam_booking" id="jam_booking" placeholder="Jam Booking" value="<?php echo $jam_booking; ?>" /> -->
            </div>
          <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
          <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
          <a href="<?php echo site_url('booking') ?>" class="btn btn-default">Cancel</a>
      </form>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box