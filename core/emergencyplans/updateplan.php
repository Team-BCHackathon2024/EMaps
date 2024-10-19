<?php
include '../../includes/db.php';
session_start();

if (!isset($_SESSION['user_id']) || !isset($_GET['plan_id'])) {
    header("Location: viewplan.php");
    exit();
}

$plan_id = intval($_GET['plan_id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plan_name = htmlspecialchars($_POST['plan_name']);
    $plan_details = htmlspecialchars($_POST['plan_details']);

    $stmt = $pdo->prepare("UPDATE emergency_plans SET plan_name = :plan_name, plan_details = :plan_details WHERE id = :plan_id");
    $stmt->bindParam(':plan_name', $plan_name);
    $stmt->bindParam(':plan_details', $plan_details);
    $stmt->bindParam(':plan_id', $plan_id);

    if ($stmt->execute()) {
        header("Location: viewplan.php");
        exit();
    } else {
        echo "Failed to update the plan.";
    }
}

// Fetch current plan details
$stmt = $pdo->prepare("SELECT * FROM emergency_plans WHERE id = :plan_id");
$stmt->bindParam(':plan_id', $plan_id);
$stmt->execute();
$plan = $stmt->fetch();
?>

<form action="" method="POST">
    <input type="text" name="plan_name" value="<?php echo htmlspecialchars($plan['plan_name']); ?>" required>
    <textarea name="plan_details" required><?php echo htmlspecialchars($plan['plan_details']); ?></textarea>
    <button type="submit">Update Plan</button>
</form>
