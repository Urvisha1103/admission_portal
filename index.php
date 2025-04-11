<!DOCTYPE html>
<html>
<head>
    <title>Admission Portal</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">

    <section class="hero-section" style="background-image: url('assets/images/new-bg.jpg'); background-size: cover; background-position: center;">
        <h1>Your Gateway to Higher Education</h1>
        <p>Find comprehensive admission information for UG, PG, and Diploma programs across various states.</p>
        <a href="#featured-admissions" class="cta-button">Explore Admissions</a>
    </section>

        <section id="featured-admissions" class="featured-admissions">
            <h2>Featured Admissions</h2>
            <div class="admission-grid">
                <?php
                include 'database/db_config.php';
                $sql = "SELECT admissions.*, states.state_name, programs.program_name FROM admissions INNER JOIN states ON admissions.state_id = states.id INNER JOIN programs ON admissions.program_id = programs.id LIMIT 6"; // Limit to 6 featured admissions
                $result = $conn->query($sql);

                if ($result) { // Check if the query was successful
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='admission-item'>";
                            echo "<h3>" . $row['announcement'] . "</h3>";
                            echo "<p>State: " . $row['state_name'] . "</p>";
                            echo "<p>Program: " . $row['program_name'] . "</p>";
                            echo "<p>Start Date: " . $row['start_date'] . "</p>";
                            echo "<a href='" . $row['link'] . "' target='_blank'>Learn More</a>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No featured admissions found.</p>";
                    }
                } else {
                    echo "Error: " . $conn->error; // Display the error message
                }
                
                $conn->close();
                ?>
            </div>
        </section>

        <section class="services-section">
            <h2>Our Services</h2>
            <div class="services-grid">
                <div class="service-item">
                    <h3>Comprehensive Admission Listings</h3>
                    <p>Access up-to-date admission announcements from various states.</p>
                </div>
                <div class="service-item">
                    <h3>Program Information</h3>
                    <p>Get detailed information about UG, PG, and Diploma programs.</p>
                </div>
                <div class="service-item">
                    <h3>Important Dates & Deadlines</h3>
                    <p>Never miss a deadline with our timely notifications.</p>
                </div>
                <div class="service-item">
                    <h3>Application Assistance</h3>
                    <p>Guidance and resources to help you through the application process.</p>
                </div>
            </div>
        </section>

        <section class="how-it-works-section">
            <h2>How It Works</h2>
            <div class="how-it-works-steps">
                <div class="step">
                    <h3>1. Search & Filter</h3>
                    <p>Use our search and filter tools to find relevant admission listings.</p>
                </div>
                <div class="step">
                    <h3>2. Explore Details</h3>
                    <p>View detailed information about admission announcements and programs.</p>
                </div>
                <div class="step">
                    <h3>3. Apply Directly</h3>
                    <p>Follow the provided links to apply directly to the institutions.</p>
                </div>
            </div>
        </section>

        <section class="contact-section">
            <h2>Contact Us</h2>
            <p>Have questions? Reach out to us for assistance.</p>
            <a href="contact.php" class="contact-button">Contact Us</a>
        </section>

        </div>

    <?php include 'footer.php'; ?>

    <script>
        // JavaScript Code
    </script>
</body>
</html>