@extends('layouts.app')

@section('content')
	<div class="container pt-4 pb-4">
		<h4 class="font-weight-bold text-center">VIDEO LIBRARY</h4>
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
									<a alt="video" data-toggle="modal" data-target="#video_{{ $video->id }}" class="text-white" style="font-size: 50px;"><i class="fas fa-video"></i></a>
								</div>
							</a>
						</div>
						<!-- Card content -->
						<div class="card-body">
							<!-- Title -->
							<h6 class="card-title font-weight-bold">{{ $video->name }} - <span class="small">{{ $video->created_at }}</span></h6>
							<hr>
							<!-- Text -->
							<p class="card-text">{{ $video->description }}</p>
							<!-- Link -->
							<a class="black-text custom-button text-center" alt="video" data-toggle="modal" data-target="#video_{{ $video->id }}">Watch Video</a>
						</div>
					</div>
					<!-- Card Light -->
				</div>
			@endforeach
		</div>

		@foreach($videos as $video)
			<!--Modal: Video-->
			<div class="modal fade" id="video_{{ $video->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<!--Content-->
					<div class="modal-content">
						<!--Body-->
						<div class="modal-body mb-0 p-0">
							<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" style="box-shadow: none !important;">
								<video class="video-fluid z-depth-1" autoplay loop controls muted>
									<source src="{{ asset('storage/'.$video->video) }}" type="video/mp4" />
								</video>
							</div>
						</div>
						<!--Footer-->
						<div class="modal-footer justify-content-center">
							<span class="mr-4">Spread the word!</span>
							<a class="px-1"><i class="fab fa-facebook"></i></a>
							<!--Twitter-->
							<a class="px-1"><i class="fab fa-twitter"></i></a>
							<!--Instagram-->
							<a class="px-1"><i class="fab fa-instagram"></i></a>
							<a type="button" class="text-danger ml-4 font-weight-bold" data-dismiss="modal">Close</a>
						</div>
					</div>
					<!--/.Content-->
				</div>
			</div>
			<!--Modal: Video-->
		@endforeach
	</div>
@endsection
