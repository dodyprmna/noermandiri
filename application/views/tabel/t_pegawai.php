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
                            <a href="<?php echo base_url('Pegawai/tambah')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($peg as $pegawai) {
                                        $id = $pegawai->ID_PEGAWAI;
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++;?></td>
                                        <td><?php echo $pegawai->NAMA_PEGAWAI; ?></td>
                                        <td><?php echo $pegawai->ALAMAT_PEGAWAI; ?></td>
                                        <td><?php echo date("d-m-Y",strtotime($pegawai->TGL_LAHIR_PEG)) ?></td>
                                        <td><?php echo $pegawai->NOTELP_PEGAWAI; ?></td>
                                        <td><?php echo $pegawai->EMAIL; ?></td>
                                        <td><?php if($pegawai->STATUS == 1){?>
                                                <center><p style="color: orange"><i class="fa fa-check-circle fa-2x"></i></p></center>
                                            <?php } else {?>
                                                <center><p style="color: red"><i class="fa fa-times-circle fa-2x"></i></p></center>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php if($pegawai->STATUS == 1){?>
                                                <button type="button" class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>"><i class="fa fa-pencil-alt"></i></button>
                                            <?php } else {?>
                                                <button type="button" class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>" disabled><i class="fa fa-pencil-alt"></i></button>
                                            <?php }?>
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
                foreach($peg as $p):
                    $id = $p->ID_PEGAWAI;
                    $nama = $p->NAMA_PEGAWAI;
                    $alamat = $p->ALAMAT_PEGAWAI;
                    $tgl_lahir = $p->TGL_LAHIR_PEG;
                    $notelp = $p->NOTELP_PEGAWAI;
                    $email = $p->EMAIL;
                    $status = $p->STATUS;
            ?>
            <div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Pegawai</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url('Pegawai/update')?>" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>ID Pegawai</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Nama Pegawai</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Alamat Lengkap</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="alamat_edit" id="alamat_edit" value="<?php echo $alamat?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Tanggal Lahir</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" name="tgl_lahir_edit" id="tgl_lahir_edit" value="<?php echo $tgl_lahir?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Nomor Telepon</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="notelp_edit" id="notelp_edit" value="<?php echo $notelp?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="email" class="form-control" name="email_edit" id="email_edit" value="<?php echo $email?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Satus</label>
                                </div>
                                <div class="col-lg-7">
                                    <select class="form-control" name="status_edit" id="status_edit">
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
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <div class="login-horizental cancel-wp pull-left">
                                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah">Simpan</button> 
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
<script >
		
</script>