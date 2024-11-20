<?php
include 'db_connection.php';

if (isset($_POST['department'])) {
    $department = $_POST['department'];

    // Fetch clubs based on the selected department
    $query = "SELECT id, club_name FROM clubs WHERE department = '$department'";
    $result = mysqli_query($connection, $query);

    $clubs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $clubs[] = $row;
    }

    // Return data as JSON
    echo json_encode($clubs);
}
?>
