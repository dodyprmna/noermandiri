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
                                    
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 mt-2">
                                            <select class="form-control" name="periode" id="periode" onchange="getJadwal();">
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
                                    </div>
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
                                        <th>Mata Pelajaran</th>
                                        <th>Ruangan</th>
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
<script>

    function getJadwal(){
        var periode = document.getElementById('periode').value;
        $.ajax({
            url : "<?php echo base_url('Jadwal/getJadwalTentorByFilter')?>",
            method: "POST",
            dataType :"json",
            data: {
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
                                    '<td>'+data[i].NAMA_MAPEL+'</td>'+
                                    '<td>'+data[i].NAMA_RUANGAN+'</td>'+
                                    '<td>'+data[i].NAMA_TENTOR+'</td>'+
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
</script>