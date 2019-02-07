$(function() {
	init();
	taaModalAgreeBtnListener();
	taaModalDismissListener();
	taaTextClickListener();
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