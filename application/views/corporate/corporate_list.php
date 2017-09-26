<section id="services" class="service-item" style="background: white;">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2 style="color: black;">Artikel Coprorate</h2>
            </div>

            <div class="row">
            	<?php 
            		foreach($corporate_data as $corporate)
					{
            	?>
				<div class="col-md-6 col-sm-6 col-xs-6">
            		<div class="panel" style="background:white;">
                		<div class="panel-body" style="height: 450px">                    
                   			<?php if (empty($corporate->gambar)) { ?>
			                    <img class="img-responsive" style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt="">
			                <?php }else {?>    
			                    <img class="img-responsive" style="width: 515px;height: 300px;" src="<?php echo base_url("uploads/corporate/" .$corporate->gambar);?>" alt="">
			                <?php }?>
                    		<p><h3><strong><?php echo $corporate->judul ?></strong></h3></p>
                    		<p><?php 
		                          $limits = $corporate->ket_corporate;
		                          echo wordlimit($limits);
		                      ?>
		                    </p>
                		</div>
                		<div class="panel-footer" align="center" style="background: white">
                            <?php echo anchor(site_url('corporate/read/'.$corporate->id),'Read',['class'=>'btn btn-block btn-primary']); ?>
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