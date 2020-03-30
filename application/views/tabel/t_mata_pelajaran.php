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
                            <a href="<?php echo base_url('Mata_Pelajaran/tambah')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>ID Mapel</center></th>
                                        <th><center>Mata Pelajaran</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($mata_ajar as $mapel) {
                                    ?>
                                    <tr>
                                        <td><center><?php echo $nourut++;?></center></td>
                                        <td><?php echo $mapel->ID_MAPEL; ?></td>
                                        <td><?php echo $mapel->NAMA_MAPEL; ?></td>
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