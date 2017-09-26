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
                <?php echo anchor(site_url('safety_riding/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('safety_riding/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('safety_riding'); ?>" class="btn btn-default">Reset</a>
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
                <th width="20px">No</th>
                <th>Judul</th>
                <th>Tgl Upload</th>
                <th>Gambar</th>
                <th>Ket Products</th>
                <th>Action</th>
            </tr><?php
            foreach ($safety_riding_data as $safety_riding)
            {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $safety_riding->judul ?></td>
                <td><?php echo $safety_riding->tgl_upload ?></td>
                <?php if (empty($safety_riding->gambar)) { ?>
                    <td><img style="width: 100px;height: 100px;" src="<?php echo base_url("../uploads/default.png");?>" alt=""></td>
                <?php }else {?>    
                    <td><img style="width: 100px;height: 100px;" src="<?php echo base_url("../uploads/safety_riding/" .$safety_riding->gambar);?>" alt=""></td>
                <?php }?>
                <td><?php 
                          $limits = $safety_riding->ket_safety_riding;
                          echo wordlimit($limits);
                      ?>
                </td>
                <td style="text-align:center" width="220px">
                    <?php 
                    echo anchor(site_url('safety_riding/read/'.$safety_riding->id),'Read',['class'=>'btn btn-sm btn-primary']); 
                    echo ' | '; 
                    echo anchor(site_url('safety_riding/update/'.$safety_riding->id),'Update',['class'=>'btn btn-sm btn-success']); 
                    echo ' | '; 
                    echo anchor(site_url('safety_riding/delete/'.$safety_riding->id),'Delete',['class'=>'btn btn-sm btn-danger',
                                                                           'onclick'=>'javasciprt: return confirm(\'Are You Sure ?\')']); 
                    ?>
                </td>
            </tr>
            <?php
            }
            ?>
            <?php
              function wordlimit($text, $limit=100){
                if(strlen($text) > $limit)
                  $word = mb_substr($text,0,$limit-3).".....";
                else
                  $word = $text;

                return $word;
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