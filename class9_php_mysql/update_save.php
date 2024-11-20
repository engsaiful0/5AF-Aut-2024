<?php
include 'db_connection.php';

$id = $_POST['id'];
$studentName = $_POST['studentName'];
$roll = $_POST['roll'];
$mobile = $_POST['mobile'];

// Fetch the current image name from the database
$result = mysqli_query($connection, "SELECT image FROM students WHERE id='$id'");
$currentImage = mysqli_fetch_assoc($result)['image'];

// Handle the uploaded image
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageType = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($imageType, $allowedTypes)) {
        if ($imageSize <= 5000000) { // 5MB limit
            $newImageName = uniqid('', true) . "." . $imageType;
            $uploadPath = 'uploads/' . $newImageName;

            if (move_uploaded_file($imageTmpName, $uploadPath)) {
                // Delete the old image if it exists
                if (!empty($currentImage) && file_exists('uploads/' . $currentImage)) {
                    unlink('uploads/' . $currentImage);
                }
                $currentImage = $newImageName; // Set new image name for saving
            } else {
                echo "Failed to upload new image.";
                exit;
            }
        } else {
            echo "Image size exceeds 5MB.";
            exit;
        }
    } else {
        echo "Invalid file type. Allowed types: JPG, JPEG, PNG, GIF.";
        exit;
    }
}

// Update the database record
$sql = "UPDATE students 
        SET studentName='$studentName', roll='$roll', mobile='$mobile', image='$currentImage' 
        WHERE id='$id'";

if (mysqli_query($connection, $sql)) {
    echo "Record updated successfully.";
    header("location:view.php"); // Redirect to index.php
} else {
    echo "Error updating record: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
