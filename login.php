
<?php 
$title = "Login page";
include 'includes/htmlhead.php';
//include 'includes/db.php' 
?>

<?php

?>
    <div class="login-container">
        <h1>Welcome to EMaps</h1>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Replace with your own user authentication logic
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
                $stmt->execute([$username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    // Login successful, redirect to the  home page
                    header("Location: index.php");
                    exit();
                } else {
                    // Show an error message
                    echo "<p class='error'>Invalid username or password.</p>";
                }
            }
        ?>
            <form class="login-form" method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <div class="google-login">
            <h3>Or login with</h3>
            <button onclick="loginWithGoogle()">Login with Google</button>
        </div>
    </div>

    <script>
        function loginWithGoogle() {
            // Placeholder function for Google login
            alert('Google login functionality goes here.');
        }
    </script>

<?php include 'includes/htmlfoot.php'; ?>


