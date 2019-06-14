@extends('layouts.app')

@section('content')
	<div class="container pt-5 pb-4">
		<h4 class="font-weight-bold text-center">DEPARTMENTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="container">
			@foreach($departments as $department)
				<h5 class="font-weight-bold text-center mt-2">{{ $department->name }}</h5>
				<p style="height: 30vh; width: 100%; border-radius: 15px;
						background: url('{{ asset('storage/'.$department->feature_image) }}');
						background-repeat: no-repeat; background-size: cover;
						background-position: center center;">
				</p>
				<div class="card-body">
					{!! $department->description !!}
				</div>
				<hr>
			@endforeach
			<div class="text-center mt-2">
				<a data-toggle="modal" data-target="#fullHeightModalRight" class="custom-button">Join a Department</a>
			</div>
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
@endsection
