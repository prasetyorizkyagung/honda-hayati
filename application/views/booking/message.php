<section id="error" class="container text-center">
        <h1>Selamat</h1>
        <p>Akun anda telah melakukan booking nomor booking anda adalah :</p>
        <?php foreach ($booking_data as $booking) {
        ?>
        	<h1 style="color: red"><b>"<?php echo $booking->id; ?>"</b></h1>
        <?php }?>
    </section><!--/#error-->