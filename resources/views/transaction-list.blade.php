@extends('layouts.logged-in')
@section('content')
<script type="text/javascript" src="/js/transactions.js"></script>
<section id="transactionsPage" style="padding-bottom: 30px;">
	@if($success)
	<div class="container">
	    <br>
	    <br>
	    <br>
	    <div class="text-center">
	        <h1>TRANSACTION</h1>
	    </div>
	    <br>
	    <div class="row">
	        <div class="col-lg-12">
	        	
	            <div class="d-md-block d-lg-block">
	                <div class="card mb-3">
	                    <div class="card-header bg-takbro">
	                        <p class="m-0 text-uppercase"><h2>{{$transaction->category}} SHIRT</h2></p>
	                    </div>
	                    <div class="card-body p-0 m-0">
	                        <table class="table table-bordered table-condensed p-0 m-0">
	                            <tbody>
	                                <tr>
	                                    <td rowspan="10" class="text-center" style="width: 200px;">
	                                        <p class="badge">Reference Number</p><img alt="jsx-a11y/alt-text" class="image-responsive" src="https://chart.googleapis.com/chart?cht=qr&amp;chl={{$transaction->reference_no}}&amp;chs=180x180&amp;choe=UTF-8&amp;chld=L|2">{{$transaction->reference_no}}</td>
	                                    <td style="width: 200px;">Name</td>
	                                    <td><b>
	                                    	{{session()->get('user')->first_name}} {{session()->get('user')->last_name}}
	                                    </b></td>
	                                </tr>
	                                 <tr>
	                                    <td>Email</td>
	                                    <td><b>{{session()->get('user')->email}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Category</td>
	                                    <td><b>{{$transaction->category}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Delivery Type</td>
	                                    <td><b>{{$transaction->delivery_type}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Amount</td>
	                                    @if($transaction->delivery_type == 'DELIVERY')
	                                    	<td><b>{{$transaction->amount}}</b> (150 Delivery Fee)</td>
	                                    @else
	                                    	<td><b>{{$transaction->amount}}</b></td>
	                                    @endif
	                                    
	                                </tr>
	                                <tr>
	                                    <td>Contact #</td>
	                                    <td><b>{{session()->get('user')->details->contact_number}}</b> </td>
	                                </tr>
	                                <tr>
	                                    
	                                    @if($transaction->delivery_type == 'DELIVERY')
	                                    <td>Delivery Address</td>
	                                    <td><b>{{session()->get('user')->details->delivery_address}}</b></td>
	                                    @else
	                                    <td>Pick Up Address</td>
	                                    <td><b>{{$transaction->pickup_location}}</b></td>
	                                    @endif
	                                </tr>
	                                <tr>
	                                    <td>Date</td>
	                                    <td><b>{{$transaction->created_at}}</b></td>
	                                </tr>
	                                <tr>
	                                    <td>Status</td>
	                                    <td>
	                                    	@if($transaction->status == null)
	                                    	<b>Initiated <span style="font-weight: normal;font-size: 14px;"><a href="{{$transaction->digest}}" style="color:orange;">(Confirm transaction here)</a></span></b>
	                                    	@else
	                                    		@if($transaction->status == 'P') 
	                                    			<b style="color:orange">PENDING</b>
	                                    		@else
	                                    			<b style="color:green">PAID</b>
	                                    		@endif
	                                    	
	                                    	@endif
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td>Remarks</td>
	                                    <td><b>Size is {{$transaction->size}}</b></td>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	           
	        </div>
	    </div>
	</div>
	@else
		<div class="container text-center" style="height: 100vh;padding-top:40px;">
			<h1 style="color:red">NO TRANSACTIONS HAS BEEN MADE</h1>
		</div>
    	
    @endif
</section>
@endsection