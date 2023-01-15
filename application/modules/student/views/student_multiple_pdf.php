<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
  <meta http-equiv="Content-Style-Type" content="text/css" /> 
  <title>Kartu_Pembayaran_Mahasiswa</title>

  <style type="text/css">
  body {
    font-family: sans-serif;
  }
  @page {
    margin-top: 1.2cm;
    margin-bottom: 0.2cm;
    margin-left: 2cm; 
    margin-right: 0.3cm;
  } 
  .school{
    font-size: 9pt;
    font-weight: bold;
    text-align: center;
    padding-bottom: -10px;
    padding-top: -10px;
    /*width: 50%;*/
  }
  .address{
    font-size: 5pt;
    text-align: center;
    padding-bottom: -10px;
    /*width: 50%;*/
  }
  .phone{
    font-size: 5pt;
    text-align: center;
    font-style: italic;
    padding-bottom:-10px;
    /*width: 50%;*/
  }

  hr {
    border: none;
    height: 1px;
    /* Set the hr color */
    color: #333; /* old IE */
    background-color: #333; /* Modern Browsers */
  }

  .container {
    position: relative;
  }

  .topright {
    position: absolute;
  }

  .name{
    margin-left: 40px;
    font-size: 5.5pt;
  }
  .fieldset-auto-width {
   display: inline-block;
   width: 40%;
   border: 1px solid;
   padding-bottom: 5px;
   margin-bottom: 10px;
 }

</style>
</head>
<body>
  <?php
  $i=1;
   foreach ($student as $row) : ?>
  <fieldset class="fieldset-auto-width">
    <p class="school"><?php echo $setting_school['setting_value'] ?></p>
    <p class="address"><?php echo $setting_address['setting_value'].' - '.$setting_district['setting_value'].' - '.$setting_city['setting_value'] ?></p>
    <p class="phone">Telp. <?php echo $setting_phone['setting_value'] ?></p>
    <hr>
    <div class="container">
      <div class="topright">
        <?php if (!empty($row['mahasiswa_img'])) { ?>
        <img src="<?php echo upload_url('student/'.$row['mahasiswa_img']) ?>" style="height: 60px; width: 50px; border:1px solid;">
        <?php } else { ?>
        <img src="<?php echo media_url('img/missing.png') ?>" style="height: 60px; width: 50px; border:1px solid;">
        <?php } ?>
      </div>

      <table class="name">
        <tr>
          <td>NIM</td>
          <td>:</td>
          <td><?php echo $row['mahasiswa_nim'] ?></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><?php echo $row['mahasiswa_full_name'] ?></td>
        </tr>
        <tr>
          <td>Tempat, Tanggal Lahir</td>
          <td>:</td>
          <td><?php echo $row['mahasiswa_born_place'].', '.pretty_date($row['mahasiswa_born_date'],'d F Y',false) ?></td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td><?php echo $row['class_name'] ?></td>
        </tr>
         <?php if(majors()=='senior'){ ?>
        <tr>
          <td>Program Keahlian</td>
          <td>:</td>
          <td><?php echo $row['majors_name'] ?></td>
        </tr>
        <?php } ?>
      </table>

      <br>

      <img style="width:142.56pt;height:18pt;z-index:6;" src="<?php echo media_url().'/barcode_student/'.$row['mahasiswa_nim'].'.png' ?>" alt="Image_4_0" />
      <p style="font-size: 5pt;margin-left: 25%;margin-top:-0px;"><?php echo pretty_date(date('Y-m-d'),'d m Y',false) ?></p>

    </fieldset>
    <?php if ($i == 2): ?>
      <br>
    <?php $i=0; endif?>
  <?php $i++; endforeach ?>

  </body>
  </html>