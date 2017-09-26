<section id="error" class="container">
        <h1 style="margin-top:0px" align="center">Booking <?php echo $button ?></h1><hr>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="varchar">Nama Konsumen <?php echo form_error('nama_konsumen') ?></label>
                <input type="text" class="form-control" name="nama_konsumen" id="nama_konsumen" placeholder="Nama Konsumen" value="<?php echo $this->session->userdata('nama_konsumen'); ?>" />
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
          <button type="submit" class="btn btn-danger"><?php echo $button ?></button> 
        <a href="<?php echo site_url('site') ?>" class="btn btn-success">Cancel</a>
      </form>
    </section><!--/#error-->