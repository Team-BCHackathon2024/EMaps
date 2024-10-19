<?php
// Include Google Client Library
require_once '../../vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('YOUR_REDIRECT_URI'); // Example: 'http://localhost/core/plutohack/auth/googlecallback.php'
$client->addScope('email');
$client->addScope('profile');

$login_url = $client->createAuthUrl();
header('Location: ' . filter_var($login_url, FILTER_SANITIZE_URL));
exit();
?>
