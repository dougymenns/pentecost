@extends('layouts.app')

@section('content')
	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			@php if(!$intros->isEmpty()) { $first = $intros[0]; } else { $first = null; } @endphp
			@foreach($intros as $intro)
				@php $intro->image = str_replace('\\','/',$intro->image);@endphp
				<div class="carousel-item @if ($intro == $first) active @endif">
					<div style="height: 100vh; width: 100%;
							background: url('{{ asset('storage/'.$intro->image) }}');
							background-attachment: fixed;
							background-repeat: no-repeat; background-size: cover;
							background-position: center center;">
						<div class="flex-center flex-column rgba-black-strong">
							<h1 class="text-center text-uppercase text-white fadeIn mb-2 font-weight-bold large" style="font-size: 50px; font-family: 'Montserrat', sans-serif;">
								{{ $intro->headnote }}
							</h1>
							<h3 class="text-center text-uppercase text-white fadeIn mb-2 font-weight-bold small" style="font-size: 30px; font-family: 'Montserrat', sans-serif;">
								{{ $intro->headnote }}
							</h3>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	@if($event)
		<div class="upcoming-event">
			<div style="background-color: rgba(12,12,12,0.7)">
				<div class="flex-center flex-column">
					<div class="container">
						<div class="row">
							<div class="col-md-6 my-5 py-4" style="border-right: solid 1px white;">
								<h4 class="font-weight-bold text-white">{{ $event->name }}</h4>
								<p class="text-white">{!! $event->description !!}</p>
							</div>
							<div class="col-md-6 my-5 py-4">
								<p class="text-white big-text" id="demo"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
	<section class="my-5 mb-5 container">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">WEEKLY SERVICES</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row d-flex flex-center">
			@foreach($services as $service)
				<div class="col-md-4 text-center p-4 py-5 service-card">
					<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
					<hr style="margin: 5px; width: 100%; border: solid 1px #ddd;">
					<p class="pt-1">{!! $service->description !!}</p>
					<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}.</p>
				</div>
			@endforeach
		</div>
		<h6 class="text-center mt-3">
			<a href="{{ route('services') }}" class="font-weight-bold custom-button">See all services <i class="fa fa-long-arrow-right"></i></a>
		</h6>
	</section>
	<!-- Section: Blog v.2 -->
	<section class="my-5 mb-5 container blog">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">RECENT BLOG POSTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			@foreach($posts as $post)
				<div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
					<div class="view overlay rounded z-depth-2 mb-1">
						<img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="Sample image">
						<a href="{{ route('post', $post->id) }}">
							<div class="mask rgba-white-slight"></div>
						</a>
					</div>
					<h5 class="font-weight-bold"><strong>{{ $post->title }}</strong></h5>
					<p>by <a class="font-weight-bold small">Billy Forester</a>, {{ $post->created_at }}</p>
					<p class="dark-grey-text">{{ $post->excerpt }}</p>
					<a href="{{ route('post', $post->id) }}" class="font-weight-bold">Read more <i class="fa fa-long-arrow-right"></i></a>
				</div>
			@endforeach
		</div>
		<h6 class="text-center">
			<a href="{{ route('posts') }}" class="font-weight-bold custom-button">View blog posts <i class="fa fa-long-arrow-right"></i></a>
		</h6>
	</section>
	<!-- Section: Blog v.2 -->
	@if($event)
		<script>
			// Set the date we're counting down to
			var countDownDate = new Date("{{ $event->event_date }} 00:00:00").getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

				// Get today's date and time
				var now = new Date().getTime();

				// Find the distance between now and the count down date
				var distance = countDownDate - now;

				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				// Display the result in the element with id="demo"
				document.getElementById("demo").innerHTML = days + "d : " + hours + "h : "
					+ minutes + "m : " + seconds + "s ";
				// If the count down is finished, write some text
				if (distance < 0) {
					clearInterval(x);
					document.getElementById("demo").innerHTML = "ITS TODAY!!!";
				}
			}, 1000);
		</script>
	@endif
@endsection
