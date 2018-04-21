<?php
session_start();
if (!isset($_GET["code"])) {
	die("OAuth error");
}
$code = $_GET["code"];
$code = preg_replace("/[^A-Za-z0-9]/", "", $code);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.trakt.tv/oauth/token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"code\": \"$code\",
  \"client_id\": \"CLIENT_ID\",
  \"client_secret\": \"CLIENT_SECRET\",
  \"redirect_uri\": \"REDIRECT_URI\",
  \"grant_type\": \"authorization_code\"
}");
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
$response = curl_exec($ch);
curl_close($ch);
$decoded = json_decode($response);
$access_token = $decoded->{"access_token"};
$_SESSION["access_token"] = $access_token;
header("Location: https://blu2trakt.xenonnsmb.com/import.php");
exit();
?>
