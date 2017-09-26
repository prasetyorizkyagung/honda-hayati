<style type="text/css">
	section{
 margin: 100px auto;
}

section img{
 border-radius: 100%;
 border: 1px solid #fff;
}
</style>
<section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>DAFTAR DEALER</h2>
                <p class="lead">PT. Hayati Pratama Mandiri selaku Main Dealer resmi Sepeda Motor Honda Sumatera Barat mempunyai 29 Dealer yang tersebar diseluruh wilayah Sumatera Barat. Dari 29 Dealer tersebut, terdapat 8 Dealer cabang Hayati dan 21 Dealer Jaringan.</p>
            </div>

            <div class="row">
                <div class="features">
                	<?php 
            			foreach($dealer_data as $dealer)
						{
            		?>
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style="min-height: 200px;">
                        <div class="feature-wrap">
                            <div class="media testimonial-inner">
                            <div class="pull-left">
                                <?php if (empty($dealer->gambar)) { ?>
				                    <img class="img-responsive" style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt="">
				                <?php }else {?>    
				                    <img class="img-responsive" style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/jaringan/" .$dealer->gambar);?>" alt="">
				                <?php }?>
                            </div>
                            <div class="media-body">
                                <h2 style="color: black"><?php echo $dealer->nama_dealer;?></h2>
                                <span><?php echo $dealer->alamat;?></span>
                                <p>Phone : <?php echo $dealer->no_telp;?></p>
                            </div>
                         </div>
                        </div>
                    </div><!--/.col-md-4-->
                    <?php } ?>
                </div><!--/.services-->
            </div><!--/.row--> 
        </div><!--/.container-->
    </section><!--/#feature-->