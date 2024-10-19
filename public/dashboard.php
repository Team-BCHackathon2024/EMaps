<?php
include '../includes/header.php';
include '../includes/navbar.php';
session_start();
?>

<main class="dashboard-main">
    <section class="dashboard-content">
        <div class="happening-now">
            <h3>Happening Now</h3>
            <div class="card">
                <h4>Hurricane Milton strengthens to Category 5 storm in the Gulf.</h4>
                <p>Emergency advisories issued for residents. Learn what to do if you are in affected areas and stay updated on further developments.</p>
                <div class="card-footer">
                    <span>Updated 10 mins ago</span>
                </div>
            </div>
            <div class="card">
                <h4>Fires burn in San Diego County.</h4>
                <p>Evacuation orders issued for parts of southern San Diego. Stay updated on emergency channels for more information.</p>
                <div class="card-footer">
                    <span>Updated 15 mins ago</span>
                </div>
            </div>
        </div>

        <div class="map-section">
            <div class="map-header">               
                <div class="map-tabs">
                    <button>Fire</button>
                    <button>Tornado</button>
                    <button>Hurricane</button>
                    <button>Critical Incident</button>
                </div>
            </div>
            <div class="map-container">
            <iframe 
        width="600" 
        height="300" 
        frameborder="0" 
        scrolling="no" 
        marginheight="0" 
        marginwidth="0" 
        src="https://www.openstreetmap.org/export/embed.html?bbox=-87.634895%2C24.396308%2C-79.974306%2C31.000968&layer=mapnik"
        style="border: 1px solid black;">
    </iframe>
    <br/>
    <small>
        <a href="https://www.openstreetmap.org/#map=6/27.9944/-81.7603"></a>
    </small>
            </div>
        </div>
    </section>

   

<?php include '../includes/footer.php'; ?>
