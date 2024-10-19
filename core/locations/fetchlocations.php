<?php
include '../../includes/db.php';

function fetchLocations($latitude, $longitude) {
    // Sample data for demonstration. In a real scenario, use a location API
    return [
        ["name" => "Local Police Station", "lat" => "40.7128", "lng" => "-74.0060"],
        ["name" => "Community Shelter", "lat" => "40.7138", "lng" => "-74.0050"]
    ];
}

$latitude = $_GET['lat'];
$longitude = $_GET['lng'];
$locations = fetchLocations($latitude, $longitude);

header('Content-Type: application/json');
echo json_encode($locations);
?>
