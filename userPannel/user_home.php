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

<div class="search-filter-section">
    <h2>Search and Filter Admissions</h2>
    <form action="" method="GET">
        <input type="text" name="keyword" placeholder="Enter keyword">

        <select name="state">
            <option value="">All States</option>
            <?php
            // Fetch states from the database
            include '../database/db_config.php';
            $states_sql = "SELECT * FROM states";
            $states_result = $conn->query($states_sql);
            if ($states_result && $states_result->num_rows > 0) {
                while ($state = $states_result->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($state['id']) . "'>" . htmlspecialchars($state['state_name']) . "</option>";
                }
            }
            ?>
        </select>

        <select name="program">
            <option value="">All Programs</option>
            <?php
            // Fetch programs from the database
            $programs_sql = "SELECT * FROM programs";
            $programs_result = $conn->query($programs_sql);
            if ($programs_result && $programs_result->num_rows > 0) {
                while ($program = $programs_result->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($program['id']) . "'>" . htmlspecialchars($program['program_name']) . "</option>";
                }
            }
            ?>
        </select>

        <button type="submit">Search</button>
    </form>
</div>

<div class="announcement-section">
    <h2>Admissions Results</h2>
    <table class="admissions-table">
        <thead>
            <tr>
                <th>University</th>
                <th>Program</th>
                <th>Announcement</th>
                <th>Deadline</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Build the SQL query based on search/filter criteria
            $sql = "SELECT * FROM admissions WHERE 1=1"; // Start with a true condition

            if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                $keyword = $conn->real_escape_string($_GET['keyword']);
                $sql .= " AND (university_name LIKE '%" . $keyword . "%' OR program_name LIKE '%" . $keyword . "%' OR announcement LIKE '%" . $keyword . "%')";
            }

            if (isset($_GET['state']) && !empty($_GET['state'])) {
                $state = $conn->real_escape_string($_GET['state']);
                $sql .= " AND state_id = '" . $state . "'";
            }

            if (isset($_GET['program']) && !empty($_GET['program'])) {
                $program = $conn->real_escape_string($_GET['program']);
                $sql .= " AND program_id = '" . $program . "'";
            }

            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['university_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['program_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['announcement']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['application_deadline']) . "</td>";
                    echo "<td><a href='" . htmlspecialchars($row['application_link']) . "' target='_blank'>Apply</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No admissions found.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

    <?php include 'user_footer.php'; ?>
</body>
</html>