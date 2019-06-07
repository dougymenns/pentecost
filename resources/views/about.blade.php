@extends('layouts.app')

@section('content')

	<div class="container pt-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">{{ $about_page->page_title }}</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<img src="{{ asset('storage/'.$about_page->feature_image) }}" alt="" style="border-radius: 15px;" width="100%">
		<div class="pt-4 pb-4">{!! $about_page->body !!}</div>
	</div>

@endsection
