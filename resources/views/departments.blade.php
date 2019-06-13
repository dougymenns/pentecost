@extends('layouts.app')

@section('content')
	<div class="container pt-5">
		<h4 class="font-weight-bold text-center text-uppercase">DEPARTMENTS / {{ $department->name }}</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="container">
			<div class="mb-2">
				<img src="{{ asset('storage/'.$department->feature_image) }}" alt="" width="100%" style="border-radius: 15px">
			</div>
			<div class="card-body">
				{!! $department->description !!}
			</div>
		</div>
	</div>
@endsection
