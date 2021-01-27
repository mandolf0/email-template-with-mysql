<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Send email with database info</title>
	<link rel="stylesheet" type="text/css" href="w3.css">
	<style type="text/css">
		html {
			background-color: black;
			color: darkgreen;

		}

		body {
			font-size: 13pt;
			margin: 0 auto !important;
			/* background-color: darkgray; */
			max-width: 900px;
			/* border-radius: 20% 20% 20% 20%; */
		}

		a:visited {
			color: white;
		}

		a:link {
			text-decoration: none;
			color: burlywood;
		}

		.roundtop a {
			border-radius: 6px 6px 0 0;
		}
	</style>

</head>

<body class="w3-container w3-darkgray w3-round">

	<div class="w3-container w3-blue w3-content w3-round ">
		<h3>Email confirmation with database query</h1>
		<h4>This video is a follow up to an old video of mine.</h4>
			<div class="w3-right roundtop">
				<a href="email_template01.html" class="w3-button w3-yellow ">View template</a>
				<a href="https://www.youtube.com/watch?v=z4AygK9NHi8" class="w3-button w3-yellow ">Video follow-up</a>
			</div>


	</div>
	<div class="w3-card-4 w3-margin w3-teal">
		<form action="testemail.php" class="w3-container w3-cell" method="POST">
			<div class="w3-section">
				<label>Booking Id</label>
				<input class="w3-input" type="text" name="bookingId" placeholder="54">
			</div>
			<div class="w3-section">
				<button type="submit" class="w3-button w3-white w3-border w3-round-large">Send</button>

			</div>
		</form>
	</div>
	<div class="w3-third"> &nbsp;</div>
	<div class="w3-container w3-cyan w3-center w3-round w3-third">
		<h5>CSS framwork = <a href="https://www.w3schools.com/w3css">w3.css</a></h5>
	</div>


</body>
<script src="https://github.com/livereload/livereload-js/raw/master/dist/livereload.js?host=localhost"></script>


</html>