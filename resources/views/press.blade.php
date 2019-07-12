@extends('layouts.app')

@section('content')
	<div style="position: fixed; top: 100px; right: 0px; z-index: 1000;">
		<a class="btn-primary" style="padding: 10px 15px;" alt="video" data-toggle="modal" data-target="#fullHeightModalRight">
			<i class="fa fa-long-arrow-left"></i>
			 Resources
			<i class="fa fa-file-text-o"></i>
		</a>
	</div>
	<div class="container pt-4 p-1 pb-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">PRESS RELEASES</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			<div class="col-md-4" style="border-right: solid black 1px;">
				@foreach($press_items as $press)
					@php $key = array_search($press, $press_items);@endphp
					@php $press_id = "press_".$press['id'] @endphp
					@php
						$cropped_image = explode(".", $press['image']);
						$cropped = $cropped_image[0]."-cropped.".$cropped_image[1];
					@endphp
					@if($key == 0 || ($key)%3 == 0)
						<div class="mb-1">
							<div class="parent-container">
								<img class="cropped-image" src="{{ asset('storage/'.$cropped) }}" alt="" style="border-radius: 10px;" width="100%">
								<img class="full-image" src="{{ asset('storage/'.$press['image']) }}" alt="" style="border-radius: 10px; display: none;" width="100%">
								<h4 class="mt-1 font-weight-bold text-center">{{ $press['title'] }}</h4>
								<div>{{ $press['excerpt'] }}</div>
								<div>
									<a  class="collapse-trigger" data-toggle="collapse" href="#{{ $press_id }}" aria-expanded="false" aria-controls="{{ $press_id }}">read more...</a>
									<div class="collapse" id="{{ $press_id }}">
										<p>{!! $press['body'] !!}<a href="#" class="collapse-close">...read less</a></p>
									</div>
								</div>
								<h6 class="mt-1">Release date - {{ $press['created_at'] }}</h6>
							</div>
						</div>
					@endif
				@endforeach
			</div>
			<div class="col-md-4" style="border-right: solid black 1px;">
				@foreach($press_items as $press)
					@php $key = array_search($press, $press_items);@endphp
					@php $press_id = "press_".$press['id'] @endphp
					@php
						$cropped_image = explode(".", $press['image']);
						$cropped = $cropped_image[0]."-cropped.".$cropped_image[1];
					@endphp
					@if(($key+2)%3 == 0)
						<div class="mb-1">
							<div class="parent-container">
								<img class="cropped-image" src="{{ asset('storage/'.$cropped) }}" alt="" style="border-radius: 10px;" width="100%">
								<img class="full-image" src="{{ asset('storage/'.$press['image']) }}" alt="" style="border-radius: 10px; display: none;" width="100%">
								<h4 class="mt-1 font-weight-bold text-center">{{ $press['title'] }}</h4>
								<div>{{ $press['excerpt'] }}</div>
								<div>
									<a  class="collapse-trigger" data-toggle="collapse" href="#{{ $press_id }}" aria-expanded="false" aria-controls="{{ $press_id }}">read more...</a>
									<div class="collapse" id="{{ $press_id }}">
										<p>{!! $press['body'] !!}<a href="#" class="collapse-close">...read less</a></p>
									</div>
								</div>
								<h6 class="mt-1">Release date - {{ $press['created_at'] }}</h6>
							</div>
						</div>
					@endif
				@endforeach
			</div>
			<div class="col-md-4">
				@foreach($press_items as $press)
					@php $key = array_search($press, $press_items);@endphp
					@php $press_id = "press_".$press['id'] @endphp
					@php
						$cropped_image = explode(".", $press['image']);
						$cropped = $cropped_image[0]."-cropped.".$cropped_image[1];
					@endphp
					@if(($key+1)%3 == 0)
						<div class="mb-1">
							<div class="parent-container">
								<img class="cropped-image" src="{{ asset('storage/'.$cropped) }}" alt="" style="border-radius: 10px;" width="100%">
								<img class="full-image" src="{{ asset('storage/'.$press['image']) }}" alt="" style="border-radius: 10px; display: none;" width="100%">
								<h4 class="mt-1 font-weight-bold text-center">{{ $press['title'] }}</h4>
								<div>{{ $press['excerpt'] }}</div>
								<div>
									<a  class="collapse-trigger" data-toggle="collapse" href="#{{ $press_id }}" aria-expanded="false" aria-controls="{{ $press_id }}">read more...</a>
									<div class="collapse" id="{{ $press_id }}">
										<p>{!! $press['body'] !!}<a href="#" class="collapse-close">...read less</a></p>
									</div>
								</div>
								<h6 class="mt-1">Release date - {{ $press['created_at'] }}</h6>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>

	<!-- Full Height Modal Right -->
	<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-full-height modal-right" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title w-100 mb-1" id="myModalLabel">Resources <i class="fa fa-file-text-o"></i></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					@foreach($resources as $resource)
						@php
							$file = explode('"', $resource->file);
						@endphp
						<div style="border-bottom: solid 1px #ddd; padding: 10px 0px;">
							<a href="{{ asset('storage/'.$file[3]) }}" download="{{ $resource->file_name }}">
								<i class="fa fa-file-pdf-o"></i>
								{{ $resource->file_name }} - {{ $resource->created_at }} -
								<i class="fa fa-download"></i>
							</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- Full Height Modal Right -->

	<script>
		$(".collapse-trigger").click(function() {
			if ($(this).siblings().hasClass('show')) {
				$(this).siblings().toggle();
				$(this).siblings().removeClass('show');
			}
			$(this).closest('.parent-container').find(".collapse-trigger").toggle();
			$(this).closest('.parent-container').find('.cropped-image').toggle();
			$(this).closest('.parent-container').find('.full-image').toggle();
		});

		$(".collapse-close").click(function() {
			$(this).parent().toggle();
			$(this).closest('.parent-container').find(".collapse-trigger").toggle();
			$(this).closest('.parent-container').find('.cropped-image').toggle();
			$(this).closest('.parent-container').find('.full-image').toggle();
		})
	</script>

@endsection
