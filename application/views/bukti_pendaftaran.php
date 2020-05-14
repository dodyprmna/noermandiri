<!DOCTYPE html>
 <html><head>
    <title>Invoice</title>
  <style type="text/css">
  body{background:#efefef;font-family:arial;}
  h1{margin:0;padding:0;font-size:2.5em;font-weight:bold;}
  p{font-size:14px;margin:6;}
  table{margin:0em 0 0 0; border:8px solid #eee;width:100%; border-collapse: separate;border-spacing:0;}
  table th{background:#fafafa; border:none; padding:20px ; font-weight:normal;text-align:left;font-size: 18px}
  table td{background:#fff; border:none; padding:12px  20px; font-weight:normal;text-align:left; border-top:1px solid #eee;font-size: 14px}
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
            <th align="right" width="30%" style="background-color: #b3b3b3;color: #ffffff"><strong>#<?= ucfirst($id);?></th></strong>
      </tr>
    </table>

    <table>
      <tr>
          <td>Nama</td><td>: <?= ucfirst($nama);?></td>
      </tr>
      <tr>
          <td>Alamat</td><td>: <?= ucfirst($alamat);?></td>
      </tr>
      <tr>
          <td>Nomer Telepon</td><td>: <?= ucfirst($telepon);?></td>
      </tr>
      <tr>
          <td>Asal Sekolah</td><td>: <?= ucfirst($sekolah);?></td>
      </tr>
      <tr>
          <td>Email</td><td>: <?= ucfirst($email);?></td>
      </tr>
      <tr>
          <td>Jenjang kelas</td><td>: <?= ucfirst($jenjang);?></td>
      </tr>

    </table>

    <table>
        <tr>
            <th width="70%">Keterangan</th><th width="30%">Biaya</th>
        </tr>
     
        <tr>
            <td>Biaya Registrasi</td><td>Rp. <?= ucfirst($biaya_regis);?></td>
        </tr>
        <tr>
            <td>Biaya Les</td><td>Rp. <?= ucfirst($biaya_les);?></td>
        </tr>

        <tr class=""><td ><b>Total</b></td><td><b>Rp. <?= ucfirst($total);?></b></td></tr>
    </table>   
    <br><br>
    <p>*harap segera melakukan pembayaran melalui transfer ke No.Rekening............./ bayar di tempat</p><br>
    <p>*untuk upload bukti transfer silahkan login menggunakan email sebagai username dan nomor telepon sebagai passwordnya</p><br>
    
  </div>
 
 </body></html>
    <script src="<?= base_url('assets/js/sweetalert/sweetalert2.all.min.js')?>"></script>
    <script type="<?= base_url('assets/js/myscript.js')?>"></script>