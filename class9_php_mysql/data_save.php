<?php
include 'db_connection.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $studentName = $_POST['studentName'];
    $roll = $_POST['roll'];
    $mobile = $_POST['mobile'];

    // Handle the uploaded file
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];
    $imageType = $image['type'];

    // Specify allowed file extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    if (in_array($imageExtension, $allowedExtensions)) {
        if ($imageError === 0) {
            if ($imageSize < 5000000) { // 5MB file size limit
                // Create a unique file name to avoid overwriting
                $newImageName = uniqid('', true) . "." . $imageExtension;
                $uploadDirectory = 'uploads/' . $newImageName;

                // Move the uploaded file to the target directory
                if (move_uploaded_file($imageTmpName, $uploadDirectory)) {
                    // Insert data into the database
                    $sql = "INSERT INTO students (studentName, roll, mobile, image) 
                            VALUES ('$studentName', '$roll', '$mobile', '$newImageName')";

                    if (mysqli_query($connection, $sql)) {
                        echo "Record saved successfully.";
                        header("location:index.php"); // Redirect to index.php
                    } else {
                        echo "Error: " . mysqli_error($connection);
                    }
                } else {
                    echo "Failed to upload the image.";
                }
            } else {
                echo "Image size is too large.";
            }
        } else {
            echo "Error uploading the image.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}

// Close the database connection
mysqli_close($connection);
?>
