<section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>List Motor Terbaru</h2>
                <p class="lead">DAFTAR MOTOR TERBARU PRODUK HONDA</p>
            </div>

            <div class="row">
                <div class="features">
                   <?php 
                		foreach($motorcycle_data as $motorcycle)
                		{
                	?>   
                    <div class="col-md-3 col-sm-4">
			            <div class="panel" style="background: white">
			                <div class="panel-body">   
			                    <?php if(empty($motorcycle->gambar)){ ?>
			                    	<img class="img-responsive" style="width: 200px;height: 200px;" src="<?php echo base_url("uploads/default.png");?>" alt="">
			                    <?php }else{?>
			                    	<img class="img-responsive" style="width: 200px;height: 200px;" src="<?php echo base_url("uploads/motorcycle/" .$motorcycle->gambar);?>" alt="">
			                    <?php }?>
			                    <p><strong><?php echo $motorcycle->jenis_mtr;?></strong></p>
			                    <p><?php echo $motorcycle->nama_mtr;?></p>
			                </div>
			                <div class="panel-footer" align="center" style="background: white">
                            <?php echo anchor(site_url('motor/read/'.$motorcycle->id),'Read',['class'=>'btn btn-block btn-primary']); ?>
                        </div>
			            </div>
			        </div><!--/.col-md-4-->
			        <?php }?>
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->