@extends('layouts.logged-in') 
@section('content')
<script type="text/javascript" src="/js/profile-update.js"></script>
<section id="profileUpdatePage" class="register-section">
	<div class="container">
		<div class="row profile-page justify-content-md-center">
			@if(session()->has('update'))
				@if(session()->get('update'))
					<div class="alert alert-success" role="alert">
						<h3>Update Success!</h3>
					</div>
				@endif
			@endif
			@if($errors->any())
				<div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
			@endif
		    <div class="col-lg-10">
		        <div class="profile-info card mb-3 form-box">
		            <div class="card-header p-3 bg-takbro">
		                <p class="m-0 text-white text-uppercase">Personal Information</p>
		            </div>
		            <form action="/profile/personal/update" method="post" enctype="multipart/form-data">
		            	@csrf
		                <div class="card-body p-3">
		                    <div class="form-header">
		                        <div class="form-avatar">
		                        	@if(session()->get('user')->details->avatar_url)
		                        	<img src="{{session()->get('user')->details->avatar_url}}" style="width:100%;height:100%;">
		                        	@else
		                        	<span class="initial-name" style="text-transform: uppercase;">
		                        		{{session()->get('user')->first_name[0]}}{{session()->get('user')->last_name[0]}}
			                        </span>
			                        @endif
			                    </div>
		                        <h2 class="form-name">--</h2>
		                        <input type="file" name="avatar_img" style="visibility: hidden;width: 0px;">
		                        <button id="avatarUploadBtn" type="button" class="btn btn-link text-info font-weight-bold"><i class="fas fa-cloud-upload-alt"></i> Upload Photo</button>
		                    </div>
		                    <hr>
		                    <div class="form-content">
		                        <div class="form-group form-row">
		                            <div class="col-lg-4">
		                                <label for="inputFirstName" class="rs-element rs-form-label">First Name <span class="required">*</span></label>
		                                <div class="rs-element rs-input -full">
		                                    <div class="rs-input-wrap">
		                                        <input name="first_name" placeholder="First Name" id="inputFirstName" type="text" class="rs-element form-control" value="{{session()->get('user')->first_name}}">
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="col-lg-4">
		                                <label for="inputMiddleName" class="rs-element rs-form-label">Middle Name <span class="required">*</span></label>
		                                <div class="rs-element rs-input -full">
		                                    <div class="rs-input-wrap">
		                                        <input name="middle_name" placeholder="Middle Name" id="inputMiddleName" type="text" class="rs-element form-control" value="{{session()->get('user')->details->middle_name}}">
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="col-lg-4">
		                                <label for="inputLastName" class="rs-element rs-form-label">Last Name <span class="required">*</span></label>
		                                <div class="rs-element rs-input -full">
		                                    <div class="rs-input-wrap">
		                                        <input name="last_name" placeholder="Last Name" id="inputLastName" type="text" class="rs-element form-control" value="{{session()->get('user')->last_name}}">
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="form-group form-row">
		                            <div class="col-lg-4">
		                                <label for="inputNickName" class="rs-element rs-form-label">Nickname <span class="required">*</span></label>
		                                <div class="rs-element rs-input -full">
		                                    <div class="rs-input-wrap">
		                                        <input name="nick_name" placeholder="Nick Name" id="inputNickName" type="text" class="rs-element form-control" value="{{session()->get('user')->details->nick_name}}">
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="col-lg-4">
		                                <label for="inputDOB" class="rs-element rs-form-label">Date of Birth <span class="required">*</span></label>
		                                <div class="rs-element rs-input -full">
		                                    <div class="rs-input-wrap">
		                                        <div class="input-group date">
												    <input type="text" class="form-control" name="birthdate" value="{{session()->get('user')->details->birth_date}}" autocomplete="off" required="">
												    <div class="input-group-addon">
												        <i class="fa fa-calendar" aria-hidden="true"></i>
												    </div>
												</div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="col-lg-4">
		                                <label for="selectGender" class="rs-element rs-form-label">Gender <span class="required">*</span></label>
		                                <div>
		                                    <div class="rs-element rs-radio rs-radio--selected example-element">
	                                        	@if(session()->get('user')->details->gender == 'MALE')
	                                        	<label>
	                                        	<input name="radio_group_gender" type="radio" value="MALE" checked><span class="rs-radio__bullet"><span class="rs-radio__bullet-inner"></span></span><span class="rs-radio__label">Male</span></label>
	                                        	@else
	                                            <input name="radio_group_gender" type="radio" value="MALE"><span class="rs-radio__bullet"><span class="rs-radio__bullet-inner"></span></span><span class="rs-radio__label">Male</span></label>
	                                            @endif
		                                    </div>
		                                    <div class="rs-element rs-radio example-element">
		                                    	@if(session()->get('user')->details->gender == 'FEMALE')
		                                    	<label>
	                                            <input name="radio_group_gender" type="radio" value="FEMALE" checked>
	                                            <span class="rs-radio__bullet"><span class="rs-radio__bullet-inner"></span></span><span class="rs-radio__label">Female</span>
	                                        	</label>
		                                    	@else
	                                       		<label>
	                                            <input name="radio_group_gender" type="radio" value="FEMALE">
	                                            <span class="rs-radio__bullet"><span class="rs-radio__bullet-inner"></span></span><span class="rs-radio__label">Female</span>
	                                        	</label>
	                                        	@endif
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="form-group form-row">
		                            <div class="col-lg-4">
		                                <label for="inputSelectNationality" class="rs-element rs-form-label">Nationality<span class="required">*</span></label>
		                                <select id="nationalitySelect" class="form-control" name="nationality">
                              				@if($nationalities)
		                              			@foreach($nationalities as $n)
		                              				@if(session()->get('user')->details->nationality == $n['nationality'])
		                              				<option selected>{{$n['nationality']}}</option>
		                              				@else
		                              				<option>{{$n['nationality']}}</option>
		                              				@endif
		                              			@endforeach
		                              		@endif
                              			</select>
		                            </div>
		                            <div class="col-lg-4">
		                                <label for="inputEmailAddress" class="rs-element rs-form-label">Email Address <span class="required">*</span></label>
		                                <div class="rs-element rs-input -full">
		                                    <div class="rs-input-wrap">
		                                        <input name="email" placeholder="e.x. yourname@email.com" id="inputEmailAddress" type="text" class="rs-element form-control" value="{{session()->get('user')->email}}">
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="col-lg-4">
		                                <label for="inputContactNumber" class="rs-element rs-form-label">Contact No. <span class="required">*</span></label>
		                                <input id="inputContactNumber" name="mobile_no" class="form-control -full form-control" placeholder="+63 XXX XXX XXXX" value="{{session()->get('user')->details->contact_number}}">
		                            </div>
		                        </div>
		                        <div class="form-group form-row">
		                            <div class="col-lg-8">
		                                <label for="inputSchoolName" class="rs-element rs-form-label">Affiliation / Company Name<span class="required">*</span></label>
		                                <div class="rs-element rs-input -full">
		                                    <div class="rs-input-wrap">
		                                        <input name="group_name" placeholder="" id="inputSchoolName" type="text" class="rs-element form-control" value="{{session()->get('user')->details->group_tag}}">
		                                    </div>
		                                </div>
		                            </div>
		                           <!--  <div class="col-lg-4">
		                                <label for="inputTeamAffiliation" class="rs-element rs-form-label">Affiliation</label>
		                                <div class="-full">
		                                    <div class="Select -full is-clearable is-searchable Select--single">
		                                        <div class="Select-control">
		                                            <div class="Select-multi-value-wrapper" id="react-select-3--value">
		                                                <div class="Select-placeholder">Select...</div>
		                                                <div class="Select-input" style="display: inline-block;">
		                                                    <input id="inputSelectNationality" aria-activedescendant="react-select-3--value" aria-expanded="false" aria-haspopup="false" aria-owns="" role="combobox" value="" style="box-sizing: content-box; width: 5px;">
		                                                    <div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 14px; font-family: Montserrat, Helvetica, Arial, sans-serif; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;"></div>
		                                                </div>
		                                            </div><span class="Select-arrow-zone"><span class="Select-arrow"></span></span>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div> -->
		                        </div>
		                        <div class="form-group form-row">
		                            <div class="col-lg-12">
		                                <label for="inputCountry" class="rs-element rs-form-label">Country <span class="required">*</span></label>
										<select id="countrySelect" class="form-control" name="country">
											{{session()->get('user')->details->country}}
                              				@if($country_codes['countryCodes'])
			                          			@foreach($country_codes['countryCodes'] as $c)
			                          				@if(session()->get('user')->details->country == $c['country_name'])
			                          				<option selected>{{$c['country_name']}}</option>
			                          				@else
			                          				<option>{{$c['country_name']}}</option>
			                          				@endif
			                          			@endforeach
			                          		@endif
                              			</select>
		                            </div>
		                        </div>
		                        <div class="form-group form-row">
		                            <div class="col-lg-12">
		                                <label for="inputFullAddress" class="rs-element rs-form-label">Complete Address <span class="required">* ( Delivery Address )</span></label>
		                                <div class="rs-element rs-input rs-textarea -full">
		                                    <textarea type="text" name="full_address" row="2" placeholder="Put your current address..." id="inputFullAddress" class="rs-element form-control">{{session()->get('user')->details->delivery_address}}</textarea>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="card-footer">
		                    <div class="actions row">
		                        <div class="col-sm-12 col-lg-12 ml-lg-auto status text-right">
		                            <label class="rs-element rs-form-label float-left" color="#C5D0DE" style="display: inline-block; margin-right: 16px;"></label>
		                            <button type="submit" class="rs-element rs-button rs-button--medium rs-button--value" style="background: rgb(66, 53, 154);">
	                                    <div class="rs-button__helper"></div>
	                                    <span class="rs-button__value">Update</span>
	                                </button>
		                        </div>
		                    </div>
		                </div>
		            </form>
		        </div>
		        <div class="profile-info card mb-3">
		        	<form action="/profile/emergency/update" method="post">
		        	@csrf
		            <div class="card-header p-3 bg-takbro">
		                <p class="m-0 text-white text-uppercase">In Case of Emergency</p>
		            </div>
		            <div class="card-body p-2">
		                <div class="form-content">
		                    <div class="mt-3 form-group form-row">
		                        <div class="col-lg-4">
		                            <label for="inputFirstName" class="rs-element rs-form-label">Full name <span class="required">*</span></label>
		                            <div class="rs-element rs-input -full">
		                                <div class="rs-input-wrap">
		                                    <input name="emergency_name" placeholder="First Name" id="inputFirstName" type="text" class="rs-element form-control" value="{{session()->get('user')->details->emergency_contact_name}}">
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-lg-4">
		                            <label for="inputMiddleName" class="rs-element rs-form-label">Relationship <span class="required">*</span></label>
		                            <div class="rs-element rs-input -full">
		                                <div class="rs-input-wrap">
		                                    <input name="emergency_relationship" placeholder="Relationship" id="inputMiddleName" type="text" class="rs-element form-control" value="{{session()->get('user')->details->emergency_contact_relationship}}">
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-lg-4">
		                            <label for="inputLastName" class="rs-element rs-form-label">Contact Number <span class="required">*</span></label>
		                            <input id="inputContact" name="emergency_number" class="form-control -full form-control" placeholder="+63 XXX XXX XXXX" value="{{session()->get('user')->details->emergency_contact_number}}">
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <div class="card-footer">
		                <div class="actions row">
		                    <div class="col-sm-12 col-lg-12 ml-lg-auto status text-right">
		                       <button type="submit" class="rs-element rs-button rs-button--medium rs-button--value" style="background: rgb(66, 53, 154);">
                                    <div class="rs-button__helper"></div>
                                    <span class="rs-button__value">Update</span>
                                </button>
		                    </div>
		                </div>
		            </div>
		            </form>
		        </div>
		        <div class="mt-3 w-100">
		            <button type="button" class="rs-element rs-button rs-button--large rs-button--value -full" style="background: rgba(255, 255, 255, 0);">
		                <div class="rs-button__helper"></div><span class="rs-button__value" style="color: rgb(25, 145, 235);">BACK TO PROFILE</span></button>
		        </div>
		    </div>
		</div>
	</div>
</section>
@endsection