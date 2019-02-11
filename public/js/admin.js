$(function() {
	init();
	usersDataTablesInit();
});

function init()
{

}

function usersDataTablesInit()
{
	$('.data-table table').dataTable({
		"scrollX": true,
		"autoWidth": false,
		 "order": [[ 19, "desc" ]]
	});
}

