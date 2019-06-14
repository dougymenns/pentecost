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
	<section class="my-5 container">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">WEEKLY SERVICES</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row d-flex flex-center" style="background-color: #eee; border: solid 1px #ddd;">
			<div class="col-md-4 text-center p-4">
				<h6 class="font-weight-bold">SUNDAY SERVICE</h6>
				<hr style="margin: 5px; width: 100%; border: solid 1px #ddd;">
				<p class="pt-1">Service starts at 7:00 to 10:30 am. A 30 minute Bible study session
					is done to teach members on the cardinal attributes of the early apostles and disciples of Christ.
					This teaching is done in three different groups; i.e Children, Twi and English speaking members.
					The main service commences after the Bible study with spirit filled teachings from the leadership of the church.
					A week long program is organized before the Lord's Super day which is the first Sunday of the month.
					This program is dedicated to the teaching and importance of the meal.</p>
			</div>
			<div class="col-md-4 text-center p-4" style="border-left: solid 1px #ddd; border-right: solid 1px #ddd;">
				<h6 class="font-weight-bold">MONDAY – YOUTH SERVICE AND MMAKUO MPAEBO</h6>
				<hr style="margin: 5px; width: 100%; border: solid 1px #ddd;">
				<p class="pt-1">The Youth in the Assembly meet to worship on Mondays.
					This service differs from week to week depending on the topics and programs designed for the week.
					Open discussions are organized among members and leaders to address the concerns on
					the youth through scriptures. Occasionally movie nights are scheduled for the
					screening of Christian movies to teach members on their walk with Christ.</p>
			</div>
			<div class="col-md-4 text-center p-4">
				<h6 class="font-weight-bold">TUESDAY – WOMEN OR MEN MINISTRY SERVICE</h6>
				<hr style="margin: 5px; width: 100%; border: solid 1px #ddd;">
				<p class="pt-1">This day is rotated between the Men and Women Ministry.
					Each group meets on their alternating days to discuss ways to help improve the
					lives of both the men and womenfolk. Each group teaches on issues pertaining to their gender.
					Biblical teachings on the roles of men and women in the home,
					church and society as a whole is done periodically for members.
					Seminars are organized periodically for members to discuss ways they could improve their lives in various ways.</p>
			</div>
		</div>
		<h6 class="text-center mt-2">
			<a href="" class="font-weight-bold custom-button">See all services <i class="fa fa-long-arrow-right"></i></a>
		</h6>
	</section>
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
