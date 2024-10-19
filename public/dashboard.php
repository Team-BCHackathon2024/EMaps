<?php
include '../includes/header.php';
include '../includes/navbar.php';
session_start();


?>

<main>
    <h2>Welcome to Your Emergency Dashboard</h2>
    <section class="dashboard-content">
        <div class="card">
            <h3>Latest Alerts</h3>
            <div id="alerts-container"></div>
        </div>
        <div class="card">
            <h3>Emergency Resources</h3>
            <a href="map.php" class="button">View Map</a>
        </div>
        <div class="card">
            <h3>Your Emergency Plans</h3>
            <a href="../core/emergencyplans/viewplan.php" class="button">Manage Plans</a>
        </div>
    </section>
</main>

<script>
    fetch('../core/api/alerts.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('alerts-container');
            data.forEach(alert => {
                const alertElement = document.createElement('p');
                alertElement.textContent = `${alert.type}: ${alert.message}`;
                container.appendChild(alertElement);
            });
        });
</script>

<?php include '../includes/footer.php'; ?>
