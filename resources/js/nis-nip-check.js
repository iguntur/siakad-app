/* eslint-disable no-unused-expressions */

$('#inputNip').on('keyup', function () {
	const i = $(this).val();
	(i === '') ? ($(this).css('border-color', 'red'), $('.nip-invalid').show().html('NIP Wajib Di Isi...!!!')) : $.ajax({
		type: 'GET',
		url: document.baseURI + 'administrator/staff/cekNip',
		data: {
			nip: i
		},
		success(i) {
			i === 'succes' ? ($('#inputNip').css('border-color', 'lime'), $('.nip-invalid').hide()) : i === 'failed' && ($('#inputNip').css('border-color', 'red'), $('.nip-invalid').show().html('NIP Sudah Terpakai'));
		},
		error() {}
	});
});

$('#inputNis').on('keyup', function () {
	const i = $(this).val();
	i === '' ? ($(this).css('border-color', 'red'), $('.nis-invalid').show().html('NIS Wajib Di Isi...!!!')) : $.ajax({
		type: 'GET',
		url: document.baseURI + 'administrator/panel_siswa/cekNis',
		data: {
			nis: i
		},
		success(i) {
			i === 'succes' ? ($('#inputNis').css('border-color', 'lime'), $('.nis-invalid').hide()) : i === 'failed' && ($('#inputNis').css('border-color', 'red'), $('.nis-invalid').show().html('NIS Sudah Terpakai'));
		},
		error() {}
	});
});
