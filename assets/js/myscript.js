const flashdata = $('.flash-data').data('flashdata');
const notelp = $('.datatelp').data('datatelp');

	if(flashdata == "Disimpan") {
		Swal.fire({
			title : 'Berhasil',
			text : 'Data berhasil disimpan',
			icon  : 'success',
			confirmButtonText: 'OK'
		});
	}else if(flashdata == "Disimpan1") {
		Swal.fire({
			title : 'Berhasil',
			text : 'data berhasil disimpan',
			icon  : 'success',				
			confirmButtonText: 'OK'
		}).then(function() {
            document.location.href = 'Beranda/#cetak_invoice';
        });
	}else if(flashdata == "pass") {
		Swal.fire({
			title : 'Berhasil',
			text  : 'Password berhasil diubah',
			icon  : 'success'
		});
	}else if(flashdata == "ubah") {
		Swal.fire({
			title : 'Berhasil',
			text  : 'Data berhasil diubah',
			icon  : 'success'
		});
	}else if(flashdata == "Dihapus") {
		Swal.fire({
			title : 'Berhasil',
			text  : 'Data berhasil dihapus',
			icon  : 'success'
		});
	}

	$('.tombol_hapus').on('click',function(e){
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title : 'Apakah anda yakin',
			text  : 'ingin menghapus data?',
			type  : 'warning',
			confirmButtonText : 'Hapus',
			showCancelButton : true,
			confirmButtonColor : '#3085d6',
			cancelButtonColor : '#d33'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		})
	});
