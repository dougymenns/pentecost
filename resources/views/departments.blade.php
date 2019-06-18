@extends('layouts.app')

@section('content')
	<div class="container-fluid pt-5 pb-4">
		<h4 class="font-weight-bold text-center">DEPARTMENTS</h4>
		@include('layouts.success')
		@include('layouts.errors')
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row" style="padding: 10px;">
			@foreach($departments as $department)
				@php $department_id = str_replace(' ','-',$department->name);@endphp
				@php $department_id = str_replace('\'','-',$department_id);@endphp
				<div class="col-md-6">
					<div class="card" style="border-radius: 15px !important;">
						<div class="view overlay zoom" style="height: 30vh; width: 100%; border-top-right-radius: 15px; border-top-left-radius: 15px;">
							<img src="{{ asset('storage/'.$department->feature_image) }}" width="100%" class="img-fluid " alt="">
							<div class="mask flex-center rgba-black-strong">
								<h4 class="white-text text-uppercase font-weight-bold"></h4>
							</div>
						</div>
						<div class="card-body">
							<h4 class="font-weight-bold text-center text-uppercase">{{ $department->name }}</h4>
							{!! $department->description !!}
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<hr>
		<div class="text-center mt-2">
			<a data-toggle="modal" data-target="#fullHeightModalRight" class="custom-button">Join a Department</a>
		</div>
	</div>

	<!-- Full Height Modal Right -->
	<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-full-height modal-right" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title w-100 mb-1" id="myModalLabel">Join a Department</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{route('departments.join_department')}}" class="text-center border border-light p-3">
						{{csrf_field() }}
						<input required name="name" type="text" class="form-control mb-2" placeholder="Name">
						<input required name="email" type="email" class="form-control mb-2" placeholder="E-mail">
						<input required name="phone" type="number" class="form-control mb-2" placeholder="Phone">
						<select required name="department" style="display: block; width: 100%; padding: 15px 10px; border-radius: 5px;" class="mb-2">
							<option value="">select department</option>
							@foreach($departments as $department)
								<option value="{{ $department->name }}">{{ $department->name }}</option>
							@endforeach
						</select>
						<textarea required name="interest" placeholder="What is your interest?" style="width: 100%; height: 150px;" class="mb-2"></textarea>
						<button class="btn btn-info btn-block" type="submit">Join Department</button>
					</form>
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
		});

		$(".collapse-close").click(function() {
			$(this).parent().toggle();
		})
	</script>
@endsection
