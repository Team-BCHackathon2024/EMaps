<?php
include '../../includes/db.php';

// This would typically fetch data from an external API or database
function fetchAlerts() {
    // Sample data for demonstration
    return [
        ["type" => "Weather", "message" => "Severe thunderstorm warning"],
        ["type" => "Fire", "message" => "Wildfire detected nearby"]
    ];
}

$alerts = fetchAlerts();
header('Content-Type: application/json');
echo json_encode($alerts);
?>


