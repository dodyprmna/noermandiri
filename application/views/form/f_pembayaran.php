            <div class="basic-form-area mg-b-15">
                <div class="container-fluid">    
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo validation_errors(); ?>
                                        </div>
                            <?php endif; ?>
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1><?php echo $judul;?></h1>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    <form action="<?php echo base_url('DaftarUlang/aksiTambah')?>" method="POST">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Nomer Pendaftaran</label>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <input type="text" class="form-control" id="noinduk" name="no_pendaftaran"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Tagihan</label>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <input type="text" class="form-control" id="noinduk" name="tagihan" readonly=""/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Jumlah uang yang dibayarkan</label>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <input type="text" class="form-control" id="noinduk" name="totalbayar"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            <button type="reset" class="btn btn-danger btn-fill pull-left" name="Batal">Batal</button>&nbsp;
                                                                            <button type="submit" class="btn btn-primary btn-fill pull-right" name="Tambah">Simpan</button> 
                                                                        </div>
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
                </div>
            </div>