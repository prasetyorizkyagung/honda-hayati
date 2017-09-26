<section id="error" class="container text-justify">
        <table class="table">
            <tr><td>Nama Motor</td><td><?php echo $nama_mtr; ?></td></tr>
            <tr><td>Jenis Motor</td><td><?php echo $jenis_mtr; ?></td></tr>
            <tr><td>Gambar</td><td><?php if (empty($gambar)) { ?>
                    <img class="img-responsive" src="<?php echo base_url("uploads/default.png");?>">
                    <?php }else {?>
                    <img class="img-responsive" src="<?php echo base_url("uploads/motorcycle/" .$gambar);?>" style="width: auto; height: auto;">
                    <?php }?></td></tr>
            <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
            <tr><td><a href="<?php echo site_url('motor') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
        </table>
    </section><!--/#error-->