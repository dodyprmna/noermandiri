<!DOCTYPE html>
<html><head>
	<title><?php echo $title?></title>
    <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:650px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      font-color:#00000;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #00000
    }
  </style>
</head><body>
    <div class="row">
        <div class="col-md-12">
            <center><img src="<?php echo $_SERVER['DOCUMENT_ROOT']."./LBBNoermandiri/assets/img/header_invoice1.png";?>" width="650" height="125"></center>
        </div>
    </div><hr>
    <div class="row">
        <div class="col-md-12">
            <center><h3 style="text-decoration: underline">Laporan <?php echo $title?></h3></center>
            <p style="margin-top: 3em">Periode : <?php echo $periode1?> s/d <?php echo $periode2?></p>
        </div>
    </div>
    <div id="outtable">
        <h3 style="padding-top: -1em">Total <?php echo $title?> : <?php echo $total?></h3>
    </div>
    <div id="outtable">
    	<table>
            <thead>
                <tr>
                    <th width="150px">#</th>
                    <th width="300px">Nomer Pendaftaran</th>
                    <th width="150px">Jenjang Kelas</th>
                </tr>
            </thead>
            <!-- pendaftaran siswa baru -->
            <?php if($tabel == 'siswa baru'):?>
            <tbody id="show_data">
                <?php
                    $nourut = 1;
                    foreach ($pendaftaran as $reg) {
                    ?>

                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $reg->NO_PENDAFTARAN?></td>
                        <td><?php echo $reg->NAMA_JENJANG; ?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
            <!-- daftar ulang -->
            <?php elseif($tabel == 'daftar ulang'):?>
            <tbody id="show_data">
                <?php
                    $nourut = 1;
                    foreach ($pendaftaran as $reg) {
                    ?>

                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $reg->ID_DAFTAR_ULANG?></td>
                        <td><?php echo $reg->NAMA_JENJANG; ?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
            <!-- jadwal -->
            <?php else:?>
            <tbody id="show_data">
                <?php
                    $nourut = 1;
                    foreach ($pendaftaran as $reg) {
                        $id = $reg->NO_PENDAFTARAN;
                    ?>

                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $reg->NO_PENDAFTARAN?></td>
                        <td><?php echo $reg->NAMA_JENJANG; ?></td>
                        <td>Rp. <?php echo number_format($reg->TOTAL_TAGIHAN,2,',','.'); ?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
            <?php endif;?>
        </table>
    </div>
</body></html>