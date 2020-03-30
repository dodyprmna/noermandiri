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
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo base_url('Jadwal/tambah')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                                </div>
                                <div class="col-md-6">
                                    <form action="<?php echo base_url('Pembayaran/aksiPilihJenisPembayaran')?>" method="POST">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <select class="form-control" id="jenis_pembayaran" name="jenis">
                                                    <option value="0">- Pilih Pembayaran -</option>
                                                    <option value="1">Pembayaran daftar siswa baru</option>
                                                    <option value="2">Pembayaran daftar ulang</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-primary" name="Tambah">Pilih</button> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No.Pembayaran</th>
                                        <th>No.Pendaftaran</th>
                                        <th>Pegawai</th>
                                        <th>Tanggal</th>
                                        <th>Total Pembayaran</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script >
</script>