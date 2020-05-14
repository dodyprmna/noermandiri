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
                                <div class="col-md-3">
                                    <a href="<?php echo base_url('Jadwal/tambah')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                                </div>
                                <div class="col-md-9">
                                    <form action="<?php echo base_url('Jadwal/index')?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4 mt-2">
                                            <select class="form-control" name="kelas" id="kelas">
                                                <option value="">-Pilih Kelas-</option>
                                                <?php
                                                foreach ($kelombel as $kelas) { ?>
                                                    <option value="<?php echo $kelas->ID_KELAS;?>"><?php echo $kelas->NAMA_KELAS;?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <select class="form-control" name="periode" id="periode">
                                                <?php
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    $tahun = date("Y");
                                                ?>
                                                <option value="">-Pilih Bulan-</option>
                                                <option value="01-<?php echo $tahun?>">Januari</option>
                                                <option value="02-<?php echo $tahun?>">Februari</option>
                                                <option value="03-<?php echo $tahun?>">Maret</option>
                                                <option value="04-<?php echo $tahun?>">April</option>
                                                <option value="05-<?php echo $tahun?>">Mei</option><option value="06-<?php echo $tahun?>">Juni</option>
                                                <option value="07-<?php echo $tahun?>">Juli</option>
                                                <option value="08-<?php echo $tahun?>">Agustus</option>
                                                <option value="09-<?php echo $tahun?>">September</option>
                                                <option value="10-<?php echo $tahun?>">Oktober</option>
                                                <option value="11-<?php echo $tahun?>">November</option><option value="12-<?php echo $tahun?>">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <input type="submit" class="btn btn-primary" name="submit"/>
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
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Kelas </th>
                                        <th>Mata Pelajaran</th>
                                        <th>Ruangan</th>
                                        <th>Tentor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    <?php if($jumlah > 0):?>
                                        <?php
                                        foreach ($jadwal as $j) {
                                                $nourut = 1;
                                        ?>
                                        <tr>
                                            <td><?php echo $nourut++;?></td>
                                            <td><?php echo date("d-m-Y",strtotime($j->TANGGAL))?></td>
                                            <td><?php echo date("H:i",strtotime($j->JAM_MULAI))?> - <?php echo date("H:i",strtotime($j->JAM_SELESAI))?></td>
                                            <td><?php echo $j->NAMA_KELAS?></td>
                                            <td><?php echo $j->NAMA_MAPEL?></td>
                                            <td><?php echo $j->NAMA_RUANGAN?></td>
                                            <td><?php echo $j->NAMA_TENTOR?></td>
                                            <td>
                                                <a class="btn btn-danger btn-sm tombol_hapus" href="<?php echo base_url('Jadwal/hapus/'.$j->ID_JADWAL)?>">Hapus</a>
                                                <!-- <button class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $j->ID_JADWAL?>"><i class="fa fa-pencil-alt"></i></button> -->
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    <?php else:?>
                                        <tr>
                                            <td colspan="8"><center>Jadwal Belum Tersedia</center></td>
                                        </tr>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
<!-- <?php
    foreach($jadwal as $jadwal):
        $id         = $jadwal->ID_JADWAL;
        $tanggal    = $jadwal->TANGGAL;
        $jam        = $jadwal->ID_SESI;
        $mata_pelajaran      = $jadwal->ID_MAPEL;
?>
<div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Jadwal Les</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('Jadwal/update')?>" method="POST">
            <input type="hidden" name="" value="<?php echo $id?>">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Tanggal</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo $tanggal?>" onchange="getKelombel();" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Jam</label>
                    </div>
                    <div class="col-lg-7">
                        <select class="form-control" name="sesi" id="sesi" onchange="getTentor(); getRuangan()" required>
                            <option value="">- Pilih Jam -</option>
                            <?php
                            foreach($sesi as $s) { ?>
                            <option value="<?php echo $s->ID_SESI?>" <?=$s->ID_SESI == $jam ? 'selected' : ''?>><?php echo date("H:i",strtotime($s->JAM_MULAI))?> - <?php echo date("H:i",strtotime($s->JAM_SELESAI))?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Kelas</label>
                    </div>
                    <div class="col-lg-7">
                        <select class="form-control" name="kelas" id="kls" required>
                            <option value="">- Pilih Kelas -</option> -->
                            <!-- <?php
                            foreach ($kelombel as $kelas) { ?>
                                <option value="<?php echo $kelas->ID_KELAS;?>"><?php echo $kelas->NAMA_KELAS;?></option>
                            <?php
                            }
                            ?> -->
                        <!-- </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Mata Pelajaran</label>
                    </div>
                    <div class="col-lg-7">
                        <select class="form-control" name="mapel" id="mapel" required>
                            <option value="">- Pilih Mata Pelajaran -</option>
                            <?php foreach ($mapel as $m) {?>
                                <option value="<?php echo $m->ID_MAPEL?>" <?=$m->ID_MAPEL == $mata_pelajaran ? 'selected' : ''?>><?php echo $m->NAMA_MAPEL?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Tentor</label>
                    </div>
                    <div class="col-lg-7">
                        <select class="form-control" name="tentor" id="tentor" required>
                            <option value="">- Pilih Tentor -</option> -->
                            <!-- <?php
                            foreach($pengajar as $tentor) { ?>
                            <option value="<?php echo $tentor->ID_PEGAWAI;?>"><?php echo $tentor->NAMA_PEGAWAI;?> - <?php echo $tentor->NAMA_MAPEL;?></option>
                            <?php
                            } ?> -->
                        <!-- </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>Ruangan</label>
                    </div>
                    <div class="col-lg-7">
                        <select class="form-control" name="ruangan" id="ruangan" required>
                            <option value="">- Pilih Ruangan -</option> -->
                            <!-- <?php
                            foreach($ruangan as $room) { ?>
                            <option value="<?php echo $room->ID_RUANGAN;?>"><?php echo $room->NAMA_RUANGAN; ?></option>
                            <?php
                            } ?> -->
                       <!--  </select>
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

<script type="text/javascript">


    function getTentor(){
        var tgl = document.getElementById('tanggal').value;
        var time = document.getElementById('sesi').value;
        $.ajax({
            url : "<?php echo base_url('Jadwal/cekTentor')?>",
            method: "POST",
            contentType: "application/json; charset=utf-8",
            dataType :"json",
            data: {
            time : time,
            tgl : tgl
            },
            success : function(data){
                var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].ID_TENTOR+'>'+data[i].NAMA_TENTOR+" - "+data[i].NAMA_MAPEL+'</option>';
                        }
                        $('#tentor').html(html);
            }
        });
    }

    function getRuangan(){
        var tgl = document.getElementById('tanggal').value;
        var time = document.getElementById('sesi').value;
        $.ajax({
            url : "<?php echo base_url('Jadwal/cekRuangan')?>",
            method: "POST",
            dataType :"json",
            data: {
            time : time,
            tgl : tgl
            },
            success : function(data){
                var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].ID_RUANGAN+'>'+data[i].NAMA_RUANGAN+'</option>';
                        }
                        $('#ruangan').html(html);
            }
        });
    }

    function getKelombel(){
        var tgl = document.getElementById('tanggal').value;
        $.ajax({
            url : "<?php echo base_url('Jadwal/cekKelombel')?>",
            method: "POST",
            dataType :"json",
            data: {
            tgl : tgl
            },
            success : function(data){
                var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].ID_KELAS+'>'+data[i].NAMA_KELAS+'</option>';
                        }
                        $('#kls').html(html);
            }
        });
    }
</script> -->
<!-- <script >
	function getJadwal(){
        var kls = document.getElementById('kelas').value;
        var periode = document.getElementById('periode').value;
        $.ajax({
            url : "<?php echo base_url('Jadwal/getJadwalByFilter')?>",
            method: "POST",
            dataType :"json",
            data: {
            kls : kls,
            periode : periode
            },
            success : function(data){
                var html = '';
                    if (data.length > 0) {
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                                    '<td>'+data[i].tanggal+'</td>'+
                                    '<td>'+data[i].jam+'</td>'+
                                    '<td>'+data[i].NAMA_KELAS+'</td>'+
                                    '<td>'+data[i].NAMA_MAPEL+'</td>'+
                                    '<td>'+data[i].NAMA_RUANGAN+'</td>'+
                                    '<td>'+data[i].NAMA_TENTOR+'</td>'+
                                    // '<td><a href=""><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></button></a></td>'+
                                    '</tr>';
                        }
                    }else{
                        html += '<tr>'+
                                    '<td colspan = "6">'+'<center>'+"Jadwal belum tersedia"+'</center>'+'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
            }
        });
    }	
</script> -->