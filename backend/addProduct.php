<?php
require('../connect.php');

if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $link = $_POST['link'];
    $diseases = $_POST['diseases']; // This will be an array of selected category IDs
    $category = $_POST['category'];

    // Handle image upload
    $image = $_FILES['imageUpload'];
    $imagefilename = $image['name'];
    $imagefileerror = $image['error'];
    $imagefiletemp = $image['tmp_name'];

    $filename_separate = explode('.', $imagefilename);
    $file_extension = strtolower(end($filename_separate));

    $extension = array('jpeg', 'jpg', 'png');
    if (in_array($file_extension, $extension)) {
        $new_filename = $imagefilename;
        $i = 1;
        while (file_exists('../image/' . $new_filename)) {
            $new_filename = $filename_separate[0] . "_{$i}." . $file_extension;
            $i++;
        }

        $upload_image = 'image/' . $new_filename;
        move_uploaded_file($imagefiletemp, '../image/' . $new_filename);

            // Insert data into the database
            // add_product
            $diseases_string = implode(', ', $diseases); // Convert array to comma-separated string
            $sql = "INSERT INTO products (title, detail, link, diseases, category, image) VALUES ('$title', '$detail', '$link', '$diseases_string', '$category', '$upload_image')";
            $result = mysqli_query($connect, $sql);

            if ($result) {
                header('location: ../index.php');
            } else {
                echo "Data insertion failed";
            }
        } else {
        echo "Invalid image file format";
    }
}
?>
