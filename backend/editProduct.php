<?php
require('../connect.php');

$id = $_GET['id'];
$title = $_POST['title'];
$detail = $_POST['detail'];
$link = $_POST['link'];
$category = $_POST['category'];

// Sanitize user input (example using mysqli_real_escape_string)
$title = mysqli_real_escape_string($connect, $title);
$detail = mysqli_real_escape_string($connect, $detail);
$link = mysqli_real_escape_string($connect, $link);
$category = mysqli_real_escape_string($connect, $category);

$diseases = isset($_POST['diseases']) ? $_POST['diseases'] : array();

// If diseases are checked, implode them into a string
$diseasesString = !empty($diseases) ? implode(', ', $diseases) : '';

//echo "Diseases string before update: " . $diseasesString . "<br>";

// Add debugging statement to check $_POST['diseases']
//echo "POST Diseases array: ";
//print_r($_POST['diseases']);


// Check if a new image is uploaded
if (isset($_FILES["imageUpload"]) && $_FILES["imageUpload"]["error"] === UPLOAD_ERR_OK) {
    // Process the new image
    $image_tmp = $_FILES["imageUpload"]["tmp_name"];
    $image_extension = pathinfo($_FILES["imageUpload"]["name"], PATHINFO_EXTENSION);
    $original_image_name = $_FILES["imageUpload"]["name"];

    // Check if the image with the same name already exists in the "image" folder
    $new_image_name = "image/" . $original_image_name;
    $counter = 1;
    while (file_exists("../" . $new_image_name)) {
        $new_image_name = "image/" . pathinfo($original_image_name, PATHINFO_FILENAME) . "_" . $counter . "." . $image_extension;
        $counter++;
    }

    // Move the uploaded image to the desired location with the unique name
    if (move_uploaded_file($image_tmp, "../" . $new_image_name)) {
        // Update the database with the new information, including the image path
        $sql = "UPDATE products SET title='$title', detail='$detail', link='$link', diseases='$diseasesString', category='$category', image='$new_image_name' WHERE id='$id'";
    } else {
        echo "Error uploading the image.";
        exit();
    }
} else {
    // Update the database with the new information, excluding the image
    $sql = "UPDATE products SET title='$title', detail='$detail', link='$link', diseases='$diseasesString', category='$category' WHERE id='$id'";
}

$result = mysqli_query($connect, $sql);

if ($result) {
    header('location: ../index.php');
} else {
    echo "Error updating data: " . mysqli_error($connect);
}
?>
