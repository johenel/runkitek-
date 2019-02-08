$(function() {
	init();
});

function init()
{
	$('header.main-header ul li.nav-item').removeClass('active');
	$('header.main-header ul li:nth-child(3)').addClass('active');
}

