@extends('layouts.app')

@section('content')

	<div class="container pt-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">PRESS RELEASES</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		@foreach($press_items as $press)
			<img src="{{ asset('storage/'.$press->image) }}" alt="" style="border-radius: 15px;" width="100%">
			<div class="pb-4">
				<h5 class="mt-2 font-weight-bold">{{ $press->title }}</h5>
				{!! $press->body !!}
				<h6>Release date - {{ $press->created_at }}</h6>
			</div>
		@endforeach
	</div>

@endsection
