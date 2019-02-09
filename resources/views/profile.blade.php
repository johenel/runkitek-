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
                        <p class="m-0 text-white text-uppercase">Downloadable Forms</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                	<!-- <a class="btn mb-2 btn-block btn-small btn-primary" role="button" href="/static/media/TakBro-2019-PARENTAL-CONSENT-FORM-Fillable-Form.9c88bef8.pdf" download="TakBro-2019-PARENTAL-CONSENT-FORM-Fillable-Form" style="background: #333;">Parental Consent Form</a>
                                	<a class="btn mb-2 btn-block btn-small btn-primary" role="button" href="/static/media/TakBro-2019-RACE-AGREEMENT-FORM-Fillable-Form.68033b05.pdf" download="TakBro-2019-RACE-AGREEMENT-FORM-Fillable-Form" style="background: #333;">Race Agreement Form</a> -->
                                	<a class="btn mb-2 btn-block btn-small btn-primary" role="button" href="/downloadables/ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM.pdf" download="ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM" style="background: #333;">Runners Waiver</a>
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
			                        <div class="detail-field"><span class="detail-title text-muted font-weight-bold text-uppercase">Full Address</span>
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
</section>
@endsection