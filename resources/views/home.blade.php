@extends('layouts.app')

@section('content')
	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			@php $first = $intros[0]; @endphp
			@foreach($intros as $intro)
				@php $intro->image = str_replace('\\','/',$intro->image);@endphp
				<div class="carousel-item @if ($intro == $first) active @endif">
					<div style="height: 100vh; width: 100%;
							background: url('{{ asset('storage/'.$intro->image) }}');
							background-attachment: fixed;
							background-repeat: no-repeat; background-size: cover;
							background-position: center center;">
						<div class="flex-center flex-column rgba-black-strong">
							<h1 class="text-center text-uppercase text-white fadeIn mb-2 font-weight-bold" style="font-size: 50px; font-family: 'Montserrat', sans-serif;">
								{{ $intro->headnote }}
							</h1>
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

	<div class="upcoming-event">
		<div style="background-color: rgba(12,12,12,0.7)">
			<div class="flex-center flex-column">
				<div class="container">
					<div class="row">
						<div class="col-md-6 my-5 py-4" style="border-right: solid 1px white;">
							<h6><a href=""><i class="fa fa-calendar"></i> Next Event</a></h6>
							<h4 class="font-weight-bold text-white">The Valentines Dinner With The Bishop</h4>
							<p class="text-white">A little description under the event heading</p>
						</div>
						<div class="col-md-6 my-5 py-4">
							<p class="text-white">
								<span class="big-text">00</span>days <span class="big-text">:</span>&nbsp;&nbsp;
								<span class="big-text">00</span>hrs <span class="big-text">:</span>&nbsp;&nbsp;
								<span class="big-text">00</span>mins <span class="big-text"></span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Section: Blog v.2 -->
	<section class="my-5 container blog">
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
					<a href="" class="float-right px-2"><i class="fa fa-facebook-f"></i></a>
					<a href="" class="float-right px-2"><i class="fa fa-twitter"></i></a>
					<a href="" class="float-right px-2"><i class="fa fa-instagram"></i></a>
				</div>
			@endforeach
		</div>
		<h6 class="text-center">
			<a href="{{ route('posts') }}" class="font-weight-bold custom-button">View blog posts <i class="fa fa-long-arrow-right"></i></a>
		</h6>
	</section>
	<!-- Section: Blog v.2 -->
@endsection
