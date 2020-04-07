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
                                        <th>No.Daftar Ulang</th>
                                        <th>Tanggal</th>
                                        <th>Biaya</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($tagihan as $t) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++?></td>
                                        <td><?php echo $t->ID_DAFTAR_ULANG; ?></td>
                                        <td><?php echo $t->TGL_DAFTAR_ULANG; ?></td>
                                        <td><?php echo $t->TOTAL_BIAYA_DAFTAR_ULANG; ?></td>
                                        <td><?php if($t->STATUS == 1){?>
                                                <center><p style="color: orange"><i class="fa fa-check-circle fa-2x mt-3"></i></p><p class="mt--2">Sudah dibayar</p></center>
                                            <?php } else {?>
                                                <center><p style="color: red"><i class="fa fa-times-circle fa-2x mt-3"></i></p><pclass="mt--2">Belum dibayar</p></center>
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