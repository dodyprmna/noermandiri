<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?php echo $judul?> <?php echo $bln;?></h2>
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
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Ruangan</th>
                                        <th>Tentor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($jdwl as $jadwal) {
                                    ?>
                                    <tr>
                                        <td><?php echo $jadwal->TANGGAL; ?></td>
                                        <td><?php echo $jadwal->WAKTU; ?></td>
                                        <td><?php echo $jadwal->NAMA_MAPEL; ?></td>
                                        <td><?php echo $jadwal->NAMA_RUANGAN; ?></td>
                                        <td><?php echo $jadwal->NAMA_PEGAWAI; ?></td>
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