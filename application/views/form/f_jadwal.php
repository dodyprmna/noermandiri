<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Input Jadwal Les</h2>
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
                                    <form action="<?php echo base_url('Jadwal/aksiTambah')?>" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Tanggal</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="date" class="form-control" name="tanggal" id="tanggal" onchange="getKelombel();" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Jam</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="sesi" id="sesi" onchange="getTentor(); getRuangan()">
                                                            <option value="">- Pilih Jam -</option>
                                                            <?php
                                                            foreach($sesi as $jam) { ?>
                                                            <option value="<?php echo $jam->ID_SESI?>"><?php echo date("H:i",strtotime($jam->JAM_MULAI))?> - <?php echo date("H:i",strtotime($jam->JAM_SELESAI))?></option>
                                                            <?php
                                                            } ?>
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
                                                    <label>Kelas</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="kelas" id="kelas">
                                                            <option value="">- Pilih Kelas -</option>
                                                            <!-- <?php
                                                            foreach ($kelombel as $kelas) { ?>
                                                                <option value="<?php echo $kelas->ID_KELAS;?>"><?php echo $kelas->NAMA_KELAS;?></option>
                                                            <?php
                                                            }
                                                            ?> -->
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
                                                    <label>Mata Pelajaran</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="mapel" id="mapel" >
                                                            <option value="">- Pilih Mata Pelajaran -</option>
                                                            <?php
                                                            foreach ($mata_ajar as $mapel) { ?>
                                                                <option value="<?php echo $mapel->ID_MAPEL;?>"><?php echo $mapel->NAMA_MAPEL;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Tentor</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="tentor" id="tentor" >
                                                            <option value="">- Pilih Tentor -</option>
                                                            <!-- <?php
                                                            foreach($pengajar as $tentor) { ?>
                                                            <option value="<?php echo $tentor->ID_PEGAWAI;?>"><?php echo $tentor->NAMA_PEGAWAI;?> - <?php echo $tentor->NAMA_MAPEL;?></option>
                                                            <?php
                                                            } ?> -->
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
                                                    <label>Ruangan</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="ruangan" id="ruangan">
                                                            <option value="">- Pilih Ruangan -</option>
                                                            <!-- <?php
                                                            foreach($ruangan as $room) { ?>
                                                            <option value="<?php echo $room->ID_RUANGAN;?>"><?php echo $room->NAMA_RUANGAN; ?></option>
                                                            <?php
                                                            } ?> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-7">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button> 
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
                        $('#kelas').html(html);
            }
        });
    }
</script>

