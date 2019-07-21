<!-- Display the countdown timer in an element -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>COP-C3 Assembly</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{ asset('js/mdb.min.js') }}" defer></script>
	<script src="{{ asset('js/compiled.min.js') }}" defer></script>
	<script src="{{ asset('js/script.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

	<!-- Styles -->
	<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/compiled.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

	<body class="hidden-sn white-skin">
		<div style="height: 100vh; width: 100%;
				background: url('{{ asset('img/tree.jpg') }}');
				background-attachment: fixed;
				background-repeat: no-repeat; background-size: cover;
				background-position: center center;">
			<div class="flex-center flex-column rgba-black-strong">
				<h2 class="text-center text-uppercase text-white fadeIn mb-2 font-weight-bold" style="font-size: 50px; font-family: 'Montserrat', sans-serif;">
					The church of pentecost
				</h2>
				<h3 class="text-center text-uppercase text-white font-weight-bold" style="font-size: 50px; font-family: 'Montserrat', sans-serif;">
					community 3 assembly
				</h3>
				<img src="{{ asset('img/copc3.png') }}" alt="" width="10%" class="mb-2">
				<h3 id="demo" class="text-center text-white font-weight-bold"></h3>
			</div>
		</div>
		{{--<p id="demo"></p>--}}

		<script>
			// Set the date we're counting down to
			var countDownDate = new Date("Jul 31, 2019 00:00:00").getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

				// Get today's date and time
				var now = new Date().getTime();

				// Find the distance between now and the count down date
				var distance = countDownDate - now;

				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				// Display the result in the element with id="demo"
				document.getElementById("demo").innerHTML = days + "d : " + hours + "h : "
					+ minutes + "m : " + seconds + "s ";

				// If the count down is finished, write some text
				if (distance < 0) {
					clearInterval(x);
					document.getElementById("demo").innerHTML = "EXPIRED";
				}
			}, 1000);
		</script>
	</body>
</html>