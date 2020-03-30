<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?php echo $judul?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                </div>
                                <div class="col-md-6">
                                    <form action="<?php echo base_url('')?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" name="keyword" placeholder="Search...."/>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-primary" name="Tambah">Pilih</button> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Nama</center></th>
                                        <th><center>Alamat</center></th>
                                        <th><center>Telp Ortu</center></th>
                                        <th><center>Telp Siswa</center></th>
                                        <th><center>Asal Sekolah</center></th>
                                        <th><center>Status</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($murid as $siswa) {
                                    $id = $siswa->NOINDUK;
                                    ?>
                                    <tr>
                                        <td><center><?php echo $nourut++;?></center></td>
                                        <td><?php echo $siswa->NAMA_SISWA; ?></td>
                                        <td><?php echo $siswa->ALAMAT_SISWA; ?></td>
                                        <td><?php echo $siswa->NOTELP_ORTU_SISWA; ?></td>
                                        <td><?php echo $siswa->NOTELP_SISWA; ?></td>
                                        <td><?php echo $siswa->ASAL_SEKOLAH; ?></td>
                                        <td><?php if($siswa->STATUS_SISWA == 1){?>
                                                <center><p style="color: orange"><i class="fa fa-check-circle fa-2x"></i></p></center>
                                            <?php } else {?>
                                                <center><p style="color: red"><i class="fa fa-times-circle fa-2x"></i></p></center>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <center><button type="button" class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>"><i class="fa fa-pencil-alt"></i></button></center>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Edit-->
<?php
    foreach($murid as $s):
        $noinduk = $s->NOINDUK;
        $nama = $s->NAMA_SISWA;
        $alamat = $s->ALAMAT_SISWA;
        $tgl_lahir = $s->TGL_LAHIR_SISWA;
        $notelp = $s->NOTELP_SISWA;
        $telportu = $s->NOTELP_ORTU_SISWA;
        $status = $s->STATUS_SISWA;
?>
<div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Siswa</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Tentor/update')?>" method="POST">
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">No. Induk</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="noinduk_edit" id="noinduk_edit" value="<?php echo $noinduk?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">Nama Siswa</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">Alamat Lengkap</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="alamat_edit" id="alamat_edit" value="<?php echo $alamat?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">Tanggal Lahir</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="tgl_lahir_edit" id="tgl_lahir_edit" value="<?php echo $tgl_lahir?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">Nomor Telepon</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="notelp_edit" id="notelp_edit" value="<?php echo $notelp?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">No.Telepon Orang Tua</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="email_edit" id="email_edit" value="<?php echo $telportu?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="login2 pull-right pull-right-pro">Satus</label>
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control custom-select-value" name="status_edit" id="status_edit">
                            <?php if($status == 1){?>
                                <option value="0">Nonaktif</option>
                                <option value="1" selected>Aktif</option>
                            <?php }else{ ?>
                                <option value="0" selected>Nonaktif</option>
                                <option value="1" >Aktif</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="login-btn-inner">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <div class="login-horizental cancel-wp pull-left">
                                <button type="reset" class="btn btn-danger btn-fill pull-left" name="Batal">Batal</button>&nbsp;
                                <button type="submit" class="btn btn-primary btn-fill pull-right" name="Tambah">Simpan</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>