@extends('layouts.app')

@section('content')
	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">SERVICES AND EVENTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		@include('layouts.success')
		@include('layouts.errors')
		<div class="row d-flex flex-center">
			<div class="col-md-4 text-center p-4 py-5 service-card">
				@foreach($page_1 as $service)
					<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
					<hr style="margin: 5px; width: 100%; border: solid 1px #ddd;">
					<p class="pt-1">{!! $service->description !!}</p>
					<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}, {{ $service->location }}</p>
				@endforeach
			</div>
			<div class="col-md-4 text-center p-4 py-5 service-card">
				@foreach($page_2 as $service)
					<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
					<hr style="margin: 5px; width: 100%; border: solid 1px #ddd;">
					<p class="pt-1">{!! $service->description !!}</p>
					<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}, {{ $service->location }}</p>
				@endforeach
			</div>
			<div class="col-md-4 text-center p-4 py-5 service-card">
				@foreach($page_3 as $service)
					<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
					<hr style="margin: 5px; width: 100%; border: solid 1px #ddd;">
					<p class="pt-1">{!! $service->description !!}</p>
					<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}, {{ $service->location }}</p>
				@endforeach
			</div>
		</div>
		<hr>
		<div class="text-center mt-2">
			<a data-toggle="modal" data-target="#fullHeightModalRight" class="custom-button">Join a ministry</a>
		</div>
	</div>
@endsection
