@extends('layouts.app')

@section('content')
	<div class="container pt-4 pb-4">
		<h4 class="font-weight-bold text-center">PODCASTS</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			@foreach($podcasts as $podcast)
				<div class="col-md-12 py-4" style="border-bottom: solid 1px #eee;">
					<h6 class="font-weight-bold">{{ $podcast->name }} - {{ $podcast->created_at }} - {{ $podcast->podcast_length }}</h6>
					<audio controls style="width: 100%;">
						<source src="{{ asset('storage/podcast/'.$podcast->audio) }}" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio>
				</div>
			@endforeach
		</div>
	</div>
@endsection
