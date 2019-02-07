@extends('layouts.default')
@section('content')
	<noscript>You need to enable JavaScript to run this app.</noscript>
    <section class="event-hero">
        <div class="top-menu">
        	<a class="btn btn-outline-light btn-sm text-uppercase signin" href="/signin">Sign In</a>
        </div>
        <img class="logo" src="/media/runkitek-logo-uap.png" alt="Runkitek 2019">
        <h2 class="title location">Sm By The Bay, SM MOA Pasay City</h2>
        <h2 class="title date-time">April 13, 2019 (Saturday) 4:00 am</h2>
        <a class="btn btn-secondary btn-lg text-uppercase register" href="/register">Register Now</a>
        <div class="event-background"></div>
    </section>
    <section class="event-details home">
    	<div class="content container">
    		<div class="event-box row">
    			<div class="event-title col-sm-12 col-md-12 col-lg-10 ml-lg-auto mr-lg-auto">
    				<h2 class="title">Categories and Prices</h2>
    			</div>
    			<div class="col-md-12">
    				<div class="container text-center">
    					<div class="row">
	    					<div class="col-4 text-center">
			    				<h1 class="category">3K</h1>
			    				<span class="subtitle">₱ 700</span>
			    			</div>
			    			<div class="col-4 text-center">
			    				<h1 class="category">5K</h1>
			    				<span class="subtitle">₱ 750</span>
			    			</div>
			    			<div class="col-4 text-center">
			    				<h1 class="category">10K</h1>
			    				<span class="subtitle">₱ 850</span>
			    			</div>
	    				</div>
    				</div>
    			</div>
    			
    			<div class="mt-3 text-center col-sm-12 col-md-12 col-lg-8 ml-lg-auto mr-lg-auto ">
    				<p class="my-3 event-category-details">
	    				As part of the prestige celebration of the 45th UAP National Convention, the United Architects of the Philippines (UAP) in collaboration with  Pinoy Aspiring Runners Inc. (PAR) presents to you the very first RUNKITEK 2019! This run for a cause is set to kick-off on April 13, 2019 at the SM By the Bay, Mall of Asia Complex, Pasay City.

						
    				</p>
    				<p>
    					Join us as we aim to promote health and wellness campaigns and raise funds for the community service-related initiatives and projects of UAP’s outreach program, Bayanihang Arkitektura. Register now and see you all on the race day! #Runkitek2019
    				</p>
    			</div>
    		</div>
    	</div>
    	<div class="content mt-5 container">
    		<div class="event-box row">
    			<div class="event-title col-sm-12 col-md-12 col-lg-10 ml-lg-auto mr-lg-auto">
    				<h2 class="title">April 13, 2019 (Saturday) 4:00 am</h2>
    			</div>
    			<div class="col-sm-12 col-md-10 col-md-8 mr-md-auto ml-md-auto">
    				<div class="step-wizard--indicator">
    					<div class="step-wizard--step">
	    					<p class="step-page">4:00 a.m.</p>
	    					<p class="step-text">Assembly Time<br> (Registration and <br> bag check-in)</p>
	    				</div>
	    				<div class="step-wizard--step">
	    					<p class="step-page">5:30 AM</p>
	    					<p class="step-text">10KM<br>Gun start</p>
	    				</div>
	    				<div class="step-wizard--step">
	    					<p class="step-page">5:45 AM</p>
	    					<p class="step-text">5KM<br>Gun start</p>
	    				</div>
	    				<div class="step-wizard--step">
	    					<p class="step-page">6:00 AM</p>
	    					<p class="step-text">3KM<br>Gun start</p>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <!-- <div class="content mt-5 container">
	    	<div class="event-box row">
	    		<div class="col-sm-12 col-md-8 col-md-6 mr-md-auto ml-md-auto">
	    			<video width="100%" height="auto" autoplay="" loop="">
	    				<source src="/media/video-loop.c8847d23.mp4" type="video/mp4">
	    			</video>
	    		</div>
	    	</div>
	    </div> -->
	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-12 text-center">
	    			<h4 style="color:green;">Inclusive of Singlet, Race Bib with Timing Chip, Finisher’s Medal</h4>
		    		<p>
						<i>Top 3 Finishers All Category (Men / Women) will receive cash prize and trophy</i>
					</p>
					<div style="width: max-content;text-align: left;margin: auto;">
						<b>Registration Venues:</b>
						<ul>
							<li>Online - <a href="http://www.runkitek.com/register">http://www.runkitek.com/register</a></li>
							<li>
								In Store Registration – Garmin Stores:
								<ul>
									<li>SM NORTH EDSA</li>
									<li>SM MEGAMALL</li>
									<li>SM MALL OF ASIA</li>
								</ul>
							</li>
						</ul>
						<b>For more information:</b>
						<div>
							<div>Visit - <a href="https://www.facebook.com/events/308844763306886/">https://www.facebook.com/events/308844763306886/</a></div>
							<div>Contact # - 09157688735</div>
						</div>
					</div>
	    		</div>
	    	</div>
	    </div>
	    <div class="content mt-5 container">
	    	<div class="event-box row">
	    		<div class="text-center mb-5 mx-auto col-sm-12 col-md-4">
	    			<p class="mb-2">Co-presented by:</p>
	    			<a href="#">
	    				<img src="/media/davies.jpg" class="logo-sponsors img-fluid" alt="Davies">
	    			</a>
	    		</div>
	    	</div>
	    	<div class="event-box row">
	    		<div class="text-center col-sm-12 offset-md-2 col-md-4">
	    			<p class="mb-2">Powered by:</p>
	    			<a href="https://multisyscorp.com">
	    				<img src="/media/logo-multisys.8037cfa3.png" class="logo-sponsors img-fluid" alt="MultiSys Technologies Corporation">
	    			</a>
	    		</div>
	    		<div class="text-center col-sm-12 col-md-4">
	    			<p class="mb-2">Event Specialist:</p>
	    			<a href="http://par.com.ph/">
	    				<img src="/media/logo-par.773d7a73.png" class="logo-sponsors img-fluid" alt="Pinoy Aspiring Runners">
	    			</a>
	    		</div>
	    	</div>
	    </div>
	    <div class="container">
	    	<div class="row text-center" style="padding-top:20px;">
	    		<div class="col-md-4">
	    			<img src="/media/uap.png" width="150" height="150">
	    		</div>
	    		<div class="col-md-4">
	    			<img src="/media/as.png" height="100" width="400" style="margin-top:25px;">
	    		</div>
	    		<div class="col-md-4">
	    			
	    		</div>
	    	</div>
	    </div>
    </section>
@endsection