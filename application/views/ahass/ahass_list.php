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
                <h2>DAFTAR AHASS</h2>
                <p class="lead">PT. Hayati Pratama Mandiri selaku Main Dealer resmi Sepeda Motor Honda Sumatera Barat mempunyai 49 AHASS ( Bengkel Resmi ) yang tersebar diseluruh wilayah Sumatera Barat. Dari 49 AHASS tersebut, terdapat 5 AHASS cabang Hayati dan 44 AHASS Jaringan.</p>
            </div>

            <div class="row">
                <div class="features">
                	<?php 
            			foreach($ahass_data as $ahass)
						{
            		?>
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style="min-height: 200px;">
                        <div class="feature-wrap">
                            <div class="media testimonial-inner">
                            <div class="pull-left">
                                <?php if (empty($ahass->gambar)) { ?>
				                    <img class="img-responsive" style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/default.png");?>" alt="">
				                <?php }else {?>    
				                    <img class="img-responsive" style="width: 100px;height: 100px;" src="<?php echo base_url("uploads/jaringan/" .$ahass->gambar);?>" alt="">
				                <?php }?>
                            </div>
                            <div class="media-body">
                                <h2 style="color: black"><?php echo $ahass->nama_ahass;?></h2>
                                <span><?php echo $ahass->alamat;?></span>
                                <p>Phone : <?php echo $ahass->no_telp;?></p>
                            </div>
                         </div>
                        </div>
                    </div><!--/.col-md-4-->
                    <?php } ?>
                </div><!--/.services-->
            </div><!--/.row--> 
        </div><!--/.container-->
    </section><!--/#feature-->