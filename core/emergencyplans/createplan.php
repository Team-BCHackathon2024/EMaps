<?php
include '../../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $plan_name = htmlspecialchars($_POST['plan_name']);
    $plan_details = htmlspecialchars($_POST['plan_details']);

    $stmt = $pdo->prepare("INSERT INTO emergency_plans (user_id, plan_name, plan_details) VALUES (:user_id, :plan_name, :plan_details)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':plan_name', $plan_name);
    $stmt->bindParam(':plan_details', $plan_details);

    if ($stmt->execute()) {
        echo "Plan saved successfully!";
    } else {
        echo "Error saving plan.";
    }
}
?>

<form action="" method="POST">
    <input type="text" name="plan_name" placeholder="Plan Name" required>
    <textarea name="plan_details" placeholder="Enter your emergency plan" required></textarea>
    <button type="submit">Save Plan</button>
</form>
