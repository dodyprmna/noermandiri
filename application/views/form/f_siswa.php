            <div class="basic-form-area mg-b-15">
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-lg-12">
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
                                                    <form action="<?php echo base_url('Siswa/simpan')?>" method="POST">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Nama Lengkap</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Alamat</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat?>" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Tanggal Lahir</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $tgl_lahir?>" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Jenis Kelamin</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="jk" id="mapel" >
                                                                            <?php if($jk = "L"){?>
                                                                                <option value="L" selected>Laki-Laki</option>
                                                                                <option value="P">Perempuan</option>
                                                                            <?php }else{ ?>
                                                                                <option value="L">Laki-Laki</option>
                                                                                <option value="P" selected>Perempuan</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Email</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email?>" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Telepon</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="number" class="form-control" name="telp" id="telp" value="<?php echo $telp_siswa?>" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Telepon Orang Tua</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="number" class="form-control" name="telp_ortu" id="telp_ortu" value="<?php echo $telp_ortu?>" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Asal Sekolah</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" value="<?php echo $sekolah?>" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Kelas</label>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="kelas" id="kelas">
                                                                            <option value="">-Pilih Kelas-</option>
                                                                            <?php
                                                                                foreach ($kelas as $k) { ?>
                                                                                    <option value="<?php echo $k->ID_KELAS;?>"><?php echo $k->NAMA_KELAS;?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-6">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            <button type="reset" class="btn btn-danger btn-fill pull-left" name="Batal">Kembali</button>&nbsp;
                                                                            <button type="submit" class="btn btn-primary btn-fill pull-right">Simpan</button> 
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

<script type="text/javascript">

</script>

