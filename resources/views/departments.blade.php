@extends('layouts.app')

@section('content')
	<div class="container pt-4">
		<h4 class="font-weight-bold text-center">DEPARTMENTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		@foreach($departments as $department)
			<!--Accordion wrapper-->
			<div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
				<!-- Accordion card -->
				<div class="card">
					<!-- Card header -->
					<div class="card-header" role="tab" id="headingTwo1">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#{{ $department->name }}"
						   aria-expanded="false" aria-controls="{{ $department->name }} ">
							<h5 class="mb-0 font-weight-bold text-capitalize">
								{{ $department->name }} <i class="fas fa-angle-down rotate-icon"></i>
							</h5>
						</a>
					</div>
					<!-- Card body -->
					<div id="{{ $department->name }}" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
						 data-parent="#accordionEx1">
						<div>
							<img src="{{ asset('storage/'.$department->feature_image) }}" alt="" width="100%" style="border-radius: 15px">
						</div>
						<div class="card-body">
							{!! $department->description !!}
						</div>
					</div>
				</div>
				<!-- Accordion card -->
			</div>
			<!-- Accordion wrapper -->
		@endforeach
	</div>
@endsection
