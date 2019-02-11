@extends('layouts.default')
@section('content')
<script type="text/javascript" src="/js/register.js"></script>
<section id="registerPage" class="register-account">
	<div class="event-cover">
		<img src="/media/runkitek-poster-final.jpg">
	</div>
	<div class="event-form">
		<div class="event-box">
			@if($errors->any())
				<div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
			@endif
			<form action="/register" method="post">
				@csrf
				<div class="event-header">
					<h1 class="title">Sign Up</h1>
					<h3 class="subtitle">Register for Runkitek 2019</h3>
				</div>
				<div class="form-group form-row row">
					<div class="col-12 col-md-12">
						<label for="inputEmail" class="rs-element rs-form-label">E-mail Address <span class="required">*</span></label>
						<div class="rs-element rs-input rs-input--icon -full">
							<div class="rs-input-wrap">
								@if(session()->has('user'))
								<input name="email" type="email" class="form-control" style="padding-left: 30px;" required value="{{session()->get('user')->email}}">
								@else
								<input name="email" type="email" class="form-control" style="padding-left: 30px;" required value="">
								@endif
								<span class="rs-input__icon">
									<svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="14" width="14" viewBox="0 0 40 40" class="rs-icon" style="vertical-align: middle;">
										<g>
											<path d="m24.7 17.3q0-2.4-1.2-3.8t-3.3-1.3q-1.4 0-2.8 0.6t-2.4 1.9-1.8 3.1-0.7 4q0 2.5 1.2 3.9t3.4 1.3q2.1 0 3.9-1.5t2.7-3.7 1-4.5z m12.6 2.7q0 2.5-0.8 4.4t-2.2 3-3 1.7-3.2 0.6q-0.1 0-0.4 0t-0.3 0q-2.1 0-3.2-1.2-0.6-0.7-0.7-1.8-1.2 1.4-3 2.4t-3.8 1q-3.6 0-5.6-2.1t-2-6q0-3.5 1.5-6.5t4-4.7 5.5-1.7q1.9 0 3.4 0.7t2.4 2.3l0-0.5 0.3-1.2q0-0.1 0.1-0.3t0.2-0.1h2.7q0.1 0 0.3 0.2 0.1 0.2 0 0.4l-2.7 13.7q-0.1 0.5-0.1 1.1 0 0.8 0.3 1.1t1 0.3q0.6 0 1.3-0.1t1.6-0.5 1.7-1.2 1.3-1.9 0.5-3.1q0-6.5-3.9-10.4t-10.4-3.9q-2.9 0-5.5 1.1t-4.6 3.1-3 4.5-1.1 5.6 1.1 5.5 3 4.6 4.6 3 5.5 1.2q5.1 0 9.1-3.2 0.2-0.2 0.5-0.2t0.5 0.3l0.9 1.1q0.2 0.2 0.2 0.5-0.1 0.3-0.3 0.5-2.3 1.8-5.1 2.8t-5.8 1q-3.4 0-6.6-1.3t-5.5-3.7-3.6-5.5-1.4-6.6 1.4-6.7 3.6-5.4 5.5-3.7 6.6-1.3q7.7 0 12.5 4.7t4.7 12.4z">
											</path>
										</g>
									</svg>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group form-row row">
					<div class="col-12 col-md-6">
						<label for="inputPassword" class="rs-element rs-form-label">Password <span class="required">*</span></label>
						<div class="rs-element rs-input rs-input--icon -full">
							<div class="rs-input-wrap">
								<input required="" name="password" type="password" class="rs-element form-control" style="padding-left: 30px;" value="" aria-autocomplete="list">
								<span class="rs-input__icon">
									<svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="14" width="14" viewBox="0 0 40 40" class="rs-icon" style="vertical-align: middle;">
										<g>
											<path d="m14.1 17.1h11.5v-4.2q0-2.4-1.7-4.1t-4-1.7-4.1 1.7-1.7 4.1v4.2z m18.6 2.2v12.8q0 0.9-0.6 1.6t-1.5 0.6h-21.5q-0.8 0-1.5-0.6t-0.6-1.6v-12.8q0-0.9 0.6-1.5t1.5-0.7h0.8v-4.2q0-4.1 2.9-7.1t7.1-2.9 7 2.9 3 7.1v4.2h0.7q0.9 0 1.5 0.7t0.6 1.5z">
												
											</path>
										</g>
									</svg>
								</span>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<label for="inputConfirmPassword" class="rs-element rs-form-label">Confirm Password <span class="required">*</span>
						</label>
						<div class="rs-element rs-input rs-input--icon -full">
							<div class="rs-input-wrap">
								<input required="" name="password_confirmation" type="password" class="rs-element form-control" style="padding-left: 30px;" value=""><span class="rs-input__icon">
									<svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="14" width="14" viewBox="0 0 40 40" class="rs-icon" style="vertical-align: middle;">
										<g>
											<path d="m14.1 17.1h11.5v-4.2q0-2.4-1.7-4.1t-4-1.7-4.1 1.7-1.7 4.1v4.2z m18.6 2.2v12.8q0 0.9-0.6 1.6t-1.5 0.6h-21.5q-0.8 0-1.5-0.6t-0.6-1.6v-12.8q0-0.9 0.6-1.5t1.5-0.7h0.8v-4.2q0-4.1 2.9-7.1t7.1-2.9 7 2.9 3 7.1v4.2h0.7q0.9 0 1.5 0.7t0.6 1.5z">
												
											</path>
										</g>
									</svg>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group form-row row">
					<div class="col-12 col-md-6">
						<label for="inputFirstName" class="rs-element rs-form-label">First Name <span class="required">*</span></label>
						<div class="rs-element rs-input -full">
							<div class="rs-input-wrap">
								@if(session()->has('user'))
								<input required="" name="first_name" type="text" class="rs-element form-control" value="{{session()->get('user')->first_name}}">
								@else
								<input required="" name="first_name" type="text" class="rs-element form-control" value="">
								@endif
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<label for="inputLastName" class="rs-element rs-form-label">Last Name <span class="required">*</span></label>
						<div class="rs-element rs-input -full">
							<div class="rs-input-wrap">
								@if(session()->has('user'))
								<input required="" name="last_name" type="text" class="rs-element form-control" value="{{session()->get('user')->last_name}}">
								@else
								<input required="" name="last_name" type="text" class="rs-element form-control" value="">
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="form-group form-row row text-center">
					<div class="col-12 col-md-12">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" data-toggle="modal" data-target="#termsAndAgreementModal" name="terms_and_agreement" required>
							<label class="form-check-label">Check here to indicate that you have read and agree to the <br><a href="#" class="taa-text"><span class="text-primary"> Terms &amp; Conditions </span></a>
							</label>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input"  name="download-waiver">
								<a class="waiver-download" href="/downloadables/ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM.pdf" download="ACCIDENT-WAIVER-AND-RELEASE-OF-LIABILITY-FORM" style="display: none;">Download</a>
							<label class="form-check-label">Waiver</label>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group form-row row text-center">
					<div class="col col-md-12">
						<button type="submit" class="rs-element rs-button rs-button--large rs-button--value rs-button--disabled -full form-control">
							<div class="rs-button__helper">
								
							</div>
							<span class="rs-button__value">Register</span>
						</button>
						<span class="form-misc-action">Already have an account? <a class="form-link" href="/signin">Sign In</a></span>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<div class="modal" id="termsAndAgreementModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
    		<h4 class="modal-title">Terms and Conditions</h4>
    		<button type="button" class="close" data-dismiss="modal"> 
    			<span aria-hidden="true">×</span>
    			<span class="sr-only">Close</span>
    		</button>
    	</div>
    	<div class="modal-body">
    		<ol style="padding: 0px 40px;">
    			<li>
    				<h3 class="title">Introduction</h3>
    				<p class="description">These Website Standard Terms and Conditions contained herein on this webpage, shall govern your use of this website, including all pages within this website. These Terms apply in full force and effect to your use of this Website and by using this Website, you expressly accept all terms and conditions contained herein in full. You must not use this Website, if you have any objection to any of these Website Standard Terms and Conditions.
    				</p>
    				<p class="description">This Website is for use by any person who wants to register and participate in the event.</p>
    			</li>
				<li>
					<h3 class="title">Intellectual Property Rights</h3>
					<p class="description">Other than content you own, which you may have opted to include on this Website, under these Terms, Multisys Technologies Corporation and/or its licensors own all rights to the intellectual property and material contained in this Website, and all such rights are reserved.</p>
					<p class="description">You are granted a limited access only, subject to the restrictions provided in these Terms, for purposes of viewing the material contained on this Website and also in compliance to the Data Privacy Law of the Philippines.</p>
				</li>
				<li>
					<h3 class="title">Restrictions</h3>
					<p class="description">You are expressly and emphatically restricted from all of the following:</p>
					<ul>
						<li>
							<p class="description">publishing any Website material in any media related to this website;</p>
						</li>
						<li>
							<p class="description">selling, sublicensing and/or otherwise commercializing the Website;</p>
						</li>
						<li>
							<p class="description">publicly performing and/or showing any Website material;</p>
						</li>
						<li>
							<p class="description">using this Website in any way that is, or may be, damaging to this Website;</p>
						</li>
						<li>
							<p class="description">using this Website in any way that impacts user access to this Website;</p>
						</li>
						<li>
							<p class="description">using this Website contrary to applicable laws and regulations, or in a way that causes, or may cause, harm to the Website, or to any person or business entity;</p>
						</li>
						<li>
							<p class="description">engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website, or while using this Website;</p>
						</li>
						<li>
							<p class="description">using this Website to engage in any advertising or marketing;</p>
						</li>
					</ul>
					<p class="description">Certain areas of this Website are restricted from access by you and Multisys Technologies Corporation may further restrict access by you to any areas of this Website, at any time, in its sole and absolute discretion. &nbsp;Any user ID and password you may have for this Website are confidential and you must maintain confidentiality of such information.
					</p>
				</li>
				<li>
					<h3 class="title">Your Profile</h3>
					<p class="description">
						In these Website Standard Terms and Conditions, “Your Profile” shall mean any audio, video, text, images or other material you choose to input in the Website. With respect to Your Profile, by inputting your credentials, you grant Multisys Technologies Corporation&nbsp;a full view and access of your credentials and also allow Multisys Technologies Corporation to use your information if needed
					</p>
					<p class="description">
						Your Profile must be your own and must not be copying other people’s identity or information. Multisys Technologies Corporation reserves the right to remove any of profile from this Website at any time, and for any reason, without notice.
					</p>
				</li>
				<li>
					<h3 class="title">No warranties</h3>
					<p class="description">This Website is provided “as is,” with all faults, and Multisys Technologies Corporation&nbsp;makes no express or implied representations or warranties, of any kind related to this Website or the materials contained on this Website. Additionally, nothing contained on this Website shall be construed as providing consult or advice to you.</p>
				</li>
				<li>
					<h3 class="title">Limitation of liability</h3>
					<p class="description">In no event shall Multisys Technologies Corporation nor any of its officers, directors and employees, be liable to you for anything arising out of or in any way connected with your use of this Website, whether such liability is under contract, tort or otherwise, and Multisys Technologies Corporation, including its officers, directors and employees shall not be liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>
				</li>
				<li>
					<h3 class="title">Indemnification</h3>
					<p class="description">You hereby indemnify to the fullest extent Multisys Technologies Corporation from and against any and all liabilities, costs, demands, causes of action, damages and expenses (including reasonable attorney’s fees) arising out of or in any way related to your breach of any of the provisions of these Terms.</p>
				</li>
				<li>
					<h3 class="title">Severability</h3>
					<p class="description">If any provision of these Terms is found to be unenforceable or invalid under any applicable law, such unenforceability or invalidity shall not render these Terms unenforceable or invalid as a whole, and such provisions shall be deleted without affecting the remaining provisions herein.</p>
				</li>
				<li>
					<h3 class="title">Variation of Terms</h3>
					<p class="description">Multisys Technologies Corporation is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review such Terms on a regular basis to ensure you understand all terms and conditions governing use of this Website.</p>
				</li>
				<li>
					<h3 class="title">Assignment</h3>
					<p class="description">Multisys Technologies Corporation shall be permitted to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification or consent required. However, you shall not be permitted to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>
				</li>
				<li>
					<h3 class="title">Entire Agreement</h3>
					<p class="description">These Terms, including any legal notices and disclaimers contained on this Website, constitute the entire agreement between Multisys Technologies Corporation and you in relation to your use of this Website, and supersede all prior agreements and understandings with respect to the same.</p></li><li><h3 class="title">Governing Law &amp; Jurisdiction</h3>
						<p class="description">These Terms will be governed by and construed in accordance with the laws of the Philippines and you submit to the non-exclusive jurisdiction of the state and federal courts located in Philippines for the resolution of any disputes.</p>
					</li>
				</ol>
			</div>
			<div class="modal-footer"><div class="text-right">
				<button class="btn btn-primary text-uppercase" data-dismiss="modal">Cancel</button> <button class="btn btn-secondary text-uppercase agree">Agree</button>
			</div>
		</div>
	</div>
  </div>
</div>
@endsection