<!-- header -->
<header class="w3l-header">
	<div class="hero-header-11">
		<div class="hero-header-11-content">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light py-md-2 py-0 px-0">
					<a class="navbar-brand" href="{{ route('index') }}"><img src="{{ $logo_img }}" width="50" height="50" alt="" class="d-none" />Teben Tutors</a>
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
							<li class="nav-item {{ $activePage == "home_page" ? 'active' : ''  }}">
								<a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item {{ $activePage == "about_us" ? 'active' : ''  }}">
								<a class="nav-link" href="{{ route('about_us') }}">About</a>
							</li>
							<li class="nav-item  {{ $activePage == "services" ? 'active' : ''  }}">
								<a class="nav-link" href="{{  route('services') }}">Services</a>
							</li>
							<li class="nav-item {{ $activePage == "media" ? 'active' : ''  }}">
								<a class="nav-link" href="{{ route("media_collection") }}">Media</a>
							</li>
							
							<li class="nav-item {{ $activePage == "contact_us" ? 'active' : ''  }}">
								<a class="nav-link" href="{{ route('contact_us') }}">Contact Us</a>
							</li>
							<li class="nav-item {{ $activePage == "login" ? 'active' : ''  }}">
								<a class="nav-link" href="{{ route('login') }}">Login</a>
							</li>
						</ul>
						<div class="form-inline ml-lg-3">
							<a href="{{ route('register') }}" class="btn btn-primary theme-button">Join Us</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>