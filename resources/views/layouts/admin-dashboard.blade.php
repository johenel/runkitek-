<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	@include('includes.head')
	<script type="text/javascript" src="/js/admin.js"></script>
</head>
<body>
	<div id="adminDashboard" class="container-fluid">
		<div class="row">
			<div id="mainSideNav" class="col-md-2 sidenav">
				<ul>
					<li><a href="/admin/participants">Participants</a></li>
				</ul>
				<hr>
				<ul>
					<li><a href="/admin/logout">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<div class="main">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
</body>
</html>