<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - Admission Portal</title>
    <link rel="stylesheet" type="text/css" href="style/User/user_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0Hhonpy0AIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    include 'user_navbar.php';
    include '../database/db_config.php'; // Include the database connection file

    // Start session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <div class="user-container">
        <h1>Welcome to Your Admission Dashboard</h1>

        <section class="dashboard-section">
            <h2><i class="fas fa-bullhorn"></i> Latest Announcements</h2>
            <div class="announcement-list card-list">
                <?php
                // Fetch Announcements
                $sql = "SELECT * FROM announcements";
                $result = $conn->query($sql);

                $announcements = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $announcements[] = $row;
                    }
                }

                foreach ($announcements as $announcement) {
                    echo '<div class="card">';
                    echo '<h3>' . $announcement["title"] . '</h3>';
                    echo '<p>State: ' . $announcement["state"] . ', Date: ' . date('F j, Y', strtotime($announcement["date"])) . '</p>';
                    echo '<a href="' . $announcement["link"] . '" class="dashboard-link">View Details</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>

        <section class="dashboard-section">
            <h2><i class="fas fa-calendar-alt"></i> Upcoming Entrance Tests</h2>
            <div class="test-list card-list">
                <?php
                // Fetch Tests
                $sql = "SELECT * FROM tests";
                $result = $conn->query($sql);

                $tests = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $tests[] = $row;
                    }
                }

                foreach ($tests as $test) {
                    echo '<div class="card">';
                    echo '<h3>' . $test["name"] . '</h3>';
                    echo '<p>Date: ' . date('F j, Y', strtotime($test["date"])) . ', Time: ' . date('h:i A', strtotime($test["time"])) . '</p>';
                    echo '<a href="' . $test["link"] . '" class="dashboard-link">View Details</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>

        <section class="dashboard-section">
            <h2><i class="fas fa-file-alt"></i> Application Status</h2>
            <div class="application-list card-list">
                <?php
                // Fetch Applications
                $sql = "SELECT * FROM applications WHERE user_id = " . $_SESSION['user_id'];
                $result = $conn->query($sql);

                $applications = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $applications[] = $row;
                    }
                }

                foreach ($applications as $application) {
                    $statusClass = ($application["status"] == "Accepted") ? "status-accepted" : (($application["status"] == "Pending") ? "status-pending" : "status-rejected");
                    echo '<div class="card">';
                    echo '<h3>' . $application["program"] . '</h3>';
                    echo '<p>Status: <span class="' . $statusClass . '">' . $application["status"] . '</span></p>';
                    echo '<a href="' . $application["link"] . '" class="dashboard-link">Track Application</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>

        <section class="dashboard-section">
            <h2><i class="fas fa-bookmark"></i> Saved Admissions</h2>
            <div class="saved-list card-list">
                <?php
                // Fetch Saved Admissions
                $sql = "SELECT * FROM saved_admissions WHERE user_id = " . $_SESSION['user_id'];
                $result = $conn->query($sql);

                $saved = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $saved[] = $row;
                    }
                }

                foreach ($saved as $save) {
                    echo '<div class="card">';
                    echo '<h3>' . $save["title"] . '</h3>';
                    echo '<p>State: ' . $save["state"] . '</p>';
                    echo '<a href="' . $save["link"] . '" class="dashboard-link">View Details</a>';
                    echo '</div>';
                }
                $conn->close();
                ?>
            </div>
            <a href="userPannel/saved_admissions.php" class="user-button">View All Saved Admissions</a>
        </section>
    </div>

    <?php include 'user_footer.php'; ?>
</body>
</html>