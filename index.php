<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>blu2trakt</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Lato');
body {
text-align:center;
font-family:'Lato', sans-serif;
}
</style>
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1>blu2trakt</h1>
		<h5>Easily import movies in your Blu-ray.com collection to Trakt.tv.</h5>
	</div>
	<?php
	if (isset($_GET["finished"])) {
		$number = $_GET["finished"];
		echo("<div class=\"card\"><div class=\"card-header\" style=\"background-color: #28a745;color: white;\">Finished</div><div class=\"card-body\">$number items imported.</div></div>");
	}
	?>
	
	<h1 class="text-center">How it works:</h1>
	<div class="row">
		<div class="col">
			<h3>1. Export your movie list</h3>
			<p>Do this by going to your Complete collection tab, clicking "printer friendly", and copying the list.</p>
		</div>
		<div class="col">
			<h3>2. Paste it in the field below</h3>
			<p>Paste the list into the field.</p>
		</div>
		<div class="col">
			<h3>3. Sign into Trakt to import</h3>
			<p>Link your Trakt.tv account and the collection will be imported.</p>
		</div>
	</div>
	<h3 class="text-center">Paste your list here:</h3>
	<form id="input" action="submit.php" method="post">
	<textarea form="input" name="collection" rows=10 cols=30></textarea><br/>
	<input type="submit" class="btn btn-primary" value="Import"></input>
	</form>
	<hr />
	<p><a href="LICENSE.txt">Licensed under the MIT License</a>, made by <a href="https://xenonnsmb.com">XenonNSMB</a>. <a href="https://github.com/xenonnsmb/blu2trakt">Available on GitHub</a></p>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>