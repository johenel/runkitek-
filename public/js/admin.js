$(function() {
	init();
	usersDataTablesInit();
	filterStatusChangeListener();
	initDatePicker();
});

function init()
{

}

function initDatePicker()
{
	$('.input-group.date').datepicker({
		autoclose: true
	});
}

function filterStatusChangeListener()
{
	$('input[name=rg_status]').click(function() {
		$('#statusFilterForm').submit();
	});

	$('input[name=date]').change(function() {
		$('#statusFilterForm').submit();
	});

	$('.clear-date').click(function() {
		$('input[name=date]').val('');
		$('#statusFilterForm').submit();
	});
}

function usersDataTablesInit()
{
	let table = $('.data-table table').DataTable({
		"scrollX": true,
		"autoWidth": false,
		 "order": [[ 19, "desc" ]]
	});
}

