<!DOCTYPE html>
<html><head>
	<title><?php echo $title?></title>
    <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:650px;
      border-radius: 5px;
      margin-top: 15px
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
            <center><h3 style="text-decoration: underline"><?php echo $judul?></h3></center>
        </div>
    </div>
    <div id="outtable">
    	<table>
            <thead>
                <tr>
                    <th width="10px">#</th>
                    <th width="100px">No. Induk</th>
                    <th width="170px">Nama</th>
                    <th width="170px">Alamat</th>
                    <th width="100px">Tanggal Lahir</th>
                </tr>
            </thead>
            <tbody id="show_data">
                <?php
                    $nourut = 1;
                    foreach ($siswa as $siswa) {
                    ?>

                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $siswa->NO_INDUK?></td>
                        <td><?php echo $siswa->NAMA_SISWA?></td>
                        <td><?php echo $siswa->ALAMAT_SISWA?></td>
                        <td><?php echo date("d-m-Y",strtotime($siswa->TGL_LAHIR_SISWA))?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body></html>