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
	}else if(flashdata == "error") {
		Swal.fire({
			title : 'Gagal!',
			text  : 'Mohon isi form dengan benar',
			icon  : 'error'
		});
	}else if(flashdata == "ubah") {
		Swal.fire({
			title : 'Berhasil',
			text  : 'Data berhasil diubah',
			icon  : 'success'
		});
	}