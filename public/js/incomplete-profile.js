$(function() {
	init();
	avatarUploadBtnListener();
	avatarChangeListener();
});

function init()
{
	initDatePicker();
}

function initDatePicker()
{
	$('.input-group.date').datepicker({
		autoclose: true
	});
}

function avatarUploadBtnListener()
{
	$('#avatarUploadBtn').click(function() {
		$('input[name=avatar_img]').click();
	});
}

function avatarChangeListener()
{
	$('input[name=avatar_img]').change(function() {
		logoPreviewUrl(this);
	});
}

function logoPreviewUrl(input)
{
	if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	    	$('.form-avatar span.initial-name').remove();
	    	$('.form-avatar').append('<img src="'+e.target.result+'" style="width:100%;height:100%;">');
	    }

	    reader.readAsDataURL(input.files[0]);
	  }
}