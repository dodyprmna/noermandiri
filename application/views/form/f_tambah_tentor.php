<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Input Data Tentor</h2>
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
                                    <form action="<?php echo base_url('Tentor/aksiTambah')?>" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Nama Lengkap</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" required/>
                                                    <?php echo form_error('nama')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Alamat Lengkap</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo set_value('alamat'); ?>" required/>
                                                    <?php echo form_error('alamat')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Jenis Kelamin</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="jk" id="jk" required>
                                                            <option value="">-Pilih Jenis Kelamin-</option>
                                                                <option value="L">Laki-Laki</option>
                                                                <option value="L">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Tanggal Lahir</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Nomor Telepon</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="notelp" id="notelp" value="<?php echo set_value('notelp'); ?>" required/>
                                                    <?php echo form_error('notelp')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" required/>
                                                    <?php echo form_error('email')?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Mata Pelajaran</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="mapel" id="mapel" required>
                                                            <option value="">-Pilih Mata Pelajaran-</option>
                                                                <?php
                                                                foreach ($mata_ajar as $mapel) { ?>
                                                                    <option value="<?php echo $mapel->ID_MAPEL;?>"><?php echo $mapel->NAMA_MAPEL;?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
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
    </div>