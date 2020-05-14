<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
<div class="main-panel">
    <div class="content">
        <div class="page mt-2">
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
                                            <tr>
                                                <th>Nama</th>
                                                <td><?php echo $nama?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?php echo $alamat?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td><?php echo date("d-m-Y",strtotime($tgl_lahir))?></td>
                                            </tr>
                                            <tr>
                                                <th>Nomer telepon</th>
                                                <td><?php echo $telp?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $email?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-xs btn-secondary btn-sm" style="float: right;"data-toggle="modal" data-target="#modal_edit">Edit Profil</button>
                                    <a class="btn btn-xs btn-info btn-sm" style="float: right; margin-right: 5px" href="<?php echo base_url('Profil/ubah_password')?>">Ubah Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- modal edit profil -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="card card-stats card-info card-roundr" style="padding-top: 40px;padding-bottom: 20px">
                <center><i class="fa fa-user-circle fa-7x"></i></center>
                <center><strong><p>Edit Profil</p></strong></center>
            </div>
            <form action="<?php echo base_url('Profil/update_profil')?>" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Nama</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" readonly/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" name="alamat_edit" id="alamat_edit" value="<?php echo $alamat?>" required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Tanggal Lahir</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="date" class="form-control" name="tgl_lahir_edit" id="tgl_lahir_edit" value="<?php echo $tgl_lahir?>" required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Telepon</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="number" class="form-control" name="telp_edit" id="telp_edit" value="<?php echo $telp?>" required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Email</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="email" class="form-control" name="email_edit" id="email_edit" value="<?php echo $email?>" required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="button" class="btn btn-danger btn-sm" name="Batal" class="close" data-dismiss="modal">Batal</button>&nbsp;
                            <button type="submit" class="btn btn-primary btn-sm" name="Tambah">Simpan</button> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>