<?php
session_start();
$collection = $_SESSION["collection"];
$importcount = 0;
$auth = $_SESSION["access_token"];
foreach ($collection as $movie) {
	if (strpos($movie, "(TV Series)") !== false) {
		echo("Skipping an item because this importer doesn't currently import TV shows. Sorry.<br/>");
	}else{
		$importcount = $importcount + 1;
		$movie = explode("(", $movie);
		$title = $movie[0];
		$yearformat = $movie[1];
		$year = substr($yearformat,0,4);
		$format = substr($yearformat,6);
		$title = preg_replace("/ $/", "", $title);
		// echo("Importing $title ($year) on $format<br/>");
		if (strpos($format, "DVD") !== false) {
			$format = "dvd";
		}else{
			$format = "bluray";
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.trakt.tv/sync/collection");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"movies\": [{\"title\": \"$title\",\"year\": $year,\"media_type\": \"$format\"}]}");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer $auth","trakt-api-version: 2","trakt-api-key: API_KEY"));
		$response = curl_exec($ch);
		curl_close($ch);
	}
}
session_unset();
session_destroy();
header("Location: https://blu2trakt.xenonnsmb.com/?finished=$importcount");
?>