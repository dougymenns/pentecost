@extends('layouts.app')

@section('content')
	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">VIDEO LIBRARY</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			@foreach($videos as $video)
				<div class="col-md-4">
					<!-- Card Light -->
					<div class="card" style="border-radius: 15px !important;">
						<!-- Card image -->
						<div class="view overlay">
							<img class="card-img-top" src="{{ asset('storage/'.$video->video_thumbnail) }}" alt="Card image cap" style="border-top-right-radius: 15px; border-top-left-radius: 15px;">
							<a>
								<div class="mask rgba-white-slight flex-column flex-center">
									<a href="{{ route('video', $video->id) }}" class="text-white" style="font-size: 50px;"><i class="fas fa-video"></i></a>
								</div>
							</a>
						</div>
						<!-- Card content -->
						<div class="card-body">
							<!-- Title -->
							<h6 class="card-title font-weight-bold">{{ $video->name }} - <span class="small">{{ $video->created_at }}</span></h6>
							<hr>
							<!-- Text -->
							<p class="card-text">{!! $video->description !!}</p>
							<!-- Link -->
							<a href="{{ route('video', $video->id) }}"  class="black-text custom-button text-center">Watch Video</a>
						</div>
					</div>
					<!-- Card Light -->
				</div>
			@endforeach
		</div>
	</div>
@endsection
