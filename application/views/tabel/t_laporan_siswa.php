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
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <select class="form-control" name="kelas" id="kelas" autofocus>
                                                <option value="">- Pilih Kelas -</option>
                                                <?php foreach($kelas as $k):?>
                                                    <option value="<?php echo $k->ID_KELAS?>"><?php echo $k->NAMA_KELAS?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <button class="btn btn-primary" id="btn_pilih" onclick="get_siswa();">Pilih</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <form action="<?php echo base_url('Laporan/cetak')?>" method="POST" target="_blank">
                                                <input type="hidden" name="kelas1" id="kelas1">
                                                <input type="hidden" name="tabel" id="tabel" value="siswa">
                                                <button type="submit" class="btn btn-primary btn-round" id="btncetak" disabled style="float: right"><i class="fa fa-print"> Cetak</i></button>
                                            </form>
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
                                        <th>No</th>
                                        <th>Nomer Induk</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kelas</th>
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

<script type="text/javascript">
    function get_siswa() {
        var kelas = document.getElementById('kelas').value;
        var btn_cetak = document.getElementById('btncetak');
        $('#kelas1').val(kelas);
        $.ajax({
            url : "<?php echo base_url('Laporan/siswa_perkelas')?>",
            method: "POST",
            dataType :"json",
            data: {
            kelas : kelas
            },
            success : function(data){
                var html = '';
                    if (data.length > 0) {
                        var i;
                        var nourut = 0;
                        for(i=0; i<data.length; i++){
                            nourut += 1;
                            html += '<tr>'+
                                    '<td>'+nourut+'</td>'+
                                    '<td>'+data[i].NO_INDUK+'</td>'+
                                    '<td>'+data[i].NAMA_SISWA+'</td>'+
                                    '<td>'+data[i].ALAMAT_SISWA+'</td>'+
                                    '<td>'+data[i].TGL_LAHIR_SISWA+'</td>'+
                                    '<td>'+data[i].NAMA_KELAS+'</td>'+
                                    '</tr>';
                        }
                        btn_cetak.disabled = false;
                    }else{
                        html += '<tr>'+
                                    '<td colspan = "6">'+'<center>'+"Data tidak ditemukan"+'</center>'+'</td>'+
                                '</tr>';
                        btn_cetak.disabled = true;
                    }
                    $('#show_data').html(html);
            }
        });
    }

</script>