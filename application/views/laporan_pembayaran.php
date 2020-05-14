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
            <center><h3 style="text-decoration: underline"><?php echo $title?></h3></center>
            <p style="margin-top: 3em">Periode : <?php echo $periode1?> s/d <?php echo $periode2?></p>
        </div>
    </div>
    <div id="outtable">
        <h3 style="padding-top: -1em">Total : Rp.  <?php echo number_format($total->total,2,',','.')?></h3>
    </div>
    <div id="outtable">
    	<table>
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th width="100px">Nomer Pembayaran</th>
                    <th width="150px">Nama Pegawai</th>
                    <th width="150px">Tanggal</th>
                    <th width="100px">Nominal Bayar</th>
                </tr>
            </thead>
            <!-- pendaftaran siswa baru -->
            <?php if($tabel == 'pembayaran'):?>
            <tbody id="show_data">
                <?php
                    $nourut = 1;
                    foreach ($pendaftaran as $reg) {
                    ?>

                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $reg->ID_PEMBAYARAN?></td>
                        <td><?php echo $reg->NAMA_PEGAWAI; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($reg->TANGGAL_PEMBAYARAN))?></td>
                        <td><?php echo number_format($reg->TOTAL_PEMBAYARAN,2,',','.');?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
            <!-- daftar ulang -->
            <?php else:?>
            <tbody id="show_data">
                <?php
                    $nourut = 1;
                    foreach ($pendaftaran as $reg) {
                    ?>

                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $reg->ID_PEMBAYARAN_DAFTAR_ULANG?></td>
                        <td><?php echo $reg->NAMA_PEGAWAI; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($reg->TGL_PEMBAYARAN_DAFTAR_ULANG))?></td>
                        <td><?php echo number_format($reg->TOTAL_PEMBAYARAN_DAFTAR_ULANG,2,',','.'); ?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
            <?php endif;?>
        </table>
    </div>
</body></html>