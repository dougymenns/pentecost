@extends('layouts.app')

@section('content')
	<div class="container pt-4 pb-4">
		<!-- Section: Blog v.2 -->
		<section class="my-5 blog">
			<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">BLOG POSTS</h4>
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
		</section>
		<!-- Section: Blog v.2 -->
	</div>
@endsection