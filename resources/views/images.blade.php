@extends('layouts.app')

@section('content')
	<div class="container pt-4 pb-4">
		<h4 class="font-weight-bold text-center">IMAGE LIBRARY</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<div class="row">
			<div class="col-md-12">
				<div id="mdb-lightbox-ui"></div>
				<div class="mdb-lightbox">
					@foreach($images as $image)
						<figure class="col-md-4">
							<a href="{{ asset('storage/'.$image->image) }}" data-size="1600x1067">
								<img src="{{ asset('storage/'.$image->image) }}" class="img-fluid" style="border-radius: 15px;">
							</a>
						</figure>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
