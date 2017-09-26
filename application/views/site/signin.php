<section id="error" class="container">
	<?php
    if ($this->session->flashdata('info')) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong>
            <?php echo $this->session->flashdata('info'); ?>
        </div> 
    <?php } ?>
		<div class="row contact-wrap col-md-12"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form action="<?php echo $action; ?>" method="post">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="form-group">
                            <label>Username<?php echo form_error('username') ?></label>
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password<?php echo form_error('password') ?></label>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    </div>
                </form>
    </section><!--/#error-->