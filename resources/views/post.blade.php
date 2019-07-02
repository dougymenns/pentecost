@extends('layouts.app')

@section('content')
	<div style="height: 50vh; background: url('{{ asset('storage/'.$post->image) }}');
		background-attachment: fixed;
		background-repeat: no-repeat; background-size: cover;
		background-position: center center;">
		<div class="flex-center flex-column" style="background: rgba(12,12,12, 0.7)">
			<h1 class="animated text-center text-white fadeIn mb-2 font-weight-bold" style="font-size: 50px; font-family: 'Montserrat', sans-serif;">
				{{ $post->title }}
			</h1>
		</div>
	</div>

	<div class="container pt-4">
		<div>{!! $post->body !!}</div>
		<div>
			<p><h6 class="font-weight-bold">An aouthor</h6><br>{{ $post->created_at }}</p>
		</div>
	</div>

	<section class="my-5 container blog">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">MORE BLOG POSTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			@foreach($posts as $additional_post)
				@if($additional_post->id !=  $post->id)
					<div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
						<div class="view overlay rounded z-depth-2 mb-1">
							<img class="img-fluid" src="{{ asset('storage/'.$additional_post->image) }}" alt="Sample image">
							<a href="{{ route('post', $additional_post->id) }}">
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>
						<h5 class="font-weight-bold"><strong>{{ $additional_post->title }}</strong></h5>
						<p>by <a class="font-weight-bold small">Billy Forester</a>, {{ $additional_post->created_at }}</p>
						<p class="dark-grey-text">{{ $additional_post->excerpt }}</p>
						<a href="{{ route('post', $post->id) }}" class="font-weight-bold">Read more <i class="fa fa-long-arrow-right"></i></a>
					</div>
				@endif
			@endforeach
		</div>
	</section>

@endsection
