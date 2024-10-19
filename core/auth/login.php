<link rel="stylesheet" href="../../assets//css//styles.css"
<?php
include '../../includes/header.php';
include '../../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../../public/dashboard.php');
        exit();
    } else {
        $error_message = "Invalid login credentials!";
    }
}
?>

<div class="login-container">
    <form class="login-form" action="" method="POST">
        <h2>Login to Your Account</h2>
        <?php if (isset($error_message)): ?>
            <p class="alert"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <div class="social-login">
            <a href="auth/google.php" class="google-login">Login with Google</a>
            <a href="auth/github.php" class="github-login">Login with GitHub</a>
            <a href="auth/linkedin.php" class="linkedin-login">Login with LinkedIn</a>
        </div>
        <a href="register.php" class="button-link">Don't have an account? Sign up</a>
        <a href="../../public/index.php" class="button-link">back home</a>
    </form>
</div>
