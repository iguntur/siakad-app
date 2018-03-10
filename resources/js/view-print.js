// Button Close Window
function closeWindow() { // eslint-disable-line no-unused-vars
	window.close();
}

// Function Print Window
function printWindow(id) { // eslint-disable-line no-unused-vars
	const data = $(id).html();
	$('.btn').remove();

	window.print(data);

	window.close();
}
