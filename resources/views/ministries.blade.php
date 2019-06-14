@extends('layouts.app')

@section('content')
	<div class="container pt-5 pb-4">
		<h4 class="font-weight-bold text-center">MINISTRIES</h4>
		@include('layouts.success')
		@include('layouts.errors')
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div>
			@foreach($ministries as $ministry)
				<div>
					<a class="collapse-trigger" data-toggle="collapse" href="#{{ $ministry->name }}" aria-expanded="false" aria-controls="{{ $ministry->name }}">
						<div class="view overlay zoom" style="height: 30vh; width: 100%;">
							<img src="{{ asset('storage/'.$ministry->feature_image) }}" width="100%" class="img-fluid " alt="">
							<div class="mask flex-center rgba-black-strong">
								<h4 class="white-text text-uppercase font-weight-bold">{{$ministry->name}}</h4>
							</div>
						</div>
					</a>
					<div class="card-body collapse mb-3" id="{{ $department->name }}">
						<h4 class="font-weight-bold text-center text-uppercase">{{ $ministry->name }}</h4>
						{!! $ministry->description !!}
						<a class="collapse-close float-right text-danger">close</a>
					</div>
				</div>
			@endforeach
			<hr>
			<div class="text-center mt-2">
				<a data-toggle="modal" data-target="#fullHeightModalRight" class="custom-button">Join a ministry</a>
			</div>
		</div>
	</div>

	<!-- Full Height Modal Right -->
	<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-full-height modal-right" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title w-100 mb-1" id="myModalLabel">Join a Ministry</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{route('ministries.join_ministry')}}" class="text-center border border-light p-3">
						{{csrf_field() }}
						<input required name="name" type="text" class="form-control mb-2" placeholder="Name">
						<input required name="email" type="email" class="form-control mb-2" placeholder="E-mail">
						<input required name="phone" type="number" class="form-control mb-2" placeholder="Phone">
						<select required name="department" style="display: block; width: 100%; padding: 15px 10px; border-radius: 5px;" class="mb-2">
							<option value="">select ministry</option>
							@foreach($ministries as $ministry)
								<option value="{{ $ministry->name }}">{{ $ministry->name }}</option>
							@endforeach
						</select>
						<textarea required name="interest" placeholder="What is your interest?" style="width: 100%; height: 150px;" class="mb-2"></textarea>
						<button class="btn btn-info btn-block" type="submit">Join ministry</button>
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
