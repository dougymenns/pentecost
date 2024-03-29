<?php
	$about_pages = App\AboutPage::all();
	$links = App\Livestream::all();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>COP-C3 Assembly</title>

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="{{ asset('js/mdb.min.js') }}" defer></script>
		<script src="{{ asset('js/compiled.min.js') }}" defer></script>
		<script src="{{ asset('js/script.js') }}" defer></script>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

		<!-- Styles -->
		<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/compiled.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	</head>

	<body class="hidden-sn white-skin">
		<!--Double navigation-->
		<header>
			<!-- Sidebar navigation -->
			<div id="slide-out" class="side-nav white" style="overflow: hidden;">
				<ul class="custom-scrollbar">
					<!-- Logo -->
					<li>
						<div class="logo-wrapper waves-light">
							<a class="text-center pt-2">
								{{--<img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center">--}}
								<h3 class="black-text" style="font-family: 'Montserrat', sans-serif;">MENU</h3>
							</a>
						</div>
					</li>
					<!--/. Logo -->
					<!-- Side navigation links -->
					<li class="pt-1">
						<ul class="collapsible collapsible-accordion">
							<li><a href="{{ url('/') }}" class="waves-effect"><i class="fa fa-home"></i> Home</a></li>
							<li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-info-circle"></i> About Us<i class="fa fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
										<li><a target="_blank" href="https://thecophq.org/" class="waves-effect">The COP HQ</a></li>
										@foreach($about_pages as $about_page)
											<li><a href="{{ route('about', $about_page->id) }}" class="waves-effect">{{ $about_page->page_title }}</a></li>
										@endforeach
									</ul>
								</div>
							</li>
							<li><a href="{{ route('services') }}" class="waves-effect"><i class="fa fa-refresh"></i> Weekly Services</a></li>
							<li><a href="{{ route('ministries') }}" class="waves-effect"><i class="fa fa-object-group"></i> Ministries</a></li>
							<li><a href="{{ route('departments') }}" class="waves-effect"><i class="fa fa-first-order"></i> Departments</a></li>
							<li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-folder-o"></i> Media Library<i class="fa fa-angle-down rotate-icon"></i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href="{{ route('image_library') }}" class="waves-effect">Images</a></li>
										<li><a href="{{ route('videos') }}" class="waves-effect">Videos</a></li>
									</ul>
								</div>
							</li>
							<li><a href="{{ route('press') }}" class="waves-effect"><i class="fa fa-newspaper-o"></i> Press</a></li>
							<li><a href="{{ route('podcasts') }}" class="waves-effect"><i class="fa fa-podcast"></i> Podcasts</a></li>
							{{--<li><a class="waves-effect arrow-r"><i class="fa fa-cogs"></i> Resources</a></li>--}}
							<li><a href="{{ route('posts') }}" class="waves-effect"><i class="fa fa-file-text-o"></i>Blog</a></li>
						</ul>
					</li>
					<!--/. Side navigation links -->
				</ul>
				<div class="sidenav-bg mask-strong"></div>
			</div>
			<!--/. Sidebar navigation -->
			<!-- Navbar -->
			<nav class="navbar fixed-top navbar-toggleable-md container navbar-expand-lg scrolling-navbar double-nav">
				<!-- SideNav slide-out button -->
				<div class="float-left">
					<a href="#" data-activates="slide-out" class="button-collapse" style="font-size: 1rem !important;">
						MENU <i class="fas fa-bars"></i>
					</a>
				</div>
				<ul class="nav navbar-nav nav-flex-icons ml-auto">
					<!-- Authentication Links -->
					{{--@guest--}}
						<li class="nav-item large" style="padding-top: 3px;">
							<a href="{{ route('home') }}" style="text-align: center !important; font-size: 11px;" class="font-weight-bold">
								<img src="{{ asset('img/copc3.png') }}" width="7%" alt="community 3 assembly"><br>
								COMMUNITY 3 ASSEMBLY
							</a>
						</li>
						<li class="nav-item">
							<a href="tel: +233 24 294 4212" class="nav-link text-dark">
								<i class="fa fa-phone"></i> <span class="large">+233 24 294 4212</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" target="_blank" href="https://twitter.com/COP_C3Assembly"><i class="fab fa-twitter"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" target="_blank" href="https://web.facebook.com/copc3assembly/?_rdc=1&_rdr"><i class="fa fa-facebook-f"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" target="_blank" href="https://instagram.com/cop_c3assembly?igshid=1kseypdyvigjt"><i class="fab fa-instagram"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" target="_blank" href="https://www.youtube.com/channel/UCFsnLcWBYw39xZdzuYH4j1A?view_as=subscriber"><i class="fab fa-youtube"></i></a>
						</li>
						<li class="nav-item small">
							<a class="nav-link" href="{{ url('/') }}">
								HOME
							</a>
						</li>
						{{--<li class="nav-item">--}}
						{{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
						{{--</li>--}}
						{{--@if (Route::has('register'))--}}
						{{--<li class="nav-item">--}}
						{{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
						{{--</li>--}}
						{{--@endif--}}
					{{--@else--}}
						{{--<li class="nav-item dropdown">--}}
							{{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
								{{--{{ Auth::user()->name }} <span class="caret"></span>--}}
							{{--</a>--}}

							{{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
								{{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
								   {{--onclick="event.preventDefault();--}}
														 {{--document.getElementById('logout-form').submit();">--}}
									{{--{{ __('Logout') }}--}}
								{{--</a>--}}

								{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
									{{--@csrf--}}
								{{--</form>--}}
							{{--</div>--}}
						{{--</li>--}}
					{{--@endguest--}}
				</ul>
			</nav>
			<!-- /.Navbar -->
		</header>
		<!--/.Double navigation-->

		<main class="py-0">
			@yield('content')
		</main>

		{{--check if live stream is session--}}
		@foreach($links as $stream)
			@if($stream->active != 'No' )

		<div style="position: fixed; bottom: 45px; left: 24px;">
			<a class="btn-floating btn-large red animated flash slower infinite material-tooltip-main"
			   alt="video" data-toggle="modal" data-target="#modal1" data-placement="right" title="Live Stream in session">
				<i class="fas fa-video"></i>
			</a>
		</div>

		<!--Modal: Video-->
		<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<!--Content-->
				<div class="modal-content">
					<!--Body-->
					<div class="modal-body mb-0 p-0">
						@foreach($links as $link)
							<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" style="box-shadow: none !important; border-radius: 15px;">
								<iframe width="560" height="315" src="{{ $link->link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						@endforeach
					</div>
				</div>
				<!--/.Content-->
			</div>
		</div>
			@endif
		@endforeach
		<!--Modal: Video-->

		<div class="mapouter mt-5" style="margin-bottom: -20px;">
			<div class="gmap_canvas">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.6039464551636!2d-0.02353771829954897!3d5.625338156691178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf873e268e5db1%3A0x9120cfa3c80c45c2!2sThe+Church+Of+Pentecost!5e0!3m2!1sen!2sgh!4v1562922339612!5m2!1sen!2sgh" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<style>
				.mapouter {
					position:relative;
					text-align:right;
					height:500px;
					width:100%;
				}
				.gmap_canvas {
					overflow:hidden;
					background:none!important;
					height:500px;
					width:100%;
				}
			</style>
		</div>

		<!-- Footer -->
		<footer class="page-footer font-small pt-2 pb-2" style="background-color: #121212;">
			<div class="container text-center text-md-left">
				<div class="row">
					<div class="col-md-3">
						<h6 class="text-uppercase text-center font-weight-bold">The Church</h6>
						<p class="text-center mt-1">
							The Church of Pentecost, is a worldwide, non-profit-making Pentecostal
							church with its headquarters in Accra, Ghana. <br><br>
							It exists to bring all people everywhere to the saving knowledge of our
							Lord Jesus Christ through the proclamation of the gospel, the planting of
							churches and the equipping of believers for every God-glorifying service.
						</p>
					</div>
					<div class="col-md-3">
						<h6 class="text-uppercase text-center font-weight-bold">CONTACT US</h6>
						<ul class="list-unstyled text-center">
							<li class="py-2">
								<i class="fa fa-map-marker"></i> Community 3, SSNIT Flats Site - A,<br> P. O. Box CO 2009, Tema
							</li>
							<li class="py-2">
								<i class="fa fa-phone"></i> +233 24 294 4212
							</li>
							<li class="py-2">
								<i class="fa fa-envelope-o"></i> info@copc3assembly.org
							</li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="list-unstyled">
							<a class="twitter-timeline" data-height="350" data-theme="light" href="https://twitter.com/COP_C3Assembly?ref_src=twsrc%5Etfw">Tweets by COP_C3Assembly</a>
							<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						</ul>
					</div>
					<div class="col-md-3">
						<h6 class="text-uppercase text-center font-weight-bold">get the community 3 app</h6>
						<p class="text-center">
							<a href=""><img src="{{ asset('img/google-play-badge.png') }}" width="70%" alt=""></a>
							<a href="" class="center"><img src="{{ asset('img/app-store-badge.png') }}" width="60%" alt=""></a>
						</p>
						<br>
						<h6 class="text-uppercase text-center font-weight-bold">get church of pentecost app</h6>
						<p class="text-center">
							<a target="_blank" href="https://play.google.com/store/apps/details?id=com.churchofpentecost.android.app&hl=en"><img src="{{ asset('img/google-play-badge.png') }}" width="70%" alt=""></a>
							<a target="_blank" href="https://apps.apple.com/gh/app/the-church-of-pentecost/id1080104381" class="center"><img src="{{ asset('img/app-store-badge.png') }}" width="60%" alt=""></a>
						</p>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer -->
	</body>
</html>
