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
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pembayaran</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Total Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($riwayat as $r) {
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++?></td>
                                        <td><?php echo $r->ID_PEMBAYARAN_DAFTAR_ULANG?></td>
                                        <td><?php echo date("d-m-Y",strtotime($r->TGL_PEMBAYARAN_DAFTAR_ULANG)); ?></td>
                                        <td>Rp. <?php echo number_format($r->TOTAL_BIAYA_DAFTAR_ULANG,2,',','.'); ?></td>
                                        <td><a target="_blank" href="<?php echo base_url('Pembayaran_daftar_ulang/cetak_bukti_pembayaran/'.$r->ID_PEMBAYARAN_DAFTAR_ULANG)?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Kwitansi</a>
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