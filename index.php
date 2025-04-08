<!DOCTYPE html>
<html>
<head>
    <title>Admission Portal</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Admission Announcements</h1>

        <div class="filter-section">
            <select id="stateFilter">
                <option value="">All States</option>
                <?php
                include 'db_config.php';
                $states = $conn->query("SELECT * FROM states");
                while ($state = $states->fetch_assoc()) {
                    echo "<option value='" . $state['id'] . "'>" . $state['state_name'] . "</option>";
                }
                ?>
            </select>
            <select id="programFilter">
                <option value="">All Programs</option>
                <?php
                $programs = $conn->query("SELECT * FROM programs");
                while ($program = $programs->fetch_assoc()) {
                    echo "<option value='" . $program['id'] . "'>" . $program['program_name'] . "</option>";
                }
                ?>
            </select>
            <input type="text" id="searchFilter" placeholder="Search Announcements">
        </div>

        <div id="admissionList">
            <?php include 'get_admissions.php'; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>


<script>
    document.getElementById('stateFilter').addEventListener('change', updateAdmissions);
document.getElementById('programFilter').addEventListener('change', updateAdmissions);
document.getElementById('searchFilter').addEventListener('input', updateAdmissions);

function updateAdmissions() {
    const state = document.getElementById('stateFilter').value;
    const program = document.getElementById('programFilter').value;
    const search = document.getElementById('searchFilter').value;

    fetch(`get_admissions.php?state=${state}&program=${program}&search=${search}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('admissionList').innerHTML = data;
        });
}
</script>