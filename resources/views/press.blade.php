@extends('layouts.app')

@section('content')
	<div style="position: fixed; top: 100px; right: 0px; z-index: 1000;">
		<a class="btn-primary" style="padding: 10px 15px;" alt="video" data-toggle="modal" data-target="#fullHeightModalRight">
			<i class="fa fa-long-arrow-left"></i>
			 Resources
			<i class="fa fa-file-text-o"></i>
		</a>
	</div>
	<div class="container pt-4 p-4" style="font-family: 'Times New Roman;">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">PRESS RELEASES</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		@foreach($press_items as $press)
			<img src="{{ asset('storage/'.$press->image) }}" alt="" style="border-radius: 15px;" width="100%">
			<div class="pb-4">
				<h4 class="mt-2 font-weight-bold text-center">{{ $press->title }}</h4>
				{!! $press->body !!}
				<h6>Release date - {{ $press->created_at }}</h6>
			</div>
		@endforeach
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

@endsection
