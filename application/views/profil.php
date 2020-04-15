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
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card card">
                        <div class="card card-stats card-info card-roundr" style="padding: 50px">
                            <center><i class="fa fa-user-circle fa-7x"></i></center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="display table table-striped table-hover" >
                                            <?php if($this->session->userdata('akses') == 'tentor'):?>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <?php elseif($this->session->userdata('akses') == 'siswa'):?>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $this->session->userdata('ses_nama')?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?php echo $this->session->userdata('ses_alamat')?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td><?php echo date("d-m-Y",strtotime($this->session->userdata('ses_tgl_lahir')))?></td>
                                            </tr>
                                            <tr>
                                                <th>Nomer telepon</th>
                                                <td><?php echo $this->session->userdata('ses_telp')?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $this->session->userdata('ses_email')?></td>
                                            </tr>
                                            <?php endif;?>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-xs btn-secondary btn-sm" href="" style="float: right;">Edit Profil</a>
                                    <a class="btn btn-xs btn-info btn-sm" style="float: right; margin-right: 5px" href="<?php echo base_url('Profil/ubah_password')?>">Ubah Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>