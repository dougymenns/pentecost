@extends('layouts.app')

@section('content')
	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">SERVICES AND EVENTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		@include('layouts.success')
		@include('layouts.errors')
		<div class="row">
			@foreach($services as $service)
				<div class="col-md-4 text-center" style="padding: 10px !important;">
					<div class="service-card p-4">
						<h6 class="font-weight-bold text-uppercase">{{ $service->name }}</h6>
						<p class="truncated">{!! Str::limit($service->description, 90 ); !!}<a class="collapse-trigger">read more</a></p>
						<p class="full hide">{!! $service->description !!}<a class="collapse-close">...read less</a></p>
						<p class="font-small font-weight-bold text-capitalize">Happens every {{ $service->recurrence }}, {{ $service->location }}</p>
					</div>
				</div>
			@endforeach
		</div>
		<hr>
		<div class="text-center mt-2">
			<a data-toggle="modal" data-target="#fullHeightModalRight" class="custom-button">Join a ministry</a>
		</div>
	</div>

	<script>
		$(".collapse-trigger").click(function() {
			$(this).parent().toggle();
			$(".full").toggle();
		});

		$(".collapse-close").click(function() {
			$(this).parent().toggle();
			$(".truncated").toggle();
		})
	</script>

@endsection
