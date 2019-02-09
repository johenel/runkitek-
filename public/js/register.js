$(function() {
	init();
	taaModalAgreeBtnListener();
	taaModalDismissListener();
	taaTextClickListener();
	registerSubmitBtnListener();
});

function init()
{

}

function taaTextClickListener()
{
	$('.taa-text').click(function() {
		$('#termsAndAgreementModal').modal('show');
	});
}

function registerSubmitBtnListener()
{
	$('form button[type=submit]').click(function(e) {
			let a = $('input[name=terms_and_agreement]').is(':checked');
			let b = $('input[name=email]').length;
			let c = $('input[name=first_name]').length;
			let c2 = $('input[name=password]').length;
			let c3 = $('input[name=last_name]').length;
			let c4 = $('input[name=password]').length;
			let c5 = $('input[name=password_confirmation]').length;
			let d = $('input[name=download-waiver]').is(':checked');

			

			if(a && d && b > 0 && c > 0 && c3 > 0 && c4 > 0 && c5 > 0) {
				$('a.waiver-download')[0].click();	
			}
	});
}

function taaModalDismissListener()
{
	$('#termsAndAgreementModal').on('hidden.bs.modal', function () {
	    	$('.event-box input[type=checkbox]').prop('checked', false);
	});
}

function taaModalAgreeBtnListener()
{
	$('#termsAndAgreementModal button.agree').click(function() {
		$('#termsAndAgreementModal').modal('hide');
		$('.event-box input[type=checkbox]').prop('checked', true);
	});
}