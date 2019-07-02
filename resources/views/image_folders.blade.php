@extends('layouts.app')

@section('content')
	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">IMAGE LIBRARY</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			@foreach($folders as $folder)
				<div class="col-md-3">
					<a class="font-weight-bold" href="{{ route('images', $folder->id) }}">
						<i class="fa fa-folder" style="width: 100% !important; font-size: 150px;"></i>
						{{ $folder->folder_name }}
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection
