<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Upload Bukti Pembayaran</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><?php echo $judul?></div>
                            <?php echo $this->session->flashdata('error')?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if($this->session->userdata('akses') == 'siswa'):?>
                                    <?php echo form_open_multipart('Upload_file/bukti_pembayaran_daftar_ulang')?>
                                    <?php else:?>
                                    <?php echo form_open_multipart('Upload_file/bukti_pembayaran')?>
                                    <?php endif;?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>No Pendaftaran*</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="id_pendaftaran" value="<?php echo $id?>" name="id_pendaftaran" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Nama Pemilik Rekening*</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="pemilik_rekening" value="<?php echo set_value('pemilik_rekening'); ?>" name="pemilik_rekening"/>
                                                    <?php echo form_error('pemilik_rekening'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Nama Bank*</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="nama_bank" value="<?php echo set_value('nama_bank'); ?>" name="nama_bank"/>
                                                    <?php echo form_error('nama_bank'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Bukti Pembayaran*</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="file" id="foto" name="foto" required />
                                                    <div>(ukuran file maksimal 5 mb dan tipe file jpg/png/jpeg)</div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        date_default_timezone_set('Asia/Jakarta');
                                        $now = date("Y-m-d H:i:s");
                                        ?>
                                        <input type="hidden" name="tanggal" value="<?php echo $now?>">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                                                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah">Upload</button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                             

<!-- <div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Upload Bukti Pembayaran</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><?php echo $judul?></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form>
                                        <div>
                                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $now?>" disabled/>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>ID Daftar Ulang</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="id" name="id_daftar_ulang" value="<?php echo $id?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Bukti Pembayaran</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="file" name="foto" id="foto" required> <p style="color: blue; font-size: 10px">*ukuran file max 3mb</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                                                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah">Simpan</button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                              -->