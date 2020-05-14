<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Form Upload Modul Pembelajaran</h2>
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
                                    <?php echo $this->session->flashdata('error')?>
                                    <?php echo form_open_multipart('Materi_pembelajaran/simpan')?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Judul</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="judul" name="judul" required onchange="cek_data()" />
                                                    <div style="margin-bottom:-10px; display: none" id="keterangan"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Jenjang Kelas</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-select-list">
                                                        <select class="form-control" name="jenjang" id="jenjang" required>
                                                            <option value="">-Pilih Jenjang Kelas-</option>
                                                            <?php
                                                            foreach ($jenjang as $jjg) { ?>
                                                                <option value="<?php echo $jjg->ID_JENJANG;?>"><?php echo $jjg->NAMA_JENJANG;?></option>
                                                            <?php
                                                            }
                                                            ?>
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
                                                        <select class="form-control" name="mapel" id="mapel" required>
                                                            <option value="">-Pilih Mata Pelajaran -</option>
                                                            <?php
                                                            foreach ($mapel as $m) { ?>
                                                                <option value="<?php echo $m->ID_MAPEL;?>"><?php echo $m->NAMA_MAPEL;?></option>
                                                            <?php
                                                            }
                                                            ?>
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
                                                    <label>File</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="file" id="modul" name="modul" required />
                                                    <div>(ukuran file maksimal 5 mb dan tipe pdf)</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                                                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah" id="btn_submit" disabled>Submit</button> 
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
    function cek_data() {
        var judul = document.getElementById('judul').value;
        var btn = document.getElementById('btn_submit');
        var ket = document.getElementById('keterangan');
        $.ajax({
            url : "<?php echo base_url('Materi_pembelajaran/cek_data')?>",
            method: "POST",
            dataType :"json",
            data: {
            judul : judul
            },
            success : function(data){
                
                html ='<span style="color:red;font-size:12px" id="keterangan">*Judul sudah digunakan, silahkan mengganti dengan judul yang lain</span>';

                if (data > 0) {
                    btn.disabled = true;
                    $('#keterangan').css("display","inline");
                    $('#keterangan').html(html);
                }else{
                    btn.disabled = false;
                    $('#keterangan').css("display","none");
                }
            }
        });
    }
    
</script>                    