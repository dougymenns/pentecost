@extends('layouts.app')

@section('content')
	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">BLOG POSTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
			<div class="row">
				@foreach($posts as $post)
					@php
						$cropped_image = explode(".", $post->image);
						$cropped = $cropped_image[0]."-cropped.".$cropped_image[1];
					@endphp
					<div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
						<div class="view overlay rounded z-depth-2 mb-1">
							<img class="img-fluid" src="{{ asset('storage/'.$cropped) }}" alt="Sample image">
							<a href="{{ route('post', $post->id) }}">
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>
						<h5 class="font-weight-bold"><strong>{{ $post->title }}</strong></h5>
						<p>by <a class="font-weight-bold small">{{ $post->author }}</a>, {{ $post->created_at }}</p>
						<p class="dark-grey-text">{{ $post->excerpt }}</p>
						<a href="{{ route('post', $post->id) }}" class="font-weight-bold">Read more <i class="fa fa-long-arrow-right"></i></a>
					</div>
				@endforeach
			</div>
		</section>
	</div>
@endsection
