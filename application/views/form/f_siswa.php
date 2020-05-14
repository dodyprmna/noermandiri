<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Input Data Siswa Baru</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo validation_errors(); ?>
                                        </div>
                            <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><?php echo $judul?></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo base_url('Siswa/simpan')?>" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Nama Lengkap</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Jenjang Kelas</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="" id="" value="<?php echo $nama_jenjang?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Alamat</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat?>" required/>
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
                                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $tgl_lahir?>" required/>
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
                                                    <select class="form-control" name="jk" id="mapel" >
                                                        <?php if($jk = "L"){?>
                                                            <option value="L" selected>Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        <?php }else{ ?>
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P" selected>Perempuan</option>
                                                        <?php } ?>
                                                    </select>
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
                                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email?>" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Telepon</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" name="telp" id="telp" value="<?php echo $telp_siswa?>" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Telepon Orang Tua</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" name="telp_ortu" id="telp_ortu" value="<?php echo $telp_ortu?>" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Asal Sekolah</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" value="<?php echo $sekolah?>" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Kelas</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control custom-select-value" name="kelas" id="kelas" required>
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
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
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

</script>

