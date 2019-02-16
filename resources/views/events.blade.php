@extends('layouts.logged-in')
@section('content')
<script type="text/javascript" src="/js/events.js"></script>
<section  class="event-details-small">
    <div class="content container">
        <div class="event-box">
            <div class="event-cover">
                <img src="/media/runkitek-logo-uap.jpg" alt="Runkitek" style="width: 120px;border-radius: 100%;">
            </div>
            <div class="event-info">
                <div class="event-title">
                    <h2 class="title">Runkitek 2019</h2>
                </div>
                <div class="event-timedate">
                    <p class="text-details day">Sm By The Bay, SM MOA Pasay City</p>
                </div>
                <div class="event-location">
                    <p class="text-details building">April 13, 2019 (Saturday) 4:00 am</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="eventsPage" class="register-section">
    <div class="container">
        <div class="register-header">
            <h3 class="subtitle">Complete your registration on</h3>
            <h1 class="title">RUNKITEK 2019</h1>
        </div>
        <div class="register-content">
            @if($errors->any())
                <div class="alert alert-danger" >
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
           	<form action="/transactions/new" method="post">
           		@csrf
			    <div class="form-box">
			        <div class="form-body p-3">
			            <h3 class="my-5 title text-center font-weight-bold">Select your category and delivery options</h3>
			            <div class="form-group form-row">
			                <div class="col-md-5 mx-auto">
			                	<img src="/media/shirt-sizes.36c54dc0.png" class="img-fluid" alt="Shirt Sizes">
			                </div>
			            </div>
			            <div class="form-group form-row">
			                <div class="offset-lg-2 col-lg-4">
			                    <label for="inputKitSize" class="rs-element rs-form-label">Shirt Sizes <span class="required">*</span></label>
			                    <select id="shirtSizeSelect" class="form-control" name="shirt_size">
			                    	<option>XXS</option>
			                    	<option>XS</option>
			                    	<option>S</option>
			                    	<option selected>M</option>
			                    	<option>L</option>
			                    	<option>XL</option>
			                    	<option>XXL</option>
			                    	<option>XXXL</option>
			                    </select>
			                </div>
			                <div class="col-lg-4">
			                    <label for="inputDeliveryType" class="rs-element rs-form-label">Delivery Type <span class="required">*</span></label>
			                   	<select id="deliveryTypeSelect" class="form-control" name="delivery_type">
			                   		<option>PICK UP</option>
			                   		<option selected>DELIVERY</option>
			                   	</select>
			                   	<div class="optional-pickup-location" style="margin-top: 10px;display: none;">
			                   		<label for="inputPickupLoc" class="rs-element rs-form-label">Pick Up Location <span class="required">*</span></label>
			                   		<select id="pickupLocSelect" class="form-control" name="pickup_location">
			                   			<option>GARMIN STORE - SM NORTH EDSA</option>
			                   			<option>GARMIN STORE - SM MEGAMALL</option>
			                   			<option>GARMIN STORE - SM MALL OF ASIA</option>
			                   			<option>United Architect of the Philippines National Headquarters (#53 Scout Rallos st. Barangay Laging Handa Quezon City)</option>
			                   		</select>
			                   	</div>
			                </div>
			                <div class="offset-lg-2 col-lg-8">
			                    <div class="row">
			                        <div class="mt-3 col-12">
			                            <h2 class="title text-center">Categories and Prices</h2></div>
			                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
			                            <div class="event-category">
			                                <h1 class="category">3K</h1>
			                                <h3 class="subtitle">₱ 700</h3>
			                                <div class="event-actions">
			                                    <button class="btn btn-sm btn-secondary choose-cat" type="button" category="3K" amount="700">Choose</button>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
			                            <div class="event-category">
			                                <h1 class="category">5K</h1>
			                                <h3 class="subtitle">₱ 750</h3>
			                                <div class="event-actions">
			                                    <button class="btn btn-sm btn-secondary choose-cat" type="button" category="5K" amount="750">Choose</button>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
			                            <div class="event-category">
			                                <h1 class="category">10K</h1>
			                                <h3 class="subtitle">₱ 850</h3>
			                                <div class="event-actions">
			                                    <button class="btn btn-sm btn-secondary choose-cat" type="button" category="10K" amount="850">Choose</button>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                    
			                </div>
			            </div>
			            <div class="col-lg-12 text-center mt-5"><small style="color:red;">Note: Additional delivery fee of <b>150 PHP for LUZON region</b> and <b>200 PHP for VISAYAS and MINDANAO region</b> + 50 PHP to use this e-payment service</small>
			                <p class="my-3 desc-btm" style="    padding: 20px;
    border: dashed 1px #ddd;">Join us as we aim to promote health and wellness campaigns and raise funds for the community service-related initiatives and projects of UAP’s outreach program, Bayanihang Arkitektura. Register now and see you all on the race day! #Runkitek2019</p>
			            </div>
			            <div class="row partners-images text-center">
			            	<div class="col-md-12">
			            		<h1>Bayad Center Authorized Partners</h1>
			            		<p>BAYAD CENTER BRANCH LOCATOR</p>
			            		<p>LINK: <a target="_blank" href="http://www.bayadcenter.com/branchdirectory" style="font-size: 24px;color:red;">http://www.bayadcenter.com/branchdirectory</a></p>
			            		<p>Biller Name: <b style="color:blue;">Pinoy Aspiring Runners Inc.</b></p>
			            	</div>
			            	<div class="col-md-4">
			            		<img src="/media/bayadcenter.png" height="313" width="250" style="width:250px;" class="bayadcenterlogo">
			            	</div>
			            	<div class="col-md-4">
			            		<img src="/media/bayadcenter2.png">
			            	</div>
			            	<div class="col-md-4">
			            		<img src="/media/bayadcenter3.png">
			            	</div>
			            	<div class="col-md-12">
			            		<img src="/media/resibo.png" style="width: fit-content;" class="resiboimg">
			            	</div>
			            </div>
			        </div>

			    </div>

			</form>

        </div>
    </div>
</section>
@endsection