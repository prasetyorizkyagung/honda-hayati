<section id="error" class="container text-justify">
        <table class="table">
            <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
            <tr><td>Tgl Upload</td><td><?php echo $tgl_upload; ?></td></tr>
            <tr><td>Gambar</td><td><?php if (empty($gambar)) { ?>
                    <img src="<?php echo base_url("uploads/default.png");?>">
                    <?php }else {?>
                    <img class="img-responsive" src="<?php echo base_url("uploads/safety_riding/" .$gambar);?>" style="width: auto; height: auto;">
                    <?php }?></td></tr>
            <tr><td>Ket Safety Riding</td><td><?php echo $ket_safety_riding; ?></td></tr>
            <tr><td><a href="<?php echo site_url('safety_riding') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
        </table>
    </section><!--/#error-->