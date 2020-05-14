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
                                    <input type="date" name="mulai_periode" id="mulai_periode" class="form-control" autofocus>
                                </div>
                                    <label class="mt-4">s/d</label>
                                <div class="col-md-2 mt-2">
                                    <input type="date" name="akhir_periode" id="akhir_periode" class="form-control">
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
                                        <input type="hidden" name="periode_mulai" id="periode_mulai">
                                        <input type="hidden" name="periode_akhir" id="periode_akhir">
                                        <button type="submit" class="btn btn-primary btn-round" id="btncetak" disabled><i class="fa fa-print"> Cetak</i></button>
                                    </form>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="row">
                                        <div class="col-md-10" style="text-align: right;"><h4>Total Pendaftaran : </h4></div>
                                        <div class="col-md-2"><h4 id="total"><?php echo $total?></h4></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No.Pendaftaran</th>
                                        <th>Jenjang Kelas</th>
                                        <th>Total Biaya</th>
                                    </tr>
                                </thead>
                                <?php if ($tabel == 'siswa baru') :?>
                                    <tbody id="show_data">
                                        <?php
                                        $nourut = 1;
                                        foreach ($pendaftaran as $reg) {
                                        ?>
                                        <tr>
                                            <td><?php echo $nourut++?></td>
                                            <td><?php echo $reg->NO_PENDAFTARAN?></td>
                                            <td><?php echo $reg->NAMA_JENJANG; ?></td>
                                            <td>Rp. <?php echo number_format($reg->TOTAL_TAGIHAN,2,',','.'); ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                <?php else:?>
                                    <tbody id="show_data">
                                        <?php
                                        $nourut = 1;
                                        foreach ($pendaftaran as $reg) {
                                        ?>
                                        <tr>
                                            <td><?php echo $nourut++?></td>
                                            <td><?php echo $reg->ID_DAFTAR_ULANG?></td>
                                            <td><?php echo $reg->NAMA_JENJANG; ?></td>
                                            <td>Rp. <?php echo number_format($reg->TOTAL_BIAYA_DAFTAR_ULANG,2,',','.'); ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                <?php endif;?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function getLaporanByPeriode() {
        var mulai = document.getElementById('mulai_periode').value;
        var akhir = document.getElementById('akhir_periode').value;
        var btn = document.getElementById('btncetak');
        $('#periode_mulai').val(mulai);
        $('#periode_akhir').val(akhir);
        $.ajax({
            url : "<?php echo base_url('Laporan/pendaftaran_siswa_baru_by_periode')?>",
            method: "POST",
            dataType :"json",
            data: {
            mulai : mulai,
            akhir : akhir
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
                                    '<td>'+data[i].NO_PENDAFTARAN+'</td>'+
                                    '<td>'+data[i].NAMA_JENJANG+'</td>'+
                                    '<td>'+data[i].TOTAL_TAGIHAN+'</td>'+
                                    '</tr>';
                        }
                        btn.disabled = false;
                    }else{
                        html += '<tr>'+
                                    '<td colspan = "4">'+'<center>'+"Data tidak ditemukan"+'</center>'+'</td>'+
                                '</tr>';
                        btn.disabled = true;
                        $('#total').html('0');
                    }
                    $('#show_data').html(html);
            }
        });
    }

    function getLaporanDaftarUlangByPeriode() {
        var mulai = document.getElementById('mulai_periode').value;
        var akhir = document.getElementById('akhir_periode').value;
        var btn = document.getElementById('btncetak');
        $('#periode_mulai').val(mulai);
        $('#periode_akhir').val(akhir);
        $.ajax({
            url : "<?php echo base_url('Laporan/daftar_ulang_by_periode')?>",
            method: "POST",
            dataType :"json",
            data: {
            mulai : mulai,
            akhir : akhir
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
                                    '<td>'+data[i].ID_DAFTAR_ULANG+'</td>'+
                                    '<td>'+data[i].NAMA_JENJANG+'</td>'+
                                    '<td>'+data[i].TOTAL_BIAYA_DAFTAR_ULANG+'</td>'+
                                    '</tr>';
                        }
                        btn.disabled = false;
                    }else{
                        html += '<tr>'+
                                    '<td colspan = "4">'+'<center>'+"Data tidak ditemukan"+'</center>'+'</td>'+
                                '</tr>';
                        btn.disabled = true;
                        $('#total').html('0');
                    }
                    $('#show_data').html(html);
            }
        });
    }
</script>