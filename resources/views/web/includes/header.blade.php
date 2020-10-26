<!-- header -->
<header class="w3l-header">
	<div class="hero-header-11">
		<div class="hero-header-11-content">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light py-md-2 py-0 px-0">
					<a class="navbar-brand" href="{{ route('index') }}"><img src="assets/images/logo-icon.png" alt="" />Skill</a>
					<!-- if logo is image enable this   
				<a class="navbar-brand" href="#{{ route('index') }}">
						<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
				</a> -->
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
						<span class="navbar-toggler-icon fa icon-close fa-times"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item @@about-active">
								<a class="nav-link" href="{{ route('index') }}">About</a>
							</li>
							<li class="nav-item @@services-active">
								<a class="nav-link" href="services.html">Services</a>
							</li>
							<li class="nav-item @@courses-active">
								<a class="nav-link" href="courses.html">Courses</a>
							</li>
							<li class="nav-item dropdown @@dropdown-active">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
									Pages
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item  @@gallery-active" href="gallery.html">Gallery</a>
									<a class="dropdown-item" href="login.html">Login</a>
									<a class="dropdown-item" href="signup.html">Signup</a>
									<a class="dropdown-item" href="landing-single.html">Landing Single</a>
								</div>
							</li>
							<li class="nav-item dropdown @@blog-dropdown-active">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
									Blog
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item @@blog-active" href="blog.html">Blog</a>
									<a class="dropdown-item @@blog-single-active" href="blog-single.html">Single Post</a>
								</div>
							</li>
							<li class="nav-item @@contact-active">
								<a class="nav-link" href="contact.html">Contact</a>
							</li>
						</ul>
						<div class="form-inline ml-lg-3">
							<a href="signup.html" class="btn btn-primary theme-button">Apply Now</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>