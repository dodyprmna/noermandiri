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
                                    <form action="<?php echo base_url('Pembayaran/pembayaran_daftar_siswa_baru')?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6 mt-3">
                                                <input type="text" name="keyword" class="form-control" placeholder="Search......" autocomplete="off" autofocus/>
                                            </div>
                                            <div class="col-lg-3 mt-3">
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
                                        <th>No</th>
                                        <th>No.Pembayaran</th>
                                        <th>No.Pendaftaran</th>
                                        <th>Pegawai</th>
                                        <th>Tanggal</th>
                                        <th>Total Pembayaran</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    <?php
                                    $nourut = 1;
                                    foreach ($pembayaran as $p) {
                                        $id = $p->ID_PEMBAYARAN_DAFTAR_ULANG;
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++ ?></td>
                                        <td><?php echo $p->ID_PEMBAYARAN_DAFTAR_ULANG; ?></td>
                                        <td><?php echo $p->ID_DAFTAR_ULANG;?></td>
                                        <td><?php echo $p->ID_PEGAWAI;?></td>
                                        <td><?php echo date("d-m-Y",strtotime($p->TGL_PEMBAYARAN_DAFTAR_ULANG)); ?></td>
                                        <td><?php echo number_format($p->TOTAL_PEMBAYARAN_DAFTAR_ULANG,2,',','.'); ?></td>
                                        <td><a href="<?php echo base_url('Pembayaran_daftar_ulang/cetak_bukti_pembayaran/'.$id)?>" type="button" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a></td>
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
<script >
</script>