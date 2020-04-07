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
                                <div class="col-md-6">
                                    <form action="<?php echo base_url('Pembayaran/aksiPilihJenisPembayaran')?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-4 mt-3">
                                                <select  class="form-control" id="bulan" name="bulan">
                                                    <option value="">- Pilih Bulan -</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mt-3">
                                                <select class="form-control" id="tahun" name="tahun">
                                                    <option value="">- Pilih Tahun -</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 mt-3">
                                                <button type="submit" class="btn btn-primary" name="Tambah"><i class="fa fa-print"> Laporan</i></button>
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
                                        <td><a href="<?php echo base_url('Pembayaran/cetak_bukti_pembayaran/'.$id)?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a></td>
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