<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?php echo $judul?></h2>
                        <?php if($this->session->userdata('akses') == 'tentor'):?>
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url('Materi_pembelajaran/tambah')?>">Upload Modul</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <div class="row">
                <?php foreach($mapel as $m){?>
                    <div class="col-sm-6 col-md-3">
                        <a href="<?php echo base_url('Materi_pembelajaran/list/'.$m->ID_MAPEL)?>">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <h4 class="card-title"><?php echo $m->NAMA_MAPEL?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> 
                <?php }?>
            </div>
        </div>
                