<link rel="stylesheet" href="../../assets//css//styles.css"

    <?php
    include '../../includes/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            header('Location: login.php');
            exit();
        } else {
            echo "<p class='alert'>Registration failed! Please try again.</p>";
        }
    }
    ?>
    <body>
<div class="register-container">
    <div class="register-header">
        <h2>Create Your Account</h2>
        <p>Join us and stay prepared for any situation</p>
    </div>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <div class="form-footer">
        <a href="login.php" class="button-link">Already have an account? Login</a>
        <a href="../../public/index.php" class="button-link">back home</a>
        </div>
    </form>
