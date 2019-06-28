@extends('layouts.app')

@section('content')
	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">SERVICES AND EVENTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		@include('layouts.success')
		@include('layouts.errors')
		<div class="row">
			<div class="col-md-4 text-center" style="padding: 0px !important;">
				@foreach($page_1 as $service)
					<div class="service-card p-4">
						<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
						<hr style="margin: 5px; width: 100%; border: solid .5px #ddd;">
						<p>{!! $service->description !!}</p>
						<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}, {{ $service->location }}</p>
					</div>
				@endforeach
			</div>
			<div class="col-md-4 text-center" style="padding: 0px !important;">
				@foreach($page_2 as $service)
					<div class="service-card p-4">
						<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
						<hr style="margin: 5px; width: 100%; border: solid .5px #ddd;">
						<p>{!! $service->description !!}</p>
						<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}, {{ $service->location }}</p>
					</div>
				@endforeach
			</div>
			<div class="col-md-4 text-center" style="padding: 0px !important;">
				@foreach($page_3 as $service)
					<div class="service-card p-4">
						<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
						<hr style="margin: 5px; width: 100%; border: solid .5px #ddd;">
						<p>{!! $service->description !!}</p>
						<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}, {{ $service->location }}</p>
					</div>
				@endforeach
			</div>
		</div>
		<hr>
		<div class="text-center mt-2">
			<a data-toggle="modal" data-target="#fullHeightModalRight" class="custom-button">Join a ministry</a>
		</div>
	</div>
@endsection
