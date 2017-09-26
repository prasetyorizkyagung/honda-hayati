<section id="services" class="service-item" style="background: white;">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2 style="color: black;">Artikel Sales Promotion</h2>
            </div>

            <div class="row">
            	<?php 
            		foreach($sales_promotion_data as $sales_promotion)
					{
            	?>
				<div class="col-md-6 col-sm-6 col-xs-6">
            		<div class="panel" style="background:white;">
                		<div class="panel-body" style="height: 450px">                    
                   			<?php if (empty($sales_promotion->gambar)) { ?>
			                    <img class="img-responsive" style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt="">
			                <?php }else {?>    
			                    <img class="img-responsive" style="width: 515px;height: 300px;" src="<?php echo base_url("uploads/sales_promotion/" .$sales_promotion->gambar);?>" alt="">
			                <?php }?>
                    		<p><h3><strong><?php echo $sales_promotion->judul ?></strong></h3></p>
                    		<p><?php 
		                          $limits = $sales_promotion->ket_sales_promotion;
		                          echo wordlimit($limits);
		                      ?>
		                    </p>
                		</div>
                		<div class="panel-footer" align="center" style="background: white">
                            <?php echo anchor(site_url('sales_promotion/read/'.$sales_promotion->id),'Read',['class'=>'btn btn-block btn-primary']); ?>
                        </div><hr>
            		</div>
        		</div>		
        		<?php } ?>
        		<?php
	              function wordlimit($text, $limit=100){
	                if(strlen($text) > $limit)
	                  $word = mb_substr($text,0,$limit-3).".....";
	                else
	                  $word = $text;

	                return $word;
	              }
	            ?>		                                             
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->