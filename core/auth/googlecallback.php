<?php
require_once '../../vendor/autoload.php';
require_once '../../includes/db.php'; // Your database connection

session_start();

$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('YOUR_REDIRECT_URI'); // Example: 'http://localhost/plutohack/core/auth/googlecallback.php'

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Get user profile info
    $oauth2 = new Google_Service_Oauth2($client);
    $google_account_info = $oauth2->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;

    // Check if the user exists in your database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        // User exists, log them in
        $_SESSION['user_id'] = $user['id'];
    } else {
        // User does not exist, create a new user
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Get the newly created user's ID
        $_SESSION['user_id'] = $pdo->lastInsertId();
    }

    // Redirect to the dashboard
    header('Location: ../../public/dashboard.php');
    exit();
} else {
    // Redirect to the login page if there is no authorization code
    header('Location: google.php');
    exit();
}
?>
