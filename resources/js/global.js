// Var htmlFooter = $('.navbar-fixed-bottom');
// var textFooter = "<p>Copyright <strong>&copy;</strong> 2015 | <a href='http://twitter.com/ghun_tur'>@Guntur</a> <strong>JavaStudio NET</strong></p>";
// htmlFooter.html(textFooter);

$('#homeBtn').click(() => {
	$('.logo-dp').addClass('animated bounceInDown');
});

/*
* Setting For Button Click
* Select Kelas
*/
$('#btnKelas10').click(() => {
	$('#tabKelas12').removeClass('show bounceInRight').addClass('deactivated animated');
	$('#tabKelas11').removeClass('show bounceInRight').addClass('deactivated animated');
	$('#tabKelas10').addClass('show animated bounceInRight');
});

$('#btnKelas11').click(() => {
	$('#tabKelas12').removeClass('show bounceInRight').addClass('deactivated animated');
	$('#tabKelas10').removeClass('show bounceInRight').addClass('deactivated animated');
	$('#tabKelas11').addClass('show animated bounceInRight');
});

$('#btnKelas12').click(() => {
	$('#tabKelas10').removeClass('show bounceInRight').addClass('deactivated animated');
	$('#tabKelas11').removeClass('show bounceInRight').addClass('deactivated animated');
	$('#tabKelas12').addClass('show animated bounceInRight');
});

/*
* Setting Add Row
* Setup jadwal akademik
*/
$('#addRowJadwal').click(() => {
	const jadwalAkademik = $('#jadwalAkademik');
	const firstRow = $('#rowFirst');
	jadwalAkademik.append('<tr id=\'rowFirst\'>' + firstRow.html() + '</tr>');

	// --------------------------
	// Remove Row Jadwal
	const a = document.getElementById('jadwalAkademik');
	const b = a.querySelectorAll('tr');

	for (let i = 0; i < b.length; i++) {
		const btnID = b[i].querySelectorAll('#delRow');
		$(btnID).click(function () {
			const $ = this;
			const trRow = $.parentElement.parentElement;
			trRow.remove();
		});
	}

	return false;
});

// For Update Jadwal
$('.upjk').hide();
$('.btn-show').click(() => {
	$('.upjk').show();
});

