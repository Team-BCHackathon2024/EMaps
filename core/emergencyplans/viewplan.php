<?php
include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM emergency_plans WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$plans = $stmt->fetchAll();
?>

<main>
    <h2>Your Emergency Plans</h2>
    <?php if (count($plans) > 0): ?>
        <ul>
            <?php foreach ($plans as $plan): ?>
                <li>
                    <h3><?php echo htmlspecialchars($plan['plan_name']); ?></h3>
                    <p><?php echo htmlspecialchars($plan['plan_details']); ?></p>
                    <a href="updateplan.php?plan_id=<?php echo $plan['id']; ?>" class="button">Edit Plan</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No emergency plans found. <a href="createplan.php" class="button">Create a Plan</a></p>
    <?php endif; ?>
</main>

<?php include '../../includes/footer.php'; ?>
