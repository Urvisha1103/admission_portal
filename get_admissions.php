<?php
include 'db_config.php';

$stateFilter = isset($_GET['state']) ? $_GET['state'] : '';
$programFilter = isset($_GET['program']) ? $_GET['program'] : '';
$searchFilter = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT admissions.*, states.state_name, programs.program_name 
        FROM admissions 
        INNER JOIN states ON admissions.state_id = states.id 
        INNER JOIN programs ON admissions.program_id = programs.id 
        WHERE 1";

if ($stateFilter != '') {
    $sql .= " AND state_id = " . $stateFilter;
}
if ($programFilter != '') {
    $sql .= " AND program_id = " . $programFilter;
}
if ($searchFilter != '') {
    $sql .= " AND announcement LIKE '%" . $searchFilter . "%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='admission-item'>";
        echo "<h3>" . $row['announcement'] . "</h3>";
        echo "<p>State: " . $row['state_name'] . "</p>";
        echo "<p>Program: " . $row['program_name'] . "</p>";
        echo "<p>Start Date: " . $row['start_date'] . "</p>";
        echo "<p>End Date: " . $row['end_date'] . "</p>";
        echo "<p><a href='" . $row['link'] . "' target='_blank'>Link</a></p>";
        echo "</div>";
    }
} else {
    echo "<p>No admissions found.</p>";
}
$conn->close();
?>