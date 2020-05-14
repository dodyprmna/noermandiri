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
                                <div class="col-md-5"></div>
                                <div class="col-md-7">
                                    <form action="<?php echo base_url('Pendaftaran/siswa_baru')?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" placeholder="Masukkan nomor pendaftaran" autocomplete="off" name="keyword" autofocus />
                                            </div>
                                            <div class="col-lg-1">
                                                <input class="btn btn-primary" type="submit" name="submit"/>
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
                                        <th>No</th>
                                        <th>No.Pendaftaran</th>
                                        <th>Jenjang Kelas</th>
                                        <th>Total Biaya</th>
                                        <th>Status Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = $start;
                                    foreach ($pendaftaran as $reg) {
                                        $id = $reg->NO_PENDAFTARAN;
                                    ?>
                                    <tr>
                                        <td><?php echo ++$nourut?></td>
                                        <td><?php echo $reg->NO_PENDAFTARAN?></td>
                                        <td><?php echo $reg->NAMA_JENJANG; ?></td>
                                        <td>Rp. <?php echo number_format($reg->TOTAL_TAGIHAN,2,',','.'); ?></td>
                                        <td>
                                            <?php if($reg->STATUS == 1){?>
                                                <center><p style="color: orange"><i class="fa fa-check-circle fa-2x"></i></p></center>
                                            <?php } else {?>
                                                <center><p style="color: red"><i class="fa fa-times-circle fa-2x"></i></p></center>
                                            <?php }?> 
                                        </td>
                                        <td>
                                            <?php if($reg->STATUS == 1){?>
                                                <button type="button" class="btn btn-primary btn-sm" disabled>Bayar</button>
                                            <?php } else {?>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_pembayaran<?php echo $id?>">Bayar</button>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php echo $this->pagination->create_links();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    foreach($pendaftaran as $p):
        $id = $p->NO_PENDAFTARAN;
        $nama = $p->NAMA_PENDAFTAR;
        $jenjang = $p->NAMA_JENJANG;
        $tgl = $p->TANGGAL_PENDAFTARAN;
        $total = $p->TOTAL_TAGIHAN;
        $alamat = $p->ALAMAT_PENDAFTAR;
        $tgl_lahir = $p->TGL_LAHIR_PENDAFTAR;
        $jk = $p->JENIS_KELAMIN;
        $telp = $p->NOTELP_PENDAFTAR;
        $telp_ortu = $p->NOTELP_ORTU;
        $email = $p->EMAIL_PENDAFTAR;
        $sekolah = $p->ASAL_SEKOLAH;
    ?>
    <div class="modal fade" id="modal_pembayaran<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Pembayaran</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('Pembayaran/simpan_pembayaran_siswa_baru')?>" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>No. Pendaftaran</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="no_regist" id="no_regist" value="<?php echo $id?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Tanggal Pendaftaran</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="date" class="form-control" name="tgl" id="tgl" value="<?php echo $tgl?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Nama Pendaftar</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Jenjang Kelas</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="jejang" id="jenjang" value="<?php echo $jenjang?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Total Tagihan</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="t" id="t" value="Rp. <?php echo number_format($total,2,',','.');?>" readonly/>
                        
                    </div>
                    <input type="hidden" class="form-control" name="total" id="total" value="<?php echo $total?>" readonly/>
                </div>
            </div>
            <!-- data siswa -->
            <input type="hidden" name="nama_siswa" value="<?php echo $nama?>"/>
            <input type="hidden" name="alamat_siswa" value="<?php echo$alamat?>"/>
            <input type="hidden" name="jenjang" value="<?php echo $jenjang?>"/>
            <input type="hidden" name="tgl_lahir" value="<?php echo $tgl_lahir?>"/>
            <input type="hidden" name="jk" value="<?php echo $jk?>"/>
            <input type="hidden" name="email" value="<?php echo $email?>"/>
            <input type="hidden" name="telp_siswa" value="<?php echo $telp?>"/>
            <input type="hidden" name="telp_ortu" value="<?php echo $telp_ortu?>"/>
            <input type="hidden" name="sekolah" value="<?php echo$sekolah?>"/>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <button type="reset" class="btn btn-danger btn-sm" name="Batal" data-dismiss="modal">Batal</button>&nbsp;
                        <button type="submit" class="btn btn-primary btn-sm" name="bayar">Bayar</button> 
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