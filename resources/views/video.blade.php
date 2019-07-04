@extends('layouts.app')

@section('content')

	<div class="container pt-5">
		<div class="modal-content" style="border-radius:15px;">
			<!--Body-->
			<div class="modal-body mb-0 p-0">
				<div class="embed-responsive embed-responsive-16by9" style="box-shadow: none !important; border-radius: 15px;">
					<iframe class="embed-responsive-item" src="{{ $video->video_link }}" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<div class="pt-4 pb-4">
			<h5 class="font-weight-bold">{{ $video->name }}</h5>
			{!! $video->description !!}
		</div>

		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">MORE VIDEOS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			@foreach($videos as $more_video)
				@if($more_video->id != $video->id )
					<div class="col-md-4">
						<!-- Card Light -->
						<div class="card" style="border-radius: 15px !important;">
							<!-- Card image -->
							<div class="view overlay">
								<img class="card-img-top" src="{{ asset('storage/'.$more_video->video_thumbnail) }}" alt="Card image cap" style="border-top-right-radius: 15px; border-top-left-radius: 15px;">
								<a>
									<div class="mask rgba-white-slight flex-column flex-center">
										<a href="{{ route('video', $more_video->id) }}" class="text-white" style="font-size: 50px;"><i class="fas fa-video"></i></a>
									</div>
								</a>
							</div>
							<!-- Card content -->
							<div class="card-body">
								<!-- Title -->
								<h6 class="card-title font-weight-bold">{{ $more_video->name }} - <span class="small">{{ $more_video->created_at }}</span></h6>
								<hr>
								<!-- Text -->
								<p class="card-text">{!! $more_video->description !!}</p>
								<!-- Link -->
								<a href="{{ route('video', $more_video->id) }}"  class="black-text custom-button text-center">Watch Video</a>
							</div>
						</div>
						<!-- Card Light -->
					</div>
				@endif
			@endforeach
		</div>
	</div>

@endsection
