@extends('web.layouts.app' , ['title' => 'Contact Us' , 'activePage' => 'contact_us'])
@section('content')
<!-- breadcrum -->
<section class="w3l-skill-breadcrum">
  <div class="breadcrum">
    <div class="container">
      <p><a href="index.html">Home</a> &nbsp; / &nbsp; Contact</p>
    </div>
  </div>
</section>
<!-- //breadcrum -->

<div style="margin: 8px auto; display: block; text-align:center;">
  <!---728x90--->

</div>

<!-- contact form -->
<section class="w3l-contacts-12" id="contact">
	<div class="container py-5">
		<div class="contacts12-main py-md-3">
			<div class="header-section text-center">
				<h3 class="mb-md-5 mb-4">Fill out the form.
			</div>
			<form action="#" method="post" class="">
				<div class="main-input">
					<input type="text" name="w3lName" placeholder="Enter your name" class="contact-input" required="" />
					<input type="email" name="w3lSender" placeholder="Enter your mail" class="contact-input" required="" />
					<input type="email" name="w3lSubject" placeholder="Subject" class="contact-input" />
					<textarea class="contact-textarea contact-input" name="w3lMessage" placeholder="Enter your message" required=""></textarea>
				</div>
				<div class="text-right">
					<button class="btn-secondary btn theme-button">Send</button>
				</div>
			</form>
		</div>
	</div>
	<div class="contant11-top-bg py-5">
		<div class="container py-lg-3">
			<div class="d-grid contact section-gap">
				<div class="contact-info-left d-grid">
					<div class="contact-info">
						<div class="icon">
							<span class="fa fa-location-arrow" aria-hidden="true"></span>
						</div>
						<div class="contact-details">
							<h4>Address:</h4>
							<p>B13, Prestige plaza, Jehovah witnesses junction, Bogije lagos.</p>
						</div>
					</div>
					<div class="contact-info">
						<div class="icon">
							<span class="fa fa-phone" aria-hidden="true"></span>
						</div>
						<div class="contact-details">
							<h4>Phone:</h4>
							<p><a href="tel:+2347033964406">+2347033964406</a></p>
						</div>
					</div>
					<div class="contact-info">
						<div class="icon">
							<span class="fa fa-envelope-open-o" aria-hidden="true"></span>
						</div>
						<div class="contact-details">
							<h4>Mail:</h4>
							<p><a href="mailto:info@tebentutors.com" class="email">info@tebentutors.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</section>
<!-- //contact form -->

<div style="margin: 8px auto; display: block; text-align:center;">
  <!---728x90--->
</div>
@stop