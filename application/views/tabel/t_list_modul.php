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
                                        <th>Judul</th>
                                        <th>Tanggal Upload</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($modul) > 0):?>
                                        <?php
                                        $nourut = 1;
                                        foreach ($modul as $m) {
                                        ?>
                                        <tr>
                                            <td><?php echo $nourut++?></td>
                                            <td><?php echo $m->JUDUL;?></td>
                                            <td><?php echo date("d-m-Y",strtotime($m->TANGGAL_UPLOAD_MODUL));?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('Materi_pembelajaran/download/'.$m->JUDUL)?>">download</a>&nbsp;<a class="btn btn-danger btn-sm tombol_hapus" href="<?php echo base_url('Materi_pembelajaran/hapus/'.$m->JUDUL)?>">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    <?php else:?>
                                        <td colspan="4" align="center">Modul belum tersedia</td>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>