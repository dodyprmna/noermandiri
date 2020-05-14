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
                                <div class="col-md-6"></div>
                                <div class="col-md-2 mt-2">
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
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option value="">-Pilih Kelas-</option>
                                        <?php
                                        foreach ($kelas as $kelas) { ?>
                                            <option value="<?php echo $kelas->ID_KELAS;?>"><?php echo $kelas->NAMA_KELAS;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-1 mt-2">
                                    <button type="button" class="btn btn-primary" onclick="<?php echo $klik ?>">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="<?php echo base_url('Laporan/cetak')?>" method="POST" target="_blank">
                                        <input type="hidden" name="tabel" value="<?php echo $tabel?>">
                                        <input type="hidden" name="periode1" id="periode1">
                                        <input type="hidden" name="kelas1" id="kelas1">
                                        <button type="submit" class="btn btn-primary btn-round" id="btncetak" disabled><i class="fa fa-print"> Cetak</i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Tentor</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    <?php
                                    $nourut = 1;
                                    foreach ($jadwal as $jadwal) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++?></td>
                                        <td><?php echo date("d-m-Y",strtotime($jadwal->TANGGAL))?></td>
                                        <td><?php echo date("h:m",strtotime($jadwal->JAM_MULAI))?> - <?php echo date("h:m",strtotime($jadwal->JAM_SELESAI))?></td>
                                        <td><?php echo $jadwal->NAMA_MAPEL?></td>
                                        <td><?php echo $jadwal->NAMA_TENTOR?></td>
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
<script type="text/javascript">
    function getLaporanPenjadwalan() {
        var periode = document.getElementById('periode').value;
        var kelas = document.getElementById('kelas').value;
        var btn = document.getElementById('btncetak');
        $('#periode1').val(periode);
        $('#kelas1').val(kelas);
        $.ajax({
            url : "<?php echo base_url('Laporan/penjadwalan_perbulan')?>",
            method: "POST",
            dataType :"json",
            data: {
            periode : periode,
            kelas : kelas
            },
            success : function(data){
                var html = '';
                    if (data.length > 0) {
                        var total = data.length;
                        $('#total').html(total);
                        var i;
                        var nourut = 0;
                        for(i=0; i<data.length; i++){
                            nourut += 1;
                            html += '<tr>'+
                                    '<td>'+nourut+'</td>'+
                                    '<td>'+data[i].tanggal+'</td>'+
                                    '<td>'+data[i].jam+'</td>'+
                                    '<td>'+data[i].NAMA_MAPEL+'</td>'+
                                    '<td>'+data[i].NAMA_TENTOR+'</td>'+
                                    '</tr>';
                        }
                        btn.disabled = false;
                    }else{
                        html += '<tr>'+
                                    '<td colspan = "5">'+'<center>'+"Data tidak ditemukan"+'</center>'+'</td>'+
                                '</tr>';
                        btn.disabled = true;
                        $('#total').html('0');
                    }
                    $('#show_data').html(html);
            }
        });
    }

</script>