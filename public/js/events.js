$(function() {
	init();
	chooseCategoryBtnListener();
	deliverySelectChangeListener();
});

function init()
{
	$('header.main-header ul li.nav-item').removeClass('active');
	$('header.main-header ul li:nth-child(2)').addClass('active');
}

function chooseCategoryBtnListener()
{
	$('form button.choose-cat').click(function(e) {
		e.preventDefault();
		//set Category and Amount hidden Input
		let cat = $(this).attr('category');
		let amount = $(this).attr('amount');
		$('form').append('<input type="hidden" name="category" value="'+cat+'">');
		$('form').append('<input type="hidden" name="amount" value="'+amount+'">');
		
		//Set pickup location optional input
		let dt = $('#deliveryTypeSelect').val();
		if(dt == 'DELIVERY') {
			$('.optional-pickup-location').remove();	
		}

		$('form').submit();	
	});
}

function deliverySelectChangeListener()
{
	$('#deliveryTypeSelect').change(function() {
		let val = $(this).val();
		if(val == 'DELIVERY') {
			$('.optional-pickup-location').css('display','none');
		} else {
			$('.optional-pickup-location').css('display', 'block');
		}
	});
}