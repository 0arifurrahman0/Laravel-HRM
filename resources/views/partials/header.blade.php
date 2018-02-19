<header class="main-header">
	<a href="{{ url('/') }}" class="logo">
		{{-- mini logo for sidebar mini 50x50 pixels --}}
		<span class="logo-mini"><strong>B</strong></span>
		{{-- logo for regular state and mobile devices --}}
		<span class="logo-lg"><strong>Barendro</strong></span>
	</a>

	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		{{-- Navbar Right Menu --}}
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						{{-- The user avatar in the navbar--}}
						<img src="{{ asset('images/default.png') }}" class="user-image" alt="User Image">
						{{-- hidden-xs hides the user name --}}
						<span class="hidden-xs">
							{{ Auth::user()->name }}
						</span>
					</a>
					<ul class="dropdown-menu">

						<li>
							<a href="{{ route('logout') }}" class="btn btn-default btn-flat"
							    onclick="event.preventDefault();
							             document.getElementById('logout-form').submit();">
							    Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							    {{ csrf_field() }}
							</form>
						</li>

						<!-- <li class="user-header">
							<img src="{{ asset('images/default.png') }}" class="img-circle" alt="User Image">

							<p>
								{{ Auth::user()->name }}
								<small>Member since Nov. 2012</small>
							</p>
						</li>

						<li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center">
									<a href="#">Followers</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Sales</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Friends</a>
								</div>
							</div>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="{{ route('logout') }}" class="btn btn-default btn-flat"
								    onclick="event.preventDefault();
								             document.getElementById('logout-form').submit();">
								    Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								    {{ csrf_field() }}
								</form>
							</div>
						</li> -->
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>