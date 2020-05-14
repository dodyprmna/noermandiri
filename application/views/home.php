<div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                            <h4 style="color: white">Selamat datang kembali <?php echo $this->session->userdata('ses_nama'); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner mt--5">
                <div class="row mt--2">
                    <?php if($this->session->userdata('akses')=='admin'):?>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-graph"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total Pembayaran Daftar Siswa Baru </p>
                                            <h4 class="card-title">Rp. <?php echo number_format($pembayaran->total,0,',','.')?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-graph"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total Pembayaran Daftar Ulang</p>
                                            <h4 class="card-title">Rp. <?php echo number_format($p_daftar_ulang->total,0,',','.')?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-graph"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Pendaftaran Siswa Saru yang Belum Melakukan Pembayaran</p>
                                            <h4 class="card-title"><?php echo $pendaftaran ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-graph"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Daftar Ulang yang Belum Melakukan Pembayaran</p>
                                            <h4 class="card-title"><?php echo $daftar_ulang ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Siswa</p>
                                            <h4 class="card-title"><?php echo $siswa ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php elseif($this->session->userdata('akses')=='tentor'):?>
                    <!-- <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-primary card-round">
                            <a href="<?php echo base_url('Jadwal')?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-calendar"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="text">
                                                <h5 class="card-title">Jadwal Mengajar</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a> 
                        </div>
                    </div> -->
                    <?php elseif($this->session->userdata('akses')=='siswa'):?>
                    <!-- <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-primary card-round">
                            <a href="<?php echo base_url('Jadwal')?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-calendar"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="text">
                                                <h5 class="card-title">Jadwal Les</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a> 
                        </div>
                    </div> -->
                    <?php elseif($this->session->userdata('akses')=='pemilik'):?>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-graph"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total Pembayaran Daftar Siswa Baru </p>
                                            <h4 class="card-title">Rp. <?php echo number_format($pembayaran->total,0,',','.')?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-graph"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Total Pembayaran Daftar Ulang</p>
                                            <h4 class="card-title">Rp. <?php echo number_format($p_daftar_ulang->total,0,',','.')?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Tentor</p>
                                            <h4 class="card-title"><?php echo $tentor?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Siswa</p>
                                            <h4 class="card-title"><?php echo $siswa?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                <?php if($this->session->userdata('akses') == 'tentor'):?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Jadwal mengajar kamu hari ini</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Jam</th>
                                                        <th>Kelas</th>
                                                        <th>Ruangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(count($jadwal) > 0):?>
                                                    <?php
                                                    $nourut = 1;
                                                    foreach ($jadwal as $j) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nourut++?></td>
                                                        <td><?php echo date("H:i",strtotime($j->JAM_MULAI))?> - <?php echo date("H:i",strtotime($j->JAM_SELESAI))?></td>
                                                        <td><?php echo $j->NAMA_KELAS?></td>
                                                        <td><?php echo $j->NAMA_RUANGAN?></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php else:?>
                                                    <tr>
                                                        <td colspan="4"><center>Kamu tidak ada jadwal mengajar hari ini</center></td>
                                                    </tr>
                                                    <?php endif;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif($this->session->userdata('akses') == 'siswa'):?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Jadwal kamu hari ini</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Jam</th>
                                                        <th>Mata Pelajaran</th>
                                                        <th>Ruangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(count($jadwal) > 0):?>
                                                    <?php
                                                    $nourut = 1;
                                                    foreach ($jadwal as $j) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nourut++?></td>
                                                        <td><?php echo date("H:i",strtotime($j->JAM_MULAI))?> - <?php echo date("H:i",strtotime($j->JAM_SELESAI))?></td>
                                                        <td><?php echo $j->NAMA_MAPEL?></td>
                                                        <td><?php echo $j->NAMA_RUANGAN?></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php else:?>
                                                    <tr>
                                                        <td colspan="4"><center>Kamu tidak ada jadwal les hari ini</center></td>
                                                    </tr>
                                                    <?php endif;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
            </div>
        </div>