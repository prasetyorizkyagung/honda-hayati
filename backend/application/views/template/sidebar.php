<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Navigation</li>
        <li>
          <a href="<?php echo site_url('Admin')?>">
            <i class="glyphicon glyphicon-home"></i> <span>Halaman Utama</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Artikel &amp; Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('products')?>"><i class="fa fa-circle-o"></i> Products</a></li>
            <li><a href="<?php echo site_url('safety_riding')?>"><i class="fa fa-circle-o"></i> Safety Riding</a></li>
            <li><a href="<?php echo site_url('sales_promotion')?>"><i class="fa fa-circle-o"></i> Sales Promotion</a></li>
            <li><a href="<?php echo site_url('corporate')?>"><i class="fa fa-circle-o"></i> Corporate</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-equalizer"></i>
            <span>Jaringan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('dealer')?>"><i class="fa fa-circle-o"></i> Dealer</a></li>
            <li><a href="<?php echo site_url('ahass')?>"><i class="fa fa-circle-o"></i> AHASS</a></li>
          </ul>
        </li>
        <!-- <li>
          <a href="<?php echo site_url('motorcycle') ?>">
            <i class="fa fa-motorcycle"></i> <span>Motor</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> -->
        <li>
          <a href="<?php echo site_url('Konsumen_admin')?>">
            <i class="fa fa-users"></i> <span>Konsumen</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="header">Kelola Admin &amp; Bengkel</li>
        <li><a href="<?php echo site_url('users')?>"><i class="fa fa-circle-o text-red"></i> <span>Users</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->