<?php
include '../includes/header.php';
include '../includes/navbar.php';
session_start();

// Use location APIs or a custom function to display nearest facilities
?>

<main>
    <h2>Find Nearby Emergency Facilities</h2>
    <div id="map-container">
        <p>Loading map...</p>
        <!-- Map Integration Example (e.g., Google Maps API or Leaflet.js) -->
        <div id="map"></div>
    </div>
</main>

<script src="assets/js/map.js"></script>
<?php include '../includes/footer.php'; ?>
