@extends('layouts.app')

@section('content')
	<div class="container pt-4 p-4">
		<h4 class="mt-3 text-center" style="font-family: 'Montserrat', sans-serif;">IMAGE LIBRARY</h4>
		<hr class="mb-3 hr" style="width: 80px; border: solid 0.5px black;">
		<a href="#" onclick="backAway()"><i class="fa fa-long-arrow-left"></i> go back</a>
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

	<script>
		function backAway(){
			//if it was the first page
			if(history.length === 1){
				window.location = "http://www.mysite.com/"
			} else {
				history.back();
			}
		}
	</script>
@endsection
