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
	    		<div class="col-md-12">
    				<div class="row race-freebies">
    					<div class="col-md-12 col-sm-12">
    						<img src="/media/Runkitek Banner 01.jpg" class="img-thumbnail">
    					</div>
    					<div class="col-md-12 col-sm-12">
    						<img src="/media/Runkitek Banner 02.jpg" class="img-thumbnail">
    					</div>
    					<div class="col-md-12 col-sm-12">
    						<img src="/media/Runkitek Banner 03.jpg" class="img-thumbnail">
    					</div>
    					<div class="col-md-12 col-sm-12">
    						<img src="/media/tshirt-layout.jpg" class="img-thumbnail">
    					</div>
    					<div class="col-md-12 col-sm-12">
    						<img src="/media/medal-layout.jpg" class="img-thumbnail">
    					</div>
    					<div class="col-md-12 col-sm-12">
    						<img src="/media/racebib-layout.png" class="img-thumbnail">
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
	    			<div class="row">
	    				<div class="col-md-12">
    						<h4 style="color:green;">Inclusive of Singlet, Race Bib with Timing Chip, Finisher’s Medal</h4>
    						<p>
								<i>Top 3 Finishers All Category (Men / Women) will receive cash prize and trophy</i>
							</p>
	    				</div>
	    				<div class="col-md-6">
	    					<div class="contact-info left">
	    						<b>Registration Venues:</b>
								<ul>
									<li>Online - <a href="http://www.runkitek.com/register">http://www.runkitek.com</a></li>
									<li>
										In Store Registration – Garmin Stores:
										<ul>
											<li>SM NORTH EDSA</li>
											<li>SM MEGAMALL</li>
											<li>SM MALL OF ASIA</li>
										</ul>
									</li>
								</ul>
							</div>
	    				</div>
	    				<div class="col-md-6">
	    					<div class="contact-info right">
		    					<b>For more information:</b>
								<div>
									<div>Email - <span style="color: red;font-weight:bold;font-size:18px;">inforunkitek@gmail.com</span></div>
									<div>Visit - <a href="https://www.facebook.com/events/308844763306886/">https://www.facebook.com/events/308844763306886/</a></div>
									<div>Contact # - 09157688735</div>
								</div>
							</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <div class="container text-center credits-logos-top" style="padding-top:20px;">
	    	<div class="row" style="padding-top:20px;">
	    		<div class="col-md-4" style="padding-top:30px;">
	    			<label><strong>Brought to you by:</strong></label>
	    			<div>
	    				<img src="/media/uap.png" class="credit-logos" style="height: 200px;">
	    			</div>
	    			<div style="padding-top: 60px;">
	    				<img src="/media/uap-logo.gif" class="credit-logos" style="height: 180px;">
	    			</div>
	    		</div>
	    		<div class="col-md-4" style="padding-top:30px;">
	    			<label><strong>Co-Presented By:</strong></label>
	    			<img src="/media/davies.jpg" class="credit-logos" alt="Davies" style="margin-top:15px;">
	    			<label style="margin-top: 60px;"><strong>Official Timer and Registration Partner:</strong></label>
	    			<img src="/media/GARMINLOGOBLACK.png" class="credit-logos" style="height: 80px;">
	    		</div>
	    		<div class="col-md-4" style="padding-top:30px;">
	    			<label><strong>Event Specialist</strong></label>
	    			<div>
	    				<a href="http://par.com.ph/">
		    				<img src="/media/logo-par.773d7a73.png" alt="Pinoy Aspiring Runners" style="margin-top:15px;"> 
		    			</a>
	    			</div>
	    			
	    		</div>
	    	</div>
	    </div>
    </section>
@endsection