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
            <p style="margin-top: 3em">Periode : <?php echo $periode?></p>
        </div>
    </div>
    <div id="outtable">
    	<table>
            <thead>
                <tr>
                    <th width="10px">#</th>
                    <th width="100px">Kelas</th>
                    <th width="100px">Tanggal</th>
                    <th width="110px">Jam</th>
                    <th width="100px">Mata Pelajaran</th>
                    <th width="100px">Tentor</th>
                </tr>
            </thead>
            <tbody id="show_data">
                <?php
                    $nourut = 1;
                    foreach ($jadwal as $jadwal) {
                    ?>

                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $jadwal->NAMA_KELAS?></td>
                        <td><?php echo $jadwal->tanggal?></td>
                        <td><?php echo $jadwal->jam?></td>
                        <td><?php echo $jadwal->NAMA_MAPEL?></td>
                        <td><?php echo $jadwal->NAMA_TENTOR?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body></html>