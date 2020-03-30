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
                                <div class="col-md-7">
                                    <form action="<?php echo base_url('Pembayaran/aksiPilihJenisPembayaran')?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" placeholder="Masukkan nomor pendaftaran"/>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn btn-primary" name="cari">Cari</button> 
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
                                    $nourut = 1;
                                    foreach ($pendaftaran as $reg) {
                                        $id = $reg->NO_PENDAFTARAN;
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++?></td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script >
</script>