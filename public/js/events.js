$(function() {
	init();
	chooseCategoryBtnListener();
});

function init()
{
	$('header.main-header ul li.nav-item').removeClass('active');
	$('header.main-header ul li:nth-child(2)').addClass('active');
}

function chooseCategoryBtnListener()
{
	$('form button.choose-cat').click(function() {
		let cat = $(this).attr('category');
		let amount = $(this).attr('amount');
		$('form').append('<input type="hidden" name="category" value="'+cat+'">');
		$('form').append('<input type="hidden" name="amount" value="'+amount+'">');
		$('form').submit();	
	});
}