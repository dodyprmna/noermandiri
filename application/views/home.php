<div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($this->session->userdata('akses')=='admin'):?>
            <div class="page-inner mt--5">
                <div class="row mt--2">
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-info card-round">
                            <a href="<?php echo base_url('Pendaftaran')?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-list"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="text">
                                                <h5 class="card-title">Data Pendaftaran</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>    
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-primary card-round">
                            <a href="<?php echo base_url('Home')?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="text">
                                                <h5 class="card-title">Data Pembayaran</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a> 
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-warning card-round">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container" style="min-height: 250px">
                                <br><br><br><br>
                                    <h1 align="center">Welcome back <?php echo $this->session->userdata('ses_nama'); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else:?>
            <div class="page-inner mt--5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container" style="min-height: 250px">
                                <br><br><br><br>
                                    <h1 align="center">Welcome back <?php echo $this->session->userdata('ses_nama'); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>