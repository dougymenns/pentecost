@extends('layouts.app')

@section('content')
	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">IMAGE LIBRARY</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			@foreach($folders as $folder)
				@php
					$image = App\Image::latest()->where('parent_folder', $folder->folder_name)->first();
					$image = str_replace('\\', '/', $image['image']);
				@endphp
				<div class="col-md-3">
					<div class="image-h" style="background-image: url('{{ asset('storage/'. $image) }}')">
						<a href="{{ route('images', $folder->id) }}">
							<div class="flex-center rgba-black-strong p-4">
								<h5 class="white-text text-uppercase font-weight-bold">{{ $folder->folder_name }}</h5>
							</div>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
