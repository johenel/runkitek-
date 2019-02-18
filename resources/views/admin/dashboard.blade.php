@extends('layouts.admin-dashboard')
@section('content')
<section id="dashboardPage">
	<h1>Participants</h1>
	<hr>
	<a href="/admin/participants/export" class="btn btn-success" type="button">Excel Report</a>
	<p></p>
	<form id="statusFilterForm" action="/admin/participants/filter" method="get">
		<div class="filter-status" style="margin-bottom: 20px;display: inline-block;vertical-align: top;margin-right: 20px;">
			<div>
				<label for="inputLastName" class="rs-element rs-form-label"><b>STATUS FILTER</b></label>
			</div>
			<div class="radio-group d-inline">
				<input type="radio" name="rg_status" value="all" @if($filter_status=='all') checked @endif>
				<span>ALL</span>
			</div>
			<div class="radio-group d-inline">
				<input type="radio" name="rg_status" value="S" @if($filter_status=='S') checked @endif>
				<span>PAID</span>
			</div>
			<div class="radio-group d-inline">
				<input type="radio" name="rg_status" value="P" @if($filter_status=='P') checked @endif>
				<span>PENDING</span>
			</div>
		</div>
		<div class="filter-date" style="width:300px;margin-bottom: 20px;display: inline-block;">
			<label for="inputLastName" class="rs-element rs-form-label"><b>REGISTRATION DATE FILTER</b></label>
	        <div class="rs-element rs-input -full">
	            <div class="rs-input-wrap">
	                <div class="input-group date">
					    <input type="text" class="form-control" name="date" value="{{$filter_date}}" autocomplete="off" required>
					    <div class="input-group-addon">
					        <i class="fa fa-calendar" aria-hidden="true"></i>
					    </div>
					</div>
	            </div>
	        </div>
	        <button type="button" class="btn btn-primary clear-date" style="margin-top: 10px;">CLEAR DATE</button>
		</div>
	</form>
	<div class="data-table">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Full Name</th>
				<th>Nick Name</th>
				<th>Email</th>
				<th>Contact #</th>
				<th>Have Transaction?</th>	
				<th>TXNID</th>
				<th>Reference No.</th>
				<th>Status</th>
				<th>Amount</th>
				<th>Payment Channel</th>
				<th>Delivery Type</th>
				<th>Category</th>
				<th>Size</th>
				<th>Delivery Region</th>
				<th>Delivery Address</th>
				<th>Pick Up Location</th>
				<th>Transaction Date</th>
				<th>Participant Address</th>
				<th>Emergency Contact Name</th>
				<th>Emergency Contact Relationship</th>
				<th>Emergency Contact Number</th>
				<th>Registration Date</th>
			
			</thead>
			<tbody>
				@foreach($participants as $p)
					<tr>
						<td>{{$p->first_name}} {{$p->last_name}}</td>
						<td>{{$p->details['nick_name']}}</td>
						<td>{{$p->email}}</td>
						<td>{{$p->details['contact_number']}}</td>
						<td>
							@if(count($p->transactions) > 0)
								<span style="color:green">YES</span>
							@else
								<span style="color:orange">NO</span>
							@endif
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									{{$t->id}}
								</div>
							@endforeach
							
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									{{$t->reference_no}}
								</div>
							@endforeach
							
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									@if($t->status == 'P')
										<span style="color:orange;font-weight: bold;">PENDING</span>
									@elseif($t->status == 'S') 
										<span style="color:green;font-weight: bold;">PAID</span>
									@else 
										<span style="color:red;font-weight: bold;">INITIATED</span>
									@endif
								</div>
							@endforeach
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									{{$t->amount}}
								</div>
							@endforeach
							
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									{{$t->payment_channel}}
								</div>
							@endforeach
							
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									{{$t->delivery_type}}
								</div>
							@endforeach
							
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									{{$t->category}}
								</div>
							@endforeach
							
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									{{$t->size}}
								</div>
							@endforeach
							
						</td>
						<td>
							{{$p->details['delivery_region']}}
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									@if($t->delivery_type == 'DELIVERY')
										{{$p->details['delivery_address']}}
									@endif
								</div>
							@endforeach
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									@if($t->delivery_type != 'DELIVERY')
										{{$t->pickup_location}}
									@endif
								</div>
							@endforeach
							
						</td>
						<td>
							@foreach($p->transactions as $t)
								<div class="t-item" style="height:35px;padding-top: 5px;padding-bottom: 5px;border-bottom: solid 1px #eee;">
									{{$t->created_at}}
								</div>
							@endforeach
							
						</td>
						<td>
							{{$p->details['delivery_address']}}
						</td>
						<td>
							{{$p->details['emergency_contact_name']}}
						</td>
						<td>
							{{$p->details['emergency_contact_relationship']}}
						</td>
						<td>
							{{$p->details['emergency_contact_number']}}
						</td>
						<!-- LAST COLUMN -->
						<td>
							{{$p->created_at}}
						</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>			
</section>
@endsection