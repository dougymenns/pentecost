@extends('layouts.app')

@section('content')
    <div style="height: 100vh;" class="intro">
        <div class="flex-center flex-column">
            <h1 class="animated text-center text-white fadeIn mb-2 font-weight-bold" style="font-size: 50px; font-family: 'Montserrat', sans-serif;">
				THE CHURCH OF PENTECOST
			</h1>
        </div>
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
								<span class="big-text">00</span>hrs <span class="big-text">:</span>&nbsp;&nbsp;
								<span class="big-text">00</span>mins <span class="big-text">:</span>&nbsp;&nbsp;
								<span class="big-text">00</span>secs <span class="big-text"></span>
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
					<a href="{{ route('post', $post->id) }}" class="custom-button">Read more</a>
				</div>
			@endforeach
		</div>
	</section>
	<!-- Section: Blog v.2 -->
@endsection
