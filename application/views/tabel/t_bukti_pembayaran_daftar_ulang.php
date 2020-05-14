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
                                    <form action="<?php echo base_url('Bukti_Pembayaran/daftar_ulang')?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <input type="text" name="id_daftar_ulang" class="form-control" placeholder="Search......" autofocus/>
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
                                        <th>No Daftar Ulang</th>
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
                                        <td><?php echo $b->ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG?></td>
                                        <td><?php echo $b->ID_DAFTAR_ULANG; ?></td>
                                        <td><?php echo date("d-m-Y H:i:s",strtotime($b->TANGGAL_UPLOAD_BUKTI_PEMBAYARAN_DAFTAR_ULANG)) ?></td>
                                        <?php if($b->STATUS == '0'):?>
                                            <td style="color: orange">Menunggu konfirmasi</td>
                                        <?php elseif($b->STATUS == '1'):?>
                                            <td style="color: blue">Sudah dikonfirmasi</td>
                                        <?php else:?>
                                            <td style="color: red">Silahkan upload ulang bukti pembayaran, hapus terlebih dahulu jika ingin upload ulang</td>
                                        <?php endif;?>
                                        <td>
                                            <?php if($this->session->userdata('akses')=='admin'):?>
                                                <a class="btn btn-warning btn-sm" href="<?php echo base_url('Bukti_Pembayaran/download_/'.$b->ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG)?>">Lihat</a>
                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('Pembayaran_daftar_ulang/konfirmasi_pembayaran/'.$b->ID_DAFTAR_ULANG)?>">Konfirmasi</a>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url('Pembayaran_daftar_ulang/tolak/'.$b->ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG)?>">Tolak</a>
                                            <?php else:?>
                                                <?php if($b->STATUS == '1'):?>              
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('Pembayaran/cetak_bukti_pembayaran_siswa/'.$b->ID_DAFTAR_ULANG)?>" target="_blank">Download</a>
                                                <?php elseif($b->STATUS == '2'):?>
                                                    <a class="btn btn-danger btn-sm tombol_hapus" href="<?php echo base_url('Bukti_Pembayaran/hapus_/'.$b->ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG)?>">Upload Ulang</a>
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