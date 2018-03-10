const _btnReqNilai = $('#getRequestNilai');

_btnReqNilai.on('click', function () {
	const a = $('#sKelas').val();
	const t = $('#sTa').val();
	const e = $('#sSemester').val();
	const s = $('#sMapel').val();
	const n = $(this).attr('data-nip');

	$('#show_dataTable').fadeOut(100);
	$.ajax({
		type: 'GET',
		url: document.baseURI + 'staff/data_nilai/reqDataSiswa',
		data: {
			nip: n,
			kelas: a,
			tahun_ajaran: t, // eslint-disable-line camelcase
			semester: e,
			mapel: s
		},
		success(n) {
			return $('#show_dataTable').fadeIn(100, () => {
				$('.result-nilai-siswa').fadeIn(100, function () {
					$(this).html(n);
					$('.show_nama_kelas').html(a);
					$('.show_tahun_ajaran').html(t);
					$('.show_semester').html(e);
					$('.show_mapel').html(s);
				});
			});
		},
		error() {}
	});
});
