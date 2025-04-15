<!DOCTYPE html>
<html>
<head>
    <title>Entrance Tests - Admission Portal</title>
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

    <div class="entrance-test-section">
        <h2>Upcoming Entrance Tests</h2>
        <table class="entrance-tests-table">
            <thead>
                <tr>
                    <th>Test Name</th>
                    <th>Test Date</th>
                    <th>Application Deadline</th>
                    <th>Syllabus</th>
                    <th>Test Center</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM entrance_tests";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['test_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['test_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['application_deadline']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['syllabus']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['test_center']) . "</td>";
                        echo "<td><a href='" . htmlspecialchars($row['link']) . "' target='_blank'>Details</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No upcoming tests found.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include 'user_footer.php'; ?>
</body>
</html>