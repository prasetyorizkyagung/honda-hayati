
<!-- SELECT2 EXAMPLE -->
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $title;?> List</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
        <div class="col-md-12">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('booking/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('booking/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('booking'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-responsive" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama Konsumen</th>
                <th>Plat Nomor</th>
                <th>No Telp</th>
                <th>Nama Mtr</th>
                <th>Jenis Service</th>
                <th>Tgl Booking</th>
                <th>Jam Booking</th>
                <th>Activated</th>
                <th>Action</th>
            </tr><?php
            foreach ($booking_data as $booking)
            {
                ?>
                <tr>
                    <td width="20px"><?php echo ++$start ?></td>
                    <td><?php echo $booking->nama_konsumen ?></td>
                    <td><?php echo $booking->plat_nomor ?></td>
                    <td><?php echo $booking->no_telp ?></td>
                    <td><?php echo $booking->nama_mtr ?></td>
                    <td><?php echo $booking->jenis_service ?></td>
                    <td><?php echo $booking->tgl_booking ?></td>
                    <td><?php echo $booking->jam_booking ?></td>
                     <?php if($booking->activated=='') {?>
                        <td width="70px"><?php echo anchor(site_url('booking/app_booking/'.$booking->id),'activated',['class'=>'btn btn-sm btn-warning']);?></td>
                    <?php }else{?>
                        <td width="50px"><?php echo anchor(site_url('booking/btl_booking/'.$booking->id),'Batal',['class'=>'btn btn-sm btn-danger']);?></td>
                    <?php }?>
                    <td style="text-align:center" width="220px">
                        <?php 
                        echo anchor(site_url('booking/read/'.$booking->id),'Read',['class'=>'btn btn-sm btn-primary']); 
                        echo ' | '; 
                        echo anchor(site_url('booking/update/'.$booking->id),'Update',['class'=>'btn btn-sm btn-success']); 
                        echo ' | '; 
                        echo anchor(site_url('booking/delete/'.$booking->id),'Delete',['class'=>'btn btn-sm btn-danger',
                                                                           'onclick'=>'javasciprt: return confirm(\'Are You Sure ?\')']); 
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?> 
        </table>
        <div class="row">
            <div class="col-md-6">
                <?php echo anchor(site_url('Excel_export'),'Cetak Excel', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div></div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->