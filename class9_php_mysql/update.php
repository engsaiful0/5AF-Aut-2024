<?php 

include 'db_connection.php';
$id=$_REQUEST['id'];
//die($id);

$data=mysqli_query($connection,"SELECT * FROM students WHERE id='$id'");
$row=mysqli_fetch_array($data);
//print_r($row);
?>
<form action="update_save.php" method="post">
<input type="hidden" value="<?php echo $row['id']?>" name="id">
    <table>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" value="<?php echo $row['studentName']?>" name="studentName">
            </td>
        </tr>
        <tr>
            <td>Roll</td>
            <td>
                <input type="text" value="<?php echo $row['roll']?>" name="roll">
            </td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>
                <input type="text" value="<?php echo $row['mobile']?>" name="mobile">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit_button" value="Update">
            </td>
        </tr>

    </table>
    </form>