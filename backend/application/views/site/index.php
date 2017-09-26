<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Products List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
				<tr>
				  <th>No</th>
				  <th>Judul</th>
				  <th>Tanggal upload</th>
				  <th>Keterangan</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
					<?php 
						$no =1;
						foreach($products_data as $products)
						{
					?>
					<td><?php echo $no++; ?></td>
					<td><?php echo $products->judul; ?></td>
					<td><?php echo $products->tgl_upload ?></td>
					<td>
						<?php 
							$limit = $products->ket_products;
							echo wordlimit($limit); 
						?>
									
					</td>
				</tr>
					<?php
					}
				?>

				<?php
					function wordlimit($text, $limit=100){
						if(strlen($text) > $limit)
							$word = mb_substr($text,0,$limit-3)."...";
						else
							$word = $text;

						return $word;
					}
				?>
			  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo site_url('Products')?>"><button  class='panel_toolbox btn btn-sm btn-primary'>Read More</button></a>
            </div>
          </div>
          <!-- /.box -->

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Sales Promotion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
				<tr>
				  <th>No</th>
				  <th>Judul</th>
				  <th>Tanggal upload</th>
				  <th>Keterangan</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
					<?php 
						$no =1;
						foreach($sales_promotion_data as $sales_promotion)
						{
					?>
					<td><?php echo $no++; ?></td>
					<td><?php echo $sales_promotion->judul; ?></td>
					<td><?php echo $sales_promotion->tgl_upload ?></td>
					<td>
						<?php 
							$limit = $sales_promotion->ket_sales_promotion;
							echo wordlimit($limit); 
						?>
									
					</td>
				</tr>
					<?php
					}
				?>
			  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo site_url('Sales_promotion') ?>"><button  class='panel_toolbox btn btn-sm btn-primary'>Read More</button></a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Safety Riding</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
				<tr>
				  <th>No</th>
				  <th>Judul</th>
				  <th>Tanggal upload</th>
				  <th>Keterangan</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
					<?php 
						$no =1;
						foreach($safety_riding_data as $safety_riding)
						{
					?>
					<td><?php echo $no++; ?></td>
					<td><?php echo $safety_riding->judul; ?></td>
					<td><?php echo $safety_riding->tgl_upload ?></td>
					<td>
						<?php 
							$limit = $safety_riding->ket_safety_riding;
							echo wordlimit($limit); 
						?>
									
					</td>
				</tr>
					<?php
					}
				?>
			  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo site_url('Safety_riding')?>"><button  class='panel_toolbox btn btn-sm btn-primary'>Read More</button></a>
            </div>
          </div>
          <!-- /.box -->

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Corporate</h3>
            </div>
             <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
				<tr>
				  <th>No</th>
				  <th>Judul</th>
				  <th>Tanggal upload</th>
				  <th>Keterangan</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
					<?php 
						$no =1;
						foreach($corporate_data as $corporate)
						{
					?>
					<td><?php echo $no++; ?></td>
					<td><?php echo $corporate->judul; ?></td>
					<td><?php echo $corporate->tgl_upload ?></td>
					<td>
						<?php 
							$limit = $corporate->ket_corporate;
							echo wordlimit($limit); 
						?>
									
					</td>
				</tr>
					<?php
					}
				?>
			  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo site_url('Corporate')?>"><button  class='panel_toolbox btn btn-sm btn-primary'>Read More</button></a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Motor</h3>
            </div>
            <!-- /.box-header 
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Motor</th>
                      <th>Jenis Motor</th>
                      <th>Gambar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <?php 
                        $no =1;
                        foreach($motorcycle_data as $motorcycle)
                        {
                      ?>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $motorcycle->nama_mtr; ?></td>
                      <td><?php echo $motorcycle->jenis_mtr ?></td>
                      <?php if (empty($motorcycle->gambar)) { ?>
                      <td><img style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt=""></td>
                      <?php }else {?>    
                          <td><img style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/motorcycle/" .$motorcycle->gambar);?>" alt=""></td>
                      <?php }?>
                    </tr>
                      <?php
                      }
                    ?>
                    </tbody>
              </table>
            </div>
            <!-- /.box-body 
            <div class="box-footer clearfix">
              <a href="<?php echo site_url('motorcycle') ?>"><button  class='panel_toolbox btn btn-sm btn-primary'>Read More</button></a>
            </div>
          </div>
          <!-- /.box
        </div>
      </div> -->

    <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Dealer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>No Telp</th>
                      <th>Kota</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <?php 
                        $no =1;
                        foreach($dealer_data as $dealer)
                        {
                      ?>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $dealer->nama_dealer; ?></td>
                      <td><?php echo $dealer->alamat ?></td>
                      <td><?php echo $dealer->no_telp ?></td>
                      <td><?php echo $dealer->kota ?></td>
                    </tr>
                      <?php
                      }
                    ?>
                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo site_url('dealer') ?>"><button  class='panel_toolbox btn btn-sm btn-primary'>Read More</button></a>
            </div>
          </div>
          <!-- /.box -->
          </div>
          <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">AHASS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>No Telp</th>
                      <th>Kota</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <?php 
                        $no =1;
                        foreach($ahass_data as $ahass)
                        {
                      ?>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $ahass->nama_ahass; ?></td>
                      <td><?php echo $ahass->alamat ?></td>
                      <td><?php echo $ahass->no_telp ?></td>
                      <td><?php echo $ahass->kota ?></td>
                    </tr>
                      <?php
                      }
                    ?>
                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo site_url('ahass') ?>"><button  class='panel_toolbox btn btn-sm btn-primary'>Read More</button></a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->