@extends('layouts.logged-in') 
@section('content')
<script type="text/javascript" src="/js/profile.js"></script>
<section id="profilePage">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header p-5 bg-takbro position-relative"><a class="action-edit text-light position-absolute" href="/profile/edit"><i class="fa fa-edit"></i> Edit</a></div>
                    <div class="card-body text-center">
                        <h2 class="card-title mt-4 mb-0">--</h2>
                        <small>{{session()->get('user')->email}}</small>
                        <p class="card-text mt-2"><span></span> <span></span></p>
                    </div>
                    <div class="position-absolute profile-pic-wrapper">
                    	@if(session()->get('user')->details->avatar_url)
                    		<img src="{{session()->get('user')->details->avatar_url}}" class="rounded-circle img-thumbnail" alt="Name">
                    	@else
                    		@include('includes.feats.no-avatar-img')
                        @endif
                   		
                   	</div>
                </div>
                <div class="card mb-3">
                    <div class="card-header p-3 bg-takbro">
                        <p class="m-0 text-white text-uppercase">Frequently Asked Questions (FAQ)</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                	<!-- <a class="btn mb-2 btn-block btn-small btn-primary" role="button" href="/static/media/TakBro-2019-PARENTAL-CONSENT-FORM-Fillable-Form.9c88bef8.pdf" download="TakBro-2019-PARENTAL-CONSENT-FORM-Fillable-Form" style="background: #333;">Parental Consent Form</a>
                                	<a class="btn mb-2 btn-block btn-small btn-primary" role="button" href="/static/media/TakBro-2019-RACE-AGREEMENT-FORM-Fillable-Form.68033b05.pdf" download="TakBro-2019-RACE-AGREEMENT-FORM-Fillable-Form" style="background: #333;">Race Agreement Form</a> -->
                                	<button class="btn mb-2 btn-block btn-small btn-primary" type="button" href="/downloadables/RUNKITEK-2019-FAQS.pdf" style="background: #333;" data-toggle="modal" data-target="#faq">FAQ Download</button>
                                	<button class="btn mb-2 btn-block btn-small btn-primary" type="button" href="/downloadables/ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM.pdf" style="background: #333;" data-toggle="modal" data-target="#waiver">Waiver</button>
                                	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
			    <div class="card mb-3">
			        <div class="card-header p-3 bg-takbro">
			            <p class="m-0 text-white text-uppercase">Personal Information</p>
			        </div>
			        <div class="card-body p-3">
			            <div class="container">
			                <div class="row">
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">First Name</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->first_name}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Middle Name</span>
			                            <p class="detail-body mt-1 text-black">		{{session()->get('user')->details->middle_name}}
			                            </p>
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Last Name</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->last_name}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Nickname</span>
			                            <p class="detail-body mt-1 text-black"> {{session()->get('user')->details->nick_name}}
			                            </p>
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Date of Birth</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->birth_date}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Gender</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->gender}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Nationality</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->nationality}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Email</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->email}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Mobile No</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->contact_number}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-8">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Company / School / Team Name</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->group_tag}}</p>
			                        </div>
			                    </div>
			                   <!--  <div class="col-md-4">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Team Affiliation</span>
			                            <p class="detail-body mt-1 text-black"></p>
			                        </div>
			                    </div> -->
			                </div>
			            </div>
			        </div>
			    </div>
			    <div class="card mb-3">
			        <div class="card-header p-3 bg-takbro">
			            <p class="m-0 text-white text-uppercase">Address</p>
			        </div>
			        <div class="card-body p-3">
			            <div class="container">
			                <div class="row">
			                    <div class="col-md-6">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Country</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->country}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Delivery Region</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->delivery_region}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Full Address (Delivery)</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->delivery_address}}</p>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			    <div class="card mb-3">
			        <div class="card-header p-3 bg-takbro">
			            <p class="m-0 text-white text-uppercase">In Case of Emergency</p>
			        </div>
			        <div class="card-body p-3">
			            <div class="container">
			                <div class="row">
			                    <div class="col-md-12">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Name</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->emergency_contact_name}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Relationship</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->emergency_contact_relationship}}</p>
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Contact Number</span>
			                            <p class="detail-body mt-1 text-black">{{session()->get('user')->details->emergency_contact_number}}</p>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
    </div>
    <div class="modal" id="faq">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<h4 class="modal-title">Frequently Asked Questions</h4>
    		<button type="button" class="close" data-dismiss="modal"> 
    			<span aria-hidden="true">×</span>
    			<span class="sr-only">Close</span>
    		</button>
    	</div>
    	<div class="modal-body">
    		<!-- <iframe id="fred" style="border:1px solid #666CCC;width: 100%;height: 500px;" title="PDF in an i-Frame" src="/downloadables/RUNKITEK-2019-FAQS.pdf" frameborder="1" scrolling="auto" ></iframe> -->
			<object
				data="/downloadables/RUNKITEK-2019-FAQS.pdf"
				type="application/pdf"
				width="100%"
				height="500">
					<iframe
					src="/downloadables/RUNKITEK-2019-FAQS.pdf"
					width="100%"
					height="500"
					style="border: none;" scrolling="auto"> 
					<p>Your browser does not support PDFs.
					<a href="/downloadables/RUNKITEK-2019-FAQS.pdf">Download the PDF</a></p>
					</iframe>
			</object>
    	</div>
    	<div class="modal-footer">
    		<a  href="/downloadables/RUNKITEK-2019-FAQS.pdf" download="RUNKITEK-2019-FAQS" class="btn btn-success">Download</a>
    		<a href="#" class="btn btn-success" data-dismiss="modal">Okay</a>
    	</div>
	</div>
  </div>
</div>
</section>
<div class="modal" id="waiver">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<h4 class="modal-title">Runner's Waiver</h4>
    		<button type="button" class="close" data-dismiss="modal"> 
    			<span aria-hidden="true">×</span>
    			<span class="sr-only">Close</span>
    		</button>
    	</div>
    	<div class="modal-body">
    		<!-- <iframe id="fred" style="border:1px solid #666CCC;width: 100%;height: 500px;" title="PDF in an i-Frame" src="/downloadables/ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM.pdf" frameborder="1" scrolling="auto" ></iframe> -->
    		<object
				data="/downloadables/ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM.pdf"
				type="application/pdf"
				width="100%"
				height="500">
					<iframe
					src="/downloadables/ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM.pdf"
					width="100%"
					height="500"
					style="border: none;" scrolling="auto"> 
					<p>Your browser does not support PDFs.
					<a href="/downloadables/ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM.pdf">Download the PDF</a></p>
					</iframe>
			</object>
    	</div>
    	<div class="modal-footer">
    		<a  href="/downloadables/ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM.pdf" download="ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM" class="btn btn-success">Download</a>
    		<a href="#" class="btn btn-success" data-dismiss="modal">Okay</a>
    	</div>
	</div>
  </div>
</div>
@endsection