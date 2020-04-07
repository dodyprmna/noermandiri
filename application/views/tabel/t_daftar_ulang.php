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
                                    <form action="<?php echo base_url('Pendaftaran/daftar_ulang')?>" method="POST">
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
                                        <th>No.Daftar Ulang</th>
                                        <th>Tanggal</th>
                                        <th>Biaya</th>
                                        <th>Status</th>
                                        <th>Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($daftar_ulang as $d) {
                                    $id = $d->ID_DAFTAR_ULANG;
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++?></td>
                                        <td><?php echo $d->ID_DAFTAR_ULANG; ?></td>
                                        <td><?php echo $d->TGL_DAFTAR_ULANG; ?></td>
                                        <td><?php echo $d->TOTAL_BIAYA_DAFTAR_ULANG; ?></td>
                                        <td><?php if($d->STATUS == 1){?>
                                                <center><p style="color: orange"><i class="fa fa-check-circle fa-2x mt-3"></i></p><p class="mt--2">Sudah dibayar</p></center>
                                            <?php } else {?>
                                                <center><p style="color: red"><i class="fa fa-times-circle fa-2x mt-3"></i></p><pclass="mt--2">Belum dibayar</p></center>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php if($d->STATUS == 1){?>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    foreach($daftar_ulang as $du):
        $id = $du->ID_DAFTAR_ULANG;
        $total = $du->TOTAL_BIAYA_DAFTAR_ULANG;
        $no_induk = $du->NO_INDUK;
        $jenjang = $du->ID_JENJANG;
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
        <form action="<?php echo base_url('Pembayaran_daftar_ulang/simpan_pembayaran')?>" method="POST">
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
                        <label>Total Tagihan</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="tot" id="tot" value="Rp. <?php echo number_format($total,2,',','.');?>" readonly/>
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" name="total" id="total" value="<?php echo $total;?>" readonly/>
            <!-- data siswa -->
            <input type="hidden" name="no_induk" value="<?php echo $no_induk?>"/>
            <input type="hidden" name="jenjang" value="<?php echo $jenjang?>"/>
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