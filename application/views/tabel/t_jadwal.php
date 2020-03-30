<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?php echo $judul?> <?php echo $bln;?></h2>
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
                                <div class="col-md-9">
                                    <a href="<?php echo base_url('Jadwal/tambah')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control custom-select-value" name="kelas" id="kelas" onchange="getJadwalByKelas();">
                                        <option value="">-Pilih Kelas-</option>
                                        <?php
                                        foreach ($kelombel as $kelas) { ?>
                                            <option value="<?php echo $kelas->ID_KELAS;?>"><?php echo $kelas->NAMA_KELAS;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Kelas </th>
                                        <th>Mata Pelajaran</th>
                                        <th>Ruangan</th>
                                        <th>Tentor</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    <?php
                                    foreach ($jdwl as $jadwal) {
                                    ?>
                                    <tr>
                                        <td><?php echo $jadwal->TANGGAL; ?></td>
                                        <td><?php echo $jadwal->WAKTU;?></td>
                                        <td><?php echo $jadwal->NAMA_KELAS; ?></td>
                                        <td><?php echo $jadwal->NAMA_MAPEL; ?></td>
                                        <td><?php echo $jadwal->NAMA_RUANGAN; ?></td>
                                        <td><?php echo $jadwal->NAMA_PEGAWAI; ?></td>
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
<script >
	function getJadwalByKelas(){
        var kls = document.getElementById('kelas').value;
        $.ajax({
            url : "<?php echo base_url('Jadwal/getJadwalByKelas')?>",
            method: "POST",
            dataType :"json",
            data: {
            kls : kls
            },
            success : function(data){
                var html = '';
                    if (data.length > 0) {
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                                    '<td>'+data[i].TANGGAL+'</td>'+
                                    '<td>'+data[i].WAKTU+'</td>'+
                                    '<td>'+data[i].NAMA_KELAS+'</td>'+
                                    '<td>'+data[i].NAMA_MAPEL+'</td>'+
                                    '<td>'+data[i].NAMA_RUANGAN+'</td>'+
                                    '<td>'+data[i].NAMA_PEGAWAI+'</td>'+
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

    function getTentor(){
        var tgl = document.getElementById('tanggal').value;
        var time = document.getElementById('waktu').value;
        $.ajax({
            url : "<?php echo base_url('Jadwal/cekTentor')?>",
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
                            html += '<option value='+data[i].ID_PEGAWAI+'>'+data[i].NAMA_PEGAWAI+" - "+data[i].NAMA_MAPEL+'</option>';
                        }
                        $('#tentor').html(html);
            }
        });
    }

    function getRuangan(){
        var tgl = document.getElementById('tanggal').value;
        var time = document.getElementById('waktu').value;
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
                console.log(data);
                var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].ID_KELAS+'>'+data[i].NAMA_KELAS+'</option>';
                        }
                        $('#kls').html(html);
            }
        });
    }	
</script>