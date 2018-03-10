/*
 * Update Jadwal Page
 */
const btn = $('#updateJadwal tr');

for (let i = 0; i < btn.length; i++) {
	const btnDel = btn[i].querySelectorAll('.btn-delete');
	$(btnDel).click(function () {
		const idPrimary = $(this).attr('data-panel');
		const row = $(this).parent().parent();

		ajaxDelete(idPrimary, row);
	});
}

/**
 * Get Cookie
 */
const getCookie = document.cookie;
const arrCookie = getCookie.split(';');
const cookie = arrCookie[2];
// Cookie
// const cookieIndex = 'si_akademik';

function ajaxDelete(id, row) {
	const uri = document.baseURI;
	const idPrimary = id;
	const trRow = row;
	$.ajax({
		type: 'GET',
		url: uri + 'administrator/jadwal_akademik/auth_del',
		data: {id: idPrimary, si_akademik: cookie}, // eslint-disable-line camelcase
		success(output) {
			$('.result').html(output).fadeIn(300).delay(700).fadeOut(300);
			$(trRow).addClass('animated zoomOutDown').fadeOut(2000, () => {
				$(trRow).remove();
			});
		},
		error() {
		}
	});
}

/*
 * Get Nilai Siswa
 */

$('#filterTa').on('change', function () {
	const n = $(this).val();
	$('.tahun_ajaran').val(n);
});

$('#filterSr').on('change', function () {
	const s = $(this).val();
	$('.semester').val(s);
});

$('#nis').click(() => {
	$('.result-nilai').fadeOut(220);

	const uri = document.baseURI;
	const idNis = $('#nis').attr('data-nis');
	const valTa = $('.tahun_ajaran').val();
	const valSr = $('.semester').val();

	$.ajax({
		type: 'GET',
		url: uri + 'administrator/report/getNilai',
		data: {id: idNis, ta: valTa, str: valSr},
		success(output) {
			// Result Output
			$('.result-nilai').html(output).fadeIn(500).removeClass('hide');
		},
		error() {
		}
	});
});
