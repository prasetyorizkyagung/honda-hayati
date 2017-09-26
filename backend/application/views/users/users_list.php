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
                <?php echo anchor(site_url('users/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('users/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
                    <td width="20px"><?php echo ++$start ?></td>
                    <td><?php echo $users->nama ?></td>
                    <td><?php echo $users->username ?></td>
                    <td><?php echo $users->no_telp ?></td>
                    <td><?php echo $users->email ?></td>
                    <td><?php echo $users->status ?></td>
                    <td style="text-align:center" width="220px">
                        <?php 
                        echo anchor(site_url('users/read/'.$users->id),'Read',['class'=>'btn btn-sm btn-primary']); 
                        echo ' | '; 
                        echo anchor(site_url('users/update/'.$users->id),'Update',['class'=>'btn btn-sm btn-success']); 
                        echo ' | '; 
                        echo anchor(site_url('users/delete/'.$users->id),'Delete',['class'=>'btn btn-sm btn-danger',
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
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->