<section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active img-responsive" style="height: 400px; background-image: url(<?php echo base_url('uploads/Tangkapan-layar.png')?>)"></div><!--/.item-->

                <div class="item img-responsive" style="height: 400px; background-image: url(<?php echo base_url('uploads/logo.jpg')?>)"></div><!--/.item-->

                <div class="item img-responsive" style="height: 400px; background-image: url(<?php echo base_url('uploads/honda-vario-150-esp.jpg')?>)"></div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

     <section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>Artikel Safety Riding</h2>
            </div>
            <div class="row">
                <?php 
                    foreach($safety_riding_data as $safety_riding)
                    {
                ?>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="panel" style="background:white;">
                        <div class="panel-body" style="height: 450px">                    
                            <a href="<?php echo site_url('safety_riding')?>"><?php if (empty($safety_riding->gambar)) { ?>
                                <img class="img-responsive" style=" width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt=""></a>
                            <?php }else {?>    
                               <a href="<?php echo site_url('safety_riding')?>"> <img class="img-responsive" style="width: 515px;height: 300px;" src="<?php echo base_url("uploads/safety_riding/" .$safety_riding->gambar);?>" alt=""></a>
                            <?php }?>
                            <p><h3><strong><?php echo $safety_riding->judul ?></strong></h3></p>
                            <p><?php 
                                  $limits = $safety_riding->ket_safety_riding;
                                  echo wordlimit($limits);
                              ?>
                            </p>
                        </div>
                        <!-- <div class="panel-footer" align="center" style="background: white">
                            <?php echo anchor(site_url('safety_riding/read/'.$safety_riding->id),'Read',['class'=>'btn btn-block btn-primary']); ?>
                        </div> -->
                    </div>
                </div>      
                <?php } ?>                                                
            </div><!--/.row-->
        </div>
    </section>

    <section id="feature" style="background: white;">
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Artikel Sales Promotion</h2>
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
                                <a href="<?php echo site_url('sales_promotion')?>"><img class="img-responsive" style=" width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt=""></a>
                            <?php }else {?>    
                                 <a href="<?php echo site_url('sales_promotion')?>"><img class="img-responsive" style="width: 515px;height: 300px;" src="<?php echo base_url("uploads/sales_promotion/" .$sales_promotion->gambar);?>" alt=""></a>
                            <?php }?>
                            <p><h3><strong><?php echo $sales_promotion->judul ?></strong></h3></p>
                             <p><?php 
                                  $limits = $sales_promotion->ket_sales_promotion;
                                  echo wordlimit($limits);
                              ?>
                            </p> 
                        </div>
                        <!-- <div class="panel-footer" align="center" style="background: white">
                            <?php echo anchor(site_url('sales_promotion/read/'.$sales_promotion->id),'Read',['class'=>'btn btn-block btn-primary']); ?>
                        </div> -->
                    </div>
                </div>      
                <?php } ?>                                                  
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Artikel Corporate</h2>
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
                                <a href="<?php echo site_url('corporate')?>"><img class="img-responsive" style=" width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt=""></a>
                            <?php }else {?>    
                                 <a href="<?php echo site_url('corporate')?>"><img class="img-responsive" style="width: 515px;height: 300px;" src="<?php echo base_url("uploads/corporate/" .$corporate->gambar);?>" alt=""></a>
                            <?php }?>
                            <p><h3><strong><?php echo $corporate->judul ?></strong></h3></p>
                             <p><?php 
                                  $limits = $corporate->ket_corporate;
                                  echo wordlimit($limits);
                              ?>
                            </p>
                        </div>
                        <!-- <div class="panel-footer" align="center" style="background: white">
                            <?php echo anchor(site_url('corporate/read/'.$corporate->id),'Read',['class'=>'btn btn-block btn-primary']); ?>
                        </div> -->
                    </div>
                </div>      
                <?php } ?>                                                  
            </div><!--/.row-->
            
        </div><!--/.container-->
    </section><!--/#recent-works-->

    <section id="services" class="service-item" style="background: white;">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>Artikel Products</h2>
            </div>

            <div class="row">
            	<?php 
            		foreach($products_data as $products)
					{
            	?>
				<div class="col-md-6 col-sm-6 col-xs-6">
            		<div class="panel" style="background:white;">
                		<div class="panel-body" style="height: 450px">                    
                   			<?php if (empty($products->gambar)) { ?>
			                    <a href="<?php echo site_url('products')?>"><img class="img-responsive" style=" width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt=""></a>
			                <?php }else {?>    
			                     <a href="<?php echo site_url('products')?>"><img class="img-responsive" style="width: 515px;height: 300px;" src="<?php echo base_url("uploads/products/" .$products->gambar);?>" alt=""></a>
			                <?php }?>
                    		<p><h3><strong><?php echo $products->judul ?></strong></h3></p>
                    		<p><?php 
		                          $limits = $products->ket_products;
		                          echo wordlimit($limits);
		                      ?>
		                    </p>
                		</div>
                		<!-- <div class="panel-footer" align="center" style="background: white">
                            <?php echo anchor(site_url('products/read/'.$products->id),'Read',['class'=>'btn btn-block btn-primary']); ?>
                        </div> -->
            		</div>
        		</div>		
        		<?php } ?>
        		<?php
	              function wordlimit($text, $limit=300){
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