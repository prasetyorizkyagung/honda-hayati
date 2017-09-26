<header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  (0751) 36796</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                        <a href="<?php echo base_url('konsumen')?>"><button class="btn btn-sm btn-danger">Register</button></a>
                        <a href="<?php echo base_url('site/signin')?>"><button class="btn btn-sm btn-danger">Sign in</button></a>
                        <a href="<?php echo base_url('site/signout')?>"><button class="btn btn-sm btn-danger">Sign Out</button></a>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?php echo base_url('uploads/LOGO-HPM.png')?>" width="100px" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url('site')?>">Home</a></li>
                        <li><a href="<?php echo site_url('site/about')?>">Tentang Kami</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Artikel &amp; Berita <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('products')?>">Products</a></li>
                                <li><a href="<?php echo site_url('sales_promotion')?>">Sales Promotion</a></li>
                                <li><a href="<?php echo site_url('safety_riding')?>">Safety Riding</a></li>
                                <li><a href="<?php echo site_url('corporate')?>">Corporate</a></li>
                            </ul>
                        </li>
                        <li><a href="http://www.astra-honda.com/product/">Motor</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jaringan <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('dealer')?>">Dealer</a></li>
                                <li><a href="<?php echo site_url('ahass')?>">AHASS</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo site_url('booking')?>">Booking</a></li> 
                        <!-- <li><a href="#">Contact</a></li>                         -->
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->