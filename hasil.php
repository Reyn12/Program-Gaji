<?php
  error_reporting(0);
  $nama_lengkap = $_POST['nama'];
  $golongan = $_POST['golongan'];
  $anak = $_POST['jumlahanak'];
  $tunjangan_makan = $_POST['makan'];
  $tunjangan_transport = $_POST['transport'];
  $tunjangan_kesehatan = $_POST['kesehatan'];

  //menentukan variabel tunjangan
  $uang_makan = 300000;
  $uang_transport = 200000;
  $uang_kesehatan = 500000;

  // menentukan gaji pokok tiap golongan
  if ($golongan == "A" || $golongan == "a") {
  $gaji_pokok = 5000000;
  }
  if ($golongan == "B" || $golongan == "b") {
  $gaji_pokok = 6000000;
  }
  if ($golongan == "C" || $golongan == "c") {
  $gaji_pokok = 7000000;
    }

  //menghitung tunjangan untuk anak
  $tunjangan_anak = ($gaji_pokok * 0.1) * $anak;

  //menghitung tunjangan kerja
  $sub_tunjangan_kerja = 0;
  if(isset($tunjangan_makan)) {
  $sub_tunjangan_kerja = $sub_tunjangan_kerja + $uang_makan;
  }
  if(isset($tunjangan_transport)) {
  $sub_tunjangan_kerja = $sub_tunjangan_kerja + $uang_transport;
  }
  if(isset($tunjangan_kesehatan)) {
  $sub_tunjangan_kerja = $sub_tunjangan_kerja + $uang_kesehatan;
  }

  //menghitung total gaji
  $total_gaji = $gaji_pokok + $sub_tunjangan_kerja + $tunjangan_anak;

  //membuat format rupiah agar mudah dibaca
  function format_rupiah($curency){
    $rupiah = "Rp. ".number_format($curency,0,',','.');
    return $rupiah;
    }
?>

<!-- TAMPILAN LAYAR PHP -->
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 11</title>
    <link rel="stylesheet" href="w3.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  </head>
  <style>
    body{
    color: white;
    font-family: 'Poppins';
    background: #112942;
    }
    .data-karyawan{
    margin-top:10px;
    margin-bottom:10px;
    }
    .kalkulasi-gaji{
    margin-bottom: 40px;
    }
    .isi-web{
    width: 800px;
    }
  </style>
  <body>
    <div class="w3-container w3-blue">
      <center><h1 class="w3-h1">Gaji Karyawan</h1></center>
    </div>  
    <center>
        <div class="w3-container isi-web">
          <div class="w3-card-4 w3-round-large" style="background: #221270;">
            <h2 class="w3-h2"> <center>Data Karyawan</center> </h2>
          </div>
          <div class="w3-card-4 w3-round-large data-karyawan" style="background: #221270;">
            <table class="w3-table">
              <tr>
                <td>
                <p>Nama Lengkap </p>
                </td>
                <td><p>:</p></td>
                <td>
                <p> <?php echo "$nama_lengkap"?> </p>
                </td>
              </tr>
              <tr>
                <td>
                <p>Golongan </p>
                </td>
                <td><p>:</p> </td>
                <td>
                <p> <?php echo "$golongan"?> </p>
                </td>
              </tr>
              <tr>
                <td>
                <p>Jumlah Anak </p>
                </td>
                <td><p>:</p> </td>
                <td>
                <p><?php echo "$anak"?></p>
                </td>
              </tr>
              <tr style="margin-bottom: 10px;">
                <td>
                <p>Tunjangan </p>
                </td>
                <td><p>:</p></td>
                <td>
                <?php echo "$tunjangan_makan"?> <br>
                <?php echo "$tunjangan_transport"?> <br>
                <?php echo "$tunjangan_kesehatan"?> <br>
                </td>
              </tr>
            </table>
          </div>
          <div class="w3-card-2 ">
            <h2 class="w3-card-4 w3-round-large" style="background: #221270;"> <center>Slip Gaji</center> </h2>
          </div>
          <div class="w3-card-4 kalkulasi-gaji w3-round-large" style="background: #221270;">
            <table class="w3-table">
              <tr>
                <td><p>Gaji Pokok</p></td>
                <td><p>:</p></td>
                <td><p><?php echo format_rupiah($gaji_pokok)?></p></td>
              </tr>
              <tr>
                <td><p>Tunjangan Anak <br> <small>*10% gaji pokok bagi setiap anak</small></p></td>
                <td><p>:</p></td>
                <td><p><?php echo format_rupiah($tunjangan_anak)?></p></td>
              </tr>
              <tr>
                <td><p>Tunjangan Kerja</p></td>
                <td><p>:</p></td>
                <td>
                  <p>
                    <?php if(isset($tunjangan_makan)) {
                    echo $tunjangan_makan ," : ", format_rupiah($uang_makan);
                    }?> <br>
                    <?php if(isset($tunjangan_transport)) {
                    echo $tunjangan_transport ," : ", format_rupiah($uang_transport);
                    }?> <br>
                    <?php if(isset($tunjangan_kesehatan)) {
                    echo $tunjangan_kesehatan ," : ", format_rupiah($uang_kesehatan);
                    }?>
                  </p>
                </td>
              </tr>
            <tr>
              <td><p> Total Tunjangan Kerja</p></td>
             <td><p>:</p></td>
             <td><p><?php echo format_rupiah($sub_tunjangan_kerja)?></p></td>
            </tr>
            </table>
          <hr>
            <table class="w3-table">
              <tr>
                <td><p>Total Gaji <br> <small>*Gaji pokok + Total Tunjangan Kerja + Tunjangan
                Anak</small></p></td>
                <td><p>:</p></td>
                <td><p><?php echo format_rupiah($total_gaji)?></p></td>
              </tr>
            </table>
          </div>
        </div>
    </center>
  </body>
  </html>