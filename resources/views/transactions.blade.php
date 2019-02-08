@extends('layouts.logged-in')
@section('content')
<script type="text/javascript" src="/js/transactions.js"></script>
<section id="transactionsPage" style="padding-bottom: 30px;">
	<div class="container">
	    <br>
	    <br>
	    <br>
	    @if($errors->any())
			<div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
		@endif
	    <div class="text-center">
	        <h1>NEW TRANSACTION</h1>
	    </div>
	    <br>
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="d-md-block d-lg-block">
	                <div class="card mb-3">
	                    <div class="card-header bg-takbro">
	                        <p class="m-0 text-uppercase"><h2>3K SHIRT</h2></p>
	                    </div>
	                    <div class="card-body p-0 m-0">
	                        <table class="table table-bordered table-condensed p-0 m-0">
	                            <tbody>
	                                <tr>
	                                    <!-- <td rowspan="7" class="text-center" style="width: 200px;"> -->
	                                        <p class="badge">Reference Number</p><img alt="jsx-a11y/alt-text" class="image-responsive" src="https://chart.googleapis.com/chart?cht=qr&amp;chl=PAWQXBE0I2&amp;chs=180x180&amp;choe=UTF-8&amp;chld=L|2">{{$draft->reference_no}}</td>
	                                    <td style="width: 200px;">Name</td>
	                                    <td><b>{{$draft->name}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Category</td>
	                                    <td><b>{{$draft->category}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Delivery Type</td>
	                                    <td><b>{{$draft->delivery_type}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Amount</td>
	                                    <td><b>{{$draft->amount}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Date</td>
	                                    <td><b>{{$draft->date}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Status</td>
	                                    <td>
	                                    	<form action="/transactions/new" method="post" style="display: inline;">
	                                    		@csrf
	                                    		<button class="btn btn-success" type="submit">Generate</button>
	                                    	</form>
	                                    	<button class="btn btn-danger">Cancel</button>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>Remarks</td>
	                                    <td><b>Size is {{$draft->size}}</b></td>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
@endsection