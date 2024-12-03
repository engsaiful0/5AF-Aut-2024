<?php
include 'db_connection.php';
$query = mysqli_query($connection, "SELECT * FROM students");

?>
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
    <?php
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
    ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['studentName'] ?></td>
            <td><?php echo $row['roll'] ?></td>
            <td><?php echo $row['mobile'] ?></td>
            <td>
                <?php if (!empty($row['image'])): ?>
                    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" style="width: 150px; height: 150px;" alt="Student Image">
                <?php endif; ?>
            </td>
            <td>
                <a href="update.php?id=<?php echo $id ?>">Update</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $id ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>

</table>