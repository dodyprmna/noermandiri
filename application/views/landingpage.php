<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="<?php echo base_url('assets/img/logo1.png')?>" type="image/png" />
    <title>LBB Noermandiri</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/flaticon.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/owl-carousel/owl.carousel.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/nice-select/css/nice-select.css')?>" />
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>"></div>
            <div class="datatelp" data-datatelp="<?= $this->session->flashdata('notelp')?>"></div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="#home"
              ><img src="<?php echo base_url('assets/img/logo1.png')?>" width="40px" height="40px" alt=""
            /> LBB Noermandiri</a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#ff">About</a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Pages</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="courses.html">Courses</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="course-details.html"
                        >Course Details</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="elements.html">Elements</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Blog</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="single-blog.html"
                        >Blog Details</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('Auth')?>">Login</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area" id="home">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <p class="text-uppercase">
                  Selamat Datang di
                </p>
                <h2 class="text-uppercase mt-4 mb-5">
                  Lembaga Bimbingan Belajar Noermandiri
                </h2>
                <div>
                  <a href="#pendaftaran" class="primary-btn2 mb-3 mb-sm-0">Pendaftaran Siswa Baru</a>
                  <a href="<?php echo base_url('Pendaftaran/daftar_ulang')?>" class="primary-btn ml-sm-3 ml-0">Daftar Ulang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top" id="biaya">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Daftar Biaya Les</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="20%">No.</th>
                  <th width="30%">Jenjang Kelas</th>
                  <th width="50%">Biaya</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $nourut = 1;
                  foreach ($jkelas as $jk) {
                  ?>
                  <tr>
                      <td><?php echo $nourut++?></td>
                      <td><?php echo $jk->NAMA_JENJANG; ?></td>
                      <td>Rp. <?php echo number_format($jk->BIAYA,2,',','.') ?>/Semester</td>
                  </tr>
                  <?php
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <hr style="margin-bottom: 5em">
    <div class="popular_courses" id="pendaftaran">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Pendaftaran Siswa Baru</h2>
              <hr>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card" style="background-color: #f2f4f7; border-color: #c5ccd6">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <form method="POST" action="<?php echo base_url('Pendaftaran/tambah_pendaftaran_siswa_baru')?>">
                      <div class="row">
                        <div class="col-lg-8 offset-lg-2 mt-5">
                          <div class="form-group">
                            <div class="row">
                                <div  class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Nama Lengkap</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="nama" id="nama" required value="<?php echo set_value('nama'); ?>"/>
                                    <?php echo form_error('nama'); ?>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div  class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Alamat Rumah</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="alamat" id="alamat" required value="<?php echo set_value('alamat'); ?>"/>
                                    <?php echo form_error('alamat'); ?>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Tanggal Lahir</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required value="<?php echo set_value('tgl_lahir'); ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Asal Sekolah</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" required value="<?php echo set_value('asal_sekolah'); ?>"/>
                                    <?php echo form_error('asal_sekolah'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Telepon</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" name="telepon" id="telepon" required value="<?php echo set_value('telepon'); ?>"/>
                                    <?php echo form_error('telepon'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Telepon Orang Tua</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" name="telepon_ortu" id="telepon_ortu" required value="<?php echo set_value('telepon_ortu'); ?>"/>
                                    <?php echo form_error('telepon_ortu'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Email</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" name="email_pendaftaran" id="email_pendaftaran" onchange="cek_email()" required value="<?php echo set_value('email_pendaftaran'); ?>"/>
                                    <div style="margin-bottom: -10px"><span class="notif_email" style="color: red;font-size: 12" id="notif_email"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Jenjang Kelas</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-select-list">
                                        <select class="form-control custom-select-value" name="jenjang" id="jenjang" required>
                                            <option value="">-Pilih Jenjang Kelas-</option>
                                            <?php
                                            foreach ($jkelas as $jenjang) { ?>
                                            <option value="<?php echo $jenjang->ID_JENJANG;?>"><?php echo $jenjang->NAMA_JENJANG;?></option>
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
                                <div class="col-lg-3 offset-lg-1">
                                    <strong><label style="color: #002347">Jenis Kelamin</label></strong>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-select-list">
                                        <select class="form-control custom-select-value" name="jk" id="jk" required>
                                            <option value="">- Pilih Jenis Kelamin -</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="login-btn">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-6">
                                        <div class="login-horizental cancel-wp pull-left">
                                            <button type="reset" class="btn btn-danger" name="Batal">Batal</button>&nbsp;
                                            <button type="submit" class="btn btn-primary" name="simpan" id="btn_daftar" disabled>Daftar</button>
                                        </div>
                                    </div>
                                </div>
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
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Cetak Invoice =================-->
    <div class="section_gap registration_area" id="cetak_invoice">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="main_title">
              <h2 class="text-white">Download bukti pendaftaran</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12 mt-5">
                    <form class="form_area" id="form-invoice" action="<?php echo base_url('Pendaftaran/cetak_bukti_pendaftaran_siswa_baru')?>" method="POST">
                      <div class="row">
                        <div class="col-lg-12">
                          <input class="form-control" type="email" name="email" id="email" placeholder="Masukkan email anda" onchange="cek_data_pendaftaran()" />
                        </div>
                        <div class="col-lg-12 form_group">
                          <center><label id="keterangan">
                          </label></center>
                        </div>
                        <div class="col-lg-12 text-center">
                          <button class="btn btn-primary" id="btncetak" disabled>Cetak</button>
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
    <!--================ End Cetak Invoice =================-->

    <!--================ Start Trainers Area =================-->
    <section class="trainer_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Our Expert Trainers</h2>
              <p>
                Replenish man have thing gathering lights yielding shall you
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center d-flex align-items-center">
          <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="<?php echo base_url('assets/img/trainer/t1.jpg')?>" alt="" />
            </div>
            <div class="meta-text text-sm-center">
              <h4>Mated Nithan</h4>
              <p class="designation">Sr. web designer</p>
              <div class="mb-4">
                <p>
                  If you are looking at blank cassettes on the web, you may be
                  very confused at the.
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="<?php echo base_url('assets/img/trainer/t2.jpg')?>" alt="" />
            </div>
            <div class="meta-text text-sm-center">
              <h4>David Cameron</h4>
              <p class="designation">Sr. web designer</p>
              <div class="mb-4">
                <p>
                  If you are looking at blank cassettes on the web, you may be
                  very confused at the.
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="<?php echo base_url('assets/img/trainer/t3.jpg')?>" alt="" />
            </div>
            <div class="meta-text text-sm-center">
              <h4>Jain Redmel</h4>
              <p class="designation">Sr. Faculty Data Science</p>
              <div class="mb-4">
                <p>
                  If you are looking at blank cassettes on the web, you may be
                  very confused at the.
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="<?php echo base_url('assets/img/trainer/t4.jpg')?>" alt="" />
            </div>
            <div class="meta-text text-sm-center">
              <h4>Nathan Macken</h4>
              <p class="designation">Sr. web designer</p>
              <div class="mb-4">
                <p>
                  If you are looking at blank cassettes on the web, you may be
                  very confused at the.
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Trainers Area =================-->

    <!--================ Start Events Area =================-->
    <div class="events_area"  id="">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">//////</h2>
            </div>
          </div>
        </div>
        <!--  -->
      </div>
    </div>
    <!--================ End Events Area =================-->

    <!--================ Start Testimonial Area =================-->
    <div class="testimonial_area section_gap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Client say about me</h2>
              <p>
                Replenish man have thing gathering lights yielding shall you
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="testi_slider owl-carousel">
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="<?php echo base_url('assets/img/testimonials/t1.jpg')?>" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Elite Martin</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="<?php echo base_url('assets/img/testimonials/t2.jpg')?>" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Davil Saden</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="<?php echo base_url('assets/img/testimonials/t1.jpg')?>" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Elite Martin</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="<?php echo base_url('assets/img/testimonials/t2.jpg')?>" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Davil Saden</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="<?php echo base_url('assets/img/testimonials/t1.jpg')?>" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Elite Martin</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="testi_item">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <img src="<?php echo base_url('assets/img/testimonials/t2.jpg')?>" alt="" />
                </div>
                <div class="col-lg-8">
                  <div class="testi_text">
                    <h4>Davil Saden</h4>
                    <p>
                      Him, made can't called over won't there on divide there
                      male fish beast own his day third seed sixth seas unto.
                      Saw from
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Testimonial Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
        <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="text-white">Contact Us</h2>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-10 offset-lg-1">
            
          </div>
        </div>
      </div>
        <div class="row footer-bottom d-flex justify-content-between" align="center">
          <p class="col-lg-12 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; 2019 Lembaga Bimbingan Belajar Noermandiri
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </footer>
    <!--================ End footer Area  =================-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/popper.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/nice-select/js/jquery.nice-select.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendors/owl-carousel/owl.carousel.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/owl-carousel-thumb.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.ajaxchimp.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/mail-script.js')?>"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="<?php echo base_url('assets/js/gmaps.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/theme.js')?>"></script>
    <script src="<?= base_url('assets/js/sweetalert/sweetalert2.all.min.js')?>"></script>
    <script src="<?= base_url('assets/js/myscript.js')?>"></script>

    
  </body>

<script >
    function cek_data_pendaftaran(){
          var email = document.getElementById('email').value;
          var btn = document.getElementById('btncetak');
          $.ajax({
              url : "<?php echo base_url('Pendaftaran/cek_pendaftaran')?>",
              method: "POST",
              dataType :"json",
              data: {
              email : email
              },
              success : function(data){
                  var html = '';
                  if (data.length > 0) {
                      document.getElementById('keterangan').innerHTML = "Data ditemukan";
                      btn.disabled = false;
                  }else{
                      document.getElementById('keterangan').innerHTML = "Data tidak ditemukan, silahkan masukkan email dengan benar";
                      btn.disabled = true;
                  }
              }
          });
      }

      function cek_email(){
          var email = document.getElementById('email_pendaftaran').value;
          var btn = document.getElementById('btn_daftar');
          $.ajax({
              url : "<?php echo base_url('Pendaftaran/cek_email')?>",
              method: "POST",
              dataType :"json",
              data: {
              email : email
              },
              success : function(data){
                console.log(data);
                  var html = '';
                  if (data.length > 0) {
                      document.getElementById('notif_email').innerHTML = "*email sudah terdaftar";
                      btn.disabled = true;
                  }else{
                      document.getElementById('notif_email').innerHTML = "";
                      btn.disabled = false;
                  }
              }
          });
      }

      function validasi_nama() {
        var nama = document.getElementById('nama').value;
        if (nama.length > 30) {
            $('.notif_nama').show();
            document.getElementById('notif_nama').innerHTML = "*nama maksimal 30 karakter";
        }
      }

</script>

</html>


