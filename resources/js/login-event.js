$('#btnLogin')
	.mouseenter(function () {
		$(this).removeClass('fa-lock').addClass('fa-unlock');
	})
	.mouseout(function () {
		$(this).removeClass('fa-unlock').addClass('fa-lock');
	});
