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
                                <div class="col-lg-12">
                                    <form action="<?php echo base_url('Bukti_Pembayaran/siswa_baru')?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <input type="text" name="no_pendaftaran" class="form-control" placeholder="Search......" autofocus/>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="submit" class="btn btn-primary" name="submit"/>
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
                                        <th>No Bukti</th>
                                        <th>No Pendaftaran</th>
                                        <th>Tanggal Upload</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($bukti)>0):?>
                                    <?php
                                    foreach ($bukti as $b) {
                                    ?>
                                    <tr>
                                        <td><?php echo $b->ID_BUKTI_PEMBAYARAN?></td>
                                        <td><?php echo $b->NO_PENDAFTARAN; ?></td>
                                        <td><?php echo date("d-m-Y H:i:s",strtotime($b->TANGGAL_UPLOAD_BUKTI)) ?></td>
                                        <?php if($b->STATUS == '0'):?>
                                            <td style="color: orange">Menunggu konfirmasi</td>
                                        <?php elseif($b->STATUS == '1'):?>
                                            <td style="color: blue">Sudah dikonfirmasi</td>
                                        <?php else:?>
                                            <td style="color: red">Pembayaran ditolak, silahkan upload ulang bukti pembayaran dengan gambar yang jelas</td>
                                        <?php endif;?>
                                        <td>
                                            <?php if($this->session->userdata('akses')=='admin'):?>
                                                <a class="btn btn-warning btn-sm" href="<?php echo base_url('Bukti_Pembayaran/download/'.$b->ID_BUKTI_PEMBAYARAN)?>">Lihat</a>
                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('Pembayaran/konfirmasi_pembayaran/'.$b->NO_PENDAFTARAN)?>">Konfirmasi</a>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url('Pembayaran/tolak/'.$b->NO_PENDAFTARAN)?>">Tolak</a>
                                            <?php else:?>
                                                <?php if($b->STATUS == '1'):?>              
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('Pembayaran/cetak_bukti_pembayaran_siswa/'.$b->NO_PENDAFTARAN)?>" target="_blank">Download</a>
                                                <?php elseif($b->STATUS == '2'):?>
                                                    <a class="btn btn-danger btn-sm tombol_hapus" href="<?php echo base_url('Bukti_Pembayaran/hapus/'.$b->ID_BUKTI_PEMBAYARAN)?>">Upload Ulang</a>
                                                <?php else:?>
                                                <?php endif;?>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php else:?>
                                    <tr>
                                        <td colspan="5"><center>Data tidak ditemukan</center></td>
                                    </tr>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal Edit -->
<!-- <?php
    foreach($kelas as $k):
    $id = $k->ID_KELAS;
    $nama = $k->NAMA_KELAS;
?>
            <div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Data Kelas Kelompok Belajar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url('Kelas/update')?>" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>ID Ruangan</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Nama Ruangan</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <div class="login-horizental cancel-wp pull-left">
                                        <button type="reset" class="btn btn-danger btn-sm" class="close" data-dismiss="modal" aria-label="Close" name="Batal">Batal</button>&nbsp;
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
            <?php endforeach;?> -->