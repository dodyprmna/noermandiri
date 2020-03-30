<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Input Data Pegawai</h2>
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
                        <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo validation_errors(); ?>
                                        </div>
                            <?php endif; ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo base_url('Pegawai/aksiTambah')?>" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Nama Lengkap</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="nama" id="nama" required/>
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
                                                    <input type="text" class="form-control" name="alamat" id="alamat" required/>
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
                                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required/>
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
                                                    <input type="text" class="form-control" name="notelp" id="notelp" required/>
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
                                                    <input type="email" class="form-control" name="email" id="email" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Jabatan</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="jabatan" id="jabatan" onchange="cekJabatan()" required>
                                                            <option value="">-Pilih Jabatan-</option>
                                                            <?php
                                                            foreach ($jabatan as $jab) { ?>
                                                                <option value="<?php echo $jab->ID_JABATAN;?>"><?php echo $jab->JABATAN;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="level" id="level" value="">
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

<script type="text/javascript">
    function cekJabatan() {
        var jabatan = document.getElementById('jabatan').value;
        var level = document.getElementById('level');
        console.log(jabatan);
        if (jabatan == 'ADM'){
            level.value = '1'
        }else{
            level.value = '2' 
        }
    }
</script>