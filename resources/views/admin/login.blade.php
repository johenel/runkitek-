@extends('layouts.default')
@section('content')
<section id="adminLogin">
	<div class="container text-center">
		<div class="row">
			<div class="col-md-12">
				<div class="login-form-box card text-left">
					@if($errors->any())
						<div class="alert alert-danger" role="alert">
		                    @foreach($errors->all() as $error)
		                        <p>{{$error}}</p>
		                    @endforeach
		                </div>
					@endif
					<div class="card-header">
						Runkitek ADMINISTRATOR
					</div>
					<div class="card-body">
						<form action="/admin/login" method="post">
							@csrf
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" required>
							</div>
							<input type="submit" value="LOGIN" class="btn btn-default form-control" style="border: solid 1px #ddd;background: #888;color:white">
						</form>
					</div>
					<div class="card-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection