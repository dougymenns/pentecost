@extends('layouts.app')

@section('content')

	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">SERVICES AND EVENTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			@foreach($services as $service)
				<div class="col-md-4 text-center" style="padding: 10px !important;">
					<div class="service-card p-4" style="height: 100% !important;">
						<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
						<p class="full" style="display: none !important;">{!! $service->description !!}</p>
						<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection
