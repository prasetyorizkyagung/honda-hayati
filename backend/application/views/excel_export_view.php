<html>
<head>
    <title>Export Booking</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
 <div class="container box">
  <h3 align="center">Export Laporan Harian Booking Service</h3>
  <br />
  <div class="table-responsive">
   <table class="table table-bordered">
    <tr>
    <th>id</th>
     <th>Nama Konsumen</th>
      <th>Plat Nomor</th>
      <th>No Telp</th>
      <th>Nama Mtr</th>
      <th>Jenis Service</th>
      <th>Tgl Booking</th>
      <th>Jam Booking</th>
      <th>Activied</th>
    </tr>
    <?php
    foreach($export as $row)
    {
     echo '
     <tr>
      <td>'.$row->id.'</td>
      <td>'.$row->nama_konsumen.'</td>
      <td>'.$row->plat_nomor.'</td>
      <td>'.$row->no_telp.'</td>
      <td>'.$row->nama_mtr.'</td>
      <td>'.$row->jenis_service.'</td>
      <td>'.$row->tgl_booking.'</td>
      <td>'.$row->jam_booking.'</td>
      <td>'.$row->activated.'</td>
     </tr>
     ';
    }
    ?>
   </table>
   <div align="center">
    <form method="post" action="<?php echo base_url(); ?>excel_export/action">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>
   <br />
   <br />
  </div>
 </div>
</body>
</html>