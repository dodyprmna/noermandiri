<!DOCTYPE html>
 <html><head>
    <title>Invoice</title>
  <style type="text/css">
  body{background:#efefef;font-family:arial;}
  #wrapshopcart{width:85%;margin:3em auto;padding:5px;background:#fff;box-shadow:0 0 0px #ddd;}
  h1{margin:0;padding:0;font-size:2.5em;font-weight:bold;}
  p{font-size:1.2em;margin:6;}
  table{margin:0em 0 0 0; border:8px solid #eee;width:100%; border-collapse: separate;border-spacing:0;}
  table th{background:#fafafa; border:none; padding:20px ; font-weight:normal;text-align:left;font-size: 1.5em}
  table td{background:#fff; border:none; padding:12px  20px; font-weight:normal;text-align:left; border-top:1px solid #eee;font-size: 1.2em}
  table tr.total td{font-size:1.5em;}
  .btnsubmit{display:inline-block;padding:10px;border:1px solid #ddd;background:#eee;color:#000;text-decoration:none;margin:2em 0;}
  form{margin:2em 0 0 0;}
  label{display:inline-block;width:auto;}
  input[type=text]{border:1px solid #bbb;padding:10px;width:30em;}
  textarea{border:1px solid #bbb;padding:10px;width:30em;height:5em;vertical-align:text-top;margin:0.3em 0 0 0;}
  .submitbtn{font-size:1.5em;display:inline-block;padding:10px;border:1px solid #ddd;background:#eee;color:#000;text-decoration:none;margin:0.5em 0 0 8em;};
   
  </style>
 </head><body>
  <div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
    <div class="row">
        <div class="col-md-12"><br>
        <center><img src="<?php echo $_SERVER['DOCUMENT_ROOT']."./LBBNoermandiri/assets/img/header_invoice1.png";?>" width="650" height="125"></center>
        </div>
    </div>

    <table>
        <tr>
          <th width="70%" style="background-color: #b3b3b3;color: #ffffff"><img src="<?php echo $_SERVER['DOCUMENT_ROOT']."./LBBNoermandiri/assets/img/lunas.png";?>" width="150" height="50" align="right"></th>
          <th align="right" width="30%" style="background-color: #b3b3b3;color: #ffffff"><strong>#<?= ucfirst($id);?></th></strong>
        </tr>
        <tr>
            <td>Nomer pendaftaran</td><td>: <?= ucfirst($no_pendaftaran);?></td>
        </tr>
        <tr>
            <td>Nama pegawai</td><td>: <?= ucfirst($pegawai);?></td>
        </tr>
        <tr>
            <td>Tanggal pembayaran</td><td>: <?= ucfirst($tanggal);?></td>
        </tr>
        <tr>
            <td>Total pembayaran</td><td>: Rp. <?= ucfirst($total);?></td>
        </tr>
    </table>
    
  </div>
 
 </body></html>
    <script src="<?= base_url('assets/js/sweetalert/sweetalert2.all.min.js')?>"></script>
    <script type="<?= base_url('assets/js/myscript.js')?>"></script>