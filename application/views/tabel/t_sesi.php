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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo base_url('Sesi/tambah')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Sesi</th>
                                        <th>Jam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($sesi as $ses) {
                                        $id = $ses->ID_SESI;
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++;?></td>
                                        <td><?php echo $ses->ID_SESI; ?></td>
                                        <td><?php echo date("H:i",strtotime($ses->JAM_MULAI))?> - <?php echo date("H:i",strtotime($ses->JAM_SELESAI))?></td>
                                        <td><button class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>"><i class="fa fa-pencil-alt"></i></button><a href="<?php echo base_url('Sesi/hapus/'.$id)?>" class="tombol_hapus">&nbsp<button class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button></a></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- MODAL EDIT -->

<?php
    foreach($sesi as $s):
        $id = $s->ID_SESI;
        $jam_mulai = $s->JAM_MULAI;
        $jam_selesai = $s->JAM_SELESAI
?>
<div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Tentor</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('Tentor/update')?>" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>ID Sesi</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Jam Mulai</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="time" class="form-control" name="jam_mulai_edit" id="jam_mulai_edit" value="<?php echo $jam_mulai?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Jam Mulai</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="time" class="form-control" name="jam_selesai_edit" id="jam_selesai_edit" value="<?php echo $jam_selesai?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah">Simpan</button> 
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
<?php endforeach;?>