<?php
session_start();
session_unset();
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
if (!isset($_POST["collection"])) {
	die("Please use the form.");
}
$collection = $_POST["collection"];
$collection = explode("\n", $collection);
$_SESSION["collection"] = $collection;
header("Location: https://trakt.tv/oauth/authorize?response_type=code&client_id=CLIENT_IDredirect_uri=REDIRECT_URI");
exit();
?>
