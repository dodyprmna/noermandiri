<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $title?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url('assets/img/logo/logo1.ico')?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url('assets/adm/js/plugin/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["<?php echo base_url('assets/adm/css/fonts.min.css')?>"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adm/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/atlantis.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/dataTables/datatables.min.css')?>">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adm/css/demo.css')?>">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="<?php echo base_url('Home')?>" class="logo">
                    <img src="<?php echo base_url('assets/img/logo/logo1.ico')?>" width="30" weight="30" alt="navbar brand" class="navbar-brand">
                    <font color="#FFFFF" size="2">&nbsp LBB Noermandiri</font>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?php echo base_url('assets/adm/img/profile.jpg')?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?php echo base_url('assets/adm/img/profile.jpg')?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $this->session->userdata('ses_nama'); ?></h4>
												<p class="text-muted"><?php echo $this->session->userdata('ses_email'); ?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url('Auth/logout')?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url('assets/adm/img/profile.jpg')?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
                                    <?php echo $this->session->userdata('ses_nama'); ?>
									<span class="user-level"><?php echo $this->session->userdata('akses'); ?></span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav nav-primary">
                        <?php if($this->session->userdata('akses')=='admin'):?>
						<li <?=$this->uri->segment(1) == 'Home' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a href="<?php echo base_url('Home')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li <?=$this->uri->segment(1) == 'Pegawai' || $this->uri->segment(1) == 'Tentor' || $this->uri->segment(1) == 'Siswa' || $this->uri->segment(1) == 'Mata_Pelajaran' || $this->uri->segment(1) == 'Ruangan' || $this->uri->segment(1) == 'Kelas' || $this->uri->segment(1) == 'Jenjang_Kelas' || $this->uri->segment(1) == 'Sesi' ? 'class="nav-item active submenu"' : 'class="nav-item"'?>>
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-database"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse <?=$this->uri->segment(1) == 'Pegawai' || $this->uri->segment(1) == 'Tentor' || $this->uri->segment(1) == 'Siswa' || $this->uri->segment(1) == 'Mata_Pelajaran' || $this->uri->segment(1) == 'Ruangan' || $this->uri->segment(1) == 'Kelas' || $this->uri->segment(1) == 'Jenjang_Kelas' || $this->uri->segment(1) == 'Sesi' ? 'show' : 'class="nav-item"'?>" id="base">
								<ul class="nav nav-collapse">
									<li <?=$this->uri->segment(1) == 'Pegawai' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Pegawai')?>">
											<span class="sub-item">Data Pegawai</span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'Tentor' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Tentor')?>">
											<span class="sub-item">Data Tentor</span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'Siswa' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Siswa')?>">
											<span class="sub-item">Data Siswa</span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'Mata_Pelajaran' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Mata_Pelajaran')?>">
											<span class="sub-item">Data Mata Pelajaran</span>
										</a>
                                    </li>
                                    <li <?=$this->uri->segment(1) == 'Ruangan' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Ruangan')?>">
											<span class="sub-item">Data Ruangan</span>
										</a>
                                    </li>
									<li <?=$this->uri->segment(1) == 'Kelas' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Kelas')?>">
											<span class="sub-item">Data Kelas Kelompok Belajar</span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'Jenjang_Kelas' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Jenjang_Kelas')?>">
											<span class="sub-item">Data Jenjang Kelas</span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'Sesi' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Sesi')?>">
											<span class="sub-item">Data Sesi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li <?=$this->uri->segment(1) == 'Pendaftaran' ? 'class="nav-item active submenu"' : 'class="nav-item"'?>>
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Data Pendaftaran</p>
								<span class="caret"></span>
							</a>
							<div class="collapse <?=$this->uri->segment(1) == 'Pendaftaran' ? 'show' : ''?>" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li <?=$this->uri->segment(2) == 'siswa_baru' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Pendaftaran/siswa_baru')?>">
											<span class="sub-item">Pendaftaran Siswa Baru
                                            </span>
										</a>
									</li>
									<li <?=$this->uri->segment(2) == 'daftar_ulang' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Pendaftaran/daftar_ulang')?>">
											<span class="sub-item">Daftar Ulang</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?=$this->uri->segment(1) == 'Pembayaran' || $this->uri->segment(1) == 'Pembayaran_daftar_ulang' ? 'active' : ''?>">
							<a data-toggle="collapse" href="#sidebarPembayaran">
								<i class="fas fa-money-bill-alt"></i>
								<p>Data Pembayaran</p>
								<span class="caret"></span>
							</a>
							<div class="collapse <?=$this->uri->segment(1) == 'Pembayaran' || $this->uri->segment(1) == 'Pembayaran_daftar_ulang'? 'show' : ''?>" id="sidebarPembayaran">
								<ul class="nav nav-collapse">
									<li <?=$this->uri->segment(2) == 'pembayaran_daftar_siswa_baru' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Pembayaran/pembayaran_daftar_siswa_baru')?>">
											<span class="sub-item">Pembayaran Daftar Siswa Baru
                                            </span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'Pembayaran_daftar_ulang' ? 'class="active"' : ''?>>
										<a href="<?php echo base_url('Pembayaran_daftar_ulang')?>">
											<span class="sub-item">Pembayaran Daftar Ulang</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?=$this->uri->segment(1) == 'Jadwal' ? 'active' : ''?>">
							<a href="<?php echo base_url('Jadwal')?>">
								<i class="fas fa-calendar-alt"></i>
								<p>Jadwal Les</p>
							</a>
                        </li>
                        <?php elseif($this->session->userdata('akses')=='pemilik'):?>
                        <li class="nav-item <?=$this->uri->segment(1) == 'Home' ? 'active' : ''?>">
							<a href="<?php echo base_url('Home')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item <?=$this->uri->segment(1) == 'Laporan' ? 'active submenu' : ''?>">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-database"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse <?=$this->uri->segment(1) == 'Laporan' ? 'show' : ''?>" id="base">
								<ul class="nav nav-collapse">
									<li class="<?=$this->uri->segment(2) == 'laporan_pendaftaran' ? 'active' : ''?>">
										<a href="components/avatars.html">
											<span class="sub-item">Laporan Pendaftaran</span>
										</a>
									</li>
									<li class="<?=$this->uri->segment(2) == 'laporan_pembayaran' ? 'active' : ''?>">
										<a href="components/buttons.html">
											<span class="sub-item">Laporan Pembayaran</span>
										</a>
                                    </li>
                                    <li class="<?=$this->uri->segment(2) == 'laporan_jadwal_les' ? 'active' : ''?>">
										<a href="components/buttons.html">
											<span class="sub-item">Laporan Jadwal Les</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                        <?php elseif($this->session->userdata('akses')=='tentor'):?>
                        <li class="nav-item <?=$this->uri->segment(1) == 'Home' ? 'active' : ''?>">
							<a href="<?php echo base_url('Home')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item <?=$this->uri->segment(1) == 'Jadwal' ? 'active' : ''?>">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-calendar-alt"></i>
								<p>Jadwal Mengajar</p>
							</a>
                        </li>
                        <?php else:?>
                        <li class="nav-item <?=$this->uri->segment(1) == 'Home' ? 'active' : ''?>">
							<a href="<?php echo base_url('Home')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item <?=$this->uri->segment(1) == 'Jadwal' ? 'active' : ''?>">
						<a href="<?php echo base_url('Jadwal')?>">
								<i class="fas fa-calendar-alt"></i>
								<p>Jadwal Les</p>
							</a>
                        </li>
                        <li class="nav-item <?=$this->uri->segment(2) == 'tambah' ? 'active' : ''?>">
							<a href="<?php echo base_url('Daftar_Ulang/tambah')?>">
								<i class="fas fa-pencil-alt"></i>
								<p>Daftar Ulang</p>
							</a>
                        </li>
                        <li class="nav-item <?=$this->uri->segment(2) == 'riwayat_pembayaran' ? 'active' : ''?>">
							<a href="<?php echo base_url('Daftar_Ulang/riwayat_pembayaran')?>">
								<i class="fas fa-money-bill-alt"></i>
								<p>Riwayat Pembayaran</p>
							</a>
                        </li>
                        <?php endif;?>    
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->