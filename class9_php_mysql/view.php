<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to the login page
    exit();
}

include 'db_connection.php'; // Include database connection
$query = mysqli_query($connection, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <a href="logout.php">Logout</a> <!-- Add a logout link -->

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Roll</td>
            <td>Mobile</td>
            <td>Image</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['studentName']); ?></td>
                <td><?php echo $row['roll']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td>
                    <?php if (!empty($row['image'])): ?>
                        <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" style="width: 150px; height: 150px;" alt="Student Image">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
