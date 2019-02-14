@extends('layouts.inc-logged-in')
@section('content')
<script type="text/javascript" src="/js/incomplete-profile.js"></script>
<section id="incompleteProfile" class="event-details-small">
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
<section class="register-section">
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
            <form action="/profile/incomplete/submit" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-box">
                    <div class="form-header">
                        <div class="form-avatar">
                            <span class="initial-name" style="text-transform:uppercase;">{{session()->get('user')->first_name[0]}}{{session()->get('user')->last_name[0]}}</span>
                        </div>
                        <h2 class="form-name">--</h2>
                        <input type="file" name="avatar_img" style="visibility: hidden;width: 0px;">
                        <button id="avatarUploadBtn" class="btn btn-link text-info font-weight-bold" type="button">
                        <i class="fa fa-cloud-upload-alt"></i>  Upload Photo
                        </button>
                    </div>
                    <div class="form-content">
                        <div class="form-group form-row">
                            <div class="col-lg-4">
                                <label for="inputFirstName" class="rs-element rs-form-label">First Name <span class="required">*</span>
                                </label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        @if(session()->has('user'))
                                        <input name="first_name" placeholder="First Name" id="inputFirstName" type="text" class="rs-element form-control" value="{{session()->get('user')->first_name}}" required>
                                        @else
                                        <input name="first_name" placeholder="First Name" id="inputFirstName" type="text" class="rs-element form-control" value="" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="inputMiddleName" class="rs-element rs-form-label">Middle Name <span class="required">*</span>
                                </label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        <input name="middle_name" placeholder="Middle Name" id="inputMiddleName" type="text" class="rs-element form-control" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="inputLastName" class="rs-element rs-form-label">Last Name <span class="required">*</span>
                                </label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        @if(session()->has('user'))
                                        <input name="last_name" placeholder="Last Name" id="inputLastName" type="text" class="rs-element form-control" value="{{session()->get('user')->last_name}}" required>
                                        @else
                                        <input name="last_name" placeholder="Last Name" id="inputLastName" type="text" class="rs-element form-control" value="" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-lg-4">
                                <label for="inputNickName" class="rs-element rs-form-label">Nickname <span class="required">*</span>
                                </label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        <input name="nick_name" placeholder="Nick Name" id="inputNickName" type="text" class="rs-element form-control" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="inputLastName" class="rs-element rs-form-label">Date of Birth <span class="required">*</span>
                                </label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        <div class="input-group date">
										    <input type="text" class="form-control" name="birthdate" value="" autocomplete="off" required>
										    <div class="input-group-addon">
										        <i class="fa fa-calendar" aria-hidden="true"></i>
										    </div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="selectGender" class="rs-element rs-form-label">Gender <span class="required">*</span>
                                </label>
                                <div>
                                    <div class="rs-element rs-radio example-element">
                                        <label>
                                            <input name="radio_group_gender" type="radio" value="MALE" required>
                                            <span class="rs-radio__bullet">
                                                <span class="rs-radio__bullet-inner"></span>
                                            </span>
                                            <span class="rs-radio__label">Male</span>
                                        </label>
                                    </div>
                                    <div class="rs-element rs-radio example-element"><label><input name="radio_group_gender" type="radio" value="FEMALE"><span class="rs-radio__bullet"><span class="rs-radio__bullet-inner"></span></span><span class="rs-radio__label">Female</span></label></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-lg-12">
                                <label for="inputSchoolName" class="rs-element rs-form-label">Affiliation / Company Name<span class="required">*</span></label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        <input name="group_name" placeholder="" id="inputSchoolName" type="text" class="rs-element form-control" value="" required></div>
                                </div>
                            </div>
                           <!--  <div class="col-lg-4">
                                <label for="inputTeamAffilliation" class="rs-element rs-form-label">Affiliation <span class="required">*</span>
                                </label>
                            </div> -->
                        </div>
                        <div class="form-group form-row">
                            <div class="col-lg-4">
                                <label for="inputSelectNationality" class="rs-element rs-form-label">Nationality <span class="required">*</span>
                                </label>
                              	<select id="nationalitySelect" class="form-control" name="nationality">
                              		@if($nationalities)
                              			@foreach($nationalities as $n)
                              				<option>{{$n['nationality']}}</option>
                              			@endforeach
                              		@endif
                              	</select>
                              	
                            </div>
                            <div class="col-lg-4">
                                <label for="inputEmailAddress" class="rs-element rs-form-label">Email Address <span class="required">*</span></label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        @if(session()->has('user'))
                                        <input name="email" placeholder="Email Address" id="inputEmailAddress" type="email" class="rs-element form-control" value="{{session()->get('user')->email}}" required>
                                        @else
                                        <input name="email" placeholder="Email Address" id="inputEmailAddress" type="email" class="rs-element form-control" value="" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4"><label for="inputContact" class="rs-element rs-form-label">Contact No. <span class="required">*</span></label><input id="inputContact" name="mobile_no" class="form-control -full" type="number" value="" required></div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-lg-12">
                                <label for="inputCountry" class="rs-element rs-form-label">Country <span class="required">*</span></label>
                                <select id="countrySelect" class="form-control" name="country">
                                	@if($country_codes['countryCodes'])
	                          			@foreach($country_codes['countryCodes'] as $c)
	                          				<option>{{$c['country_name']}}</option>
	                          			@endforeach
	                          		@endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-lg-12">
                                <label for="inputCountry" class="rs-element rs-form-label">Delivery Region<span class="required">*</span></label>
                                <select id="countrySelect" class="form-control" name="delivery_region">
                                    <option>LUZON</option>
                                    <option>VISAYAS</option>
                                    <option>MINDANAO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-lg-12">
                                <label for="inputFullAddress" class="rs-element rs-form-label">Complete Address <span class="required">* ( Delivery Address )</span></label>
                                <div class="rs-element rs-input rs-textarea -full "><textarea type="text" name="full_address" row="2" placeholder="Put your current address..." id="inputFullAddress" class="rs-element form-control" required></textarea></div>
                            </div>
                        </div>
                        <div class="mt-3 form-group form-row">
                            <div class="col-lg-12">
                                <h3 class="font-weight-bold">In Case of Emergency</h3>
                            </div>
                            <div class="col-lg-4">
                                <label for="inputFirstName" class="rs-element rs-form-label">Full name <span class="required">*</span></label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        <input name="emergency_name" id="inputFirstName" type="text" class="rs-element form-control" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="inputRelationship" class="rs-element rs-form-label">Relationship <span class="required">*</span></label>
                                <div class="rs-element rs-input -full">
                                    <div class="rs-input-wrap">
                                        <input name="emergency_relationship"  id="inputRelationship" type="text" class="rs-element form-control" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4"><label for="inputEmergencyNo" class="rs-element rs-form-label">Contact Number <span class="required">*</span></label>
                                <input id="inputContact" name="emergency_number" class="form-control -full form-control"  value="" type="number" required>
                            </div>
                        </div>
                        <div class="mt-3 form-group form-row" style="display:none;">
                            <div class="col-lg-12">
                                <h5 class="font-weight-bold">.Please download all forms below:</h5>
                                <a class="btn mb-2 mb-md-auto mr-md-2 btn-small btn-success" role="button" href="/downloadables/TakBro-2019-PARENTAL-CONSENT-FORM-Fillable-Form.9c88bef8.pdf" download="TakBro-2019-PARENTAL-CONSENT-FORM-Fillable-Form" style="vertical-align: top;background: #333;">Parental Consent Form</a>
                                <a class="btn mb-2 mb-md-auto mr-md-2 btn-small btn-success" role="button" href="/downloadables/TakBro-2019-RACE-AGREEMENT-FORM-Fillable-Form.68033b05.pdf" download="TakBro-2019-RACE-AGREEMENT-FORM-Fillable-Form" style="vertical-align: top;background: #333;">Race Agreement Form</a>
                                <a class="btn mb-2 btn-small btn-success" role="button" href="/downloadables/TakBro-2019-WAIVERS-Fillable-Form.f3851535.pdf" download="TakBro-2019-WAIVERS-Fillable-Form" style="vertical-align: top;background: #333;">Waiver Form</a>     
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <div class="actions row">
                            <div class="col-sm-12 col-lg-12 ml-lg-auto status text-right">
                                <label class="rs-element rs-form-label float-left" color="#C5D0DE" style="display: inline-block; margin-right: 16px;"></label>
                                <button type="submit" class="rs-element rs-button rs-button--medium rs-button--value" style="background: rgb(66, 53, 154);">
                                    <div class="rs-button__helper"></div>
                                    <span class="rs-button__value">Continue</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection