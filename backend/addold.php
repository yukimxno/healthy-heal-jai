<!-- <?php

    require('../connect.php');

    if (isset($_POST['submit'])){
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $category = $_POST['category'];
        $image = $_FILES['imageUpload'];

        echo $title;
        echo "<br>";
        echo $detail;
        echo "<br>";
        echo $category;
        echo "<br>";
        print_r($image);

        $imagefilename = $image['name'];
        echo "<br>";
        print_r($imagefilename);
        $imagefileerror = $image['error'];
        echo "<br>";
        print_r($imagefileerror);
        $imagefiletemp =$image['tmp_name'];
        echo "<br>";
        print_r($imagefiletemp);

        $filename_separate = explode('.', $imagefilename);
        echo "<br>";
        print_r($filename_separate);
        $file_extension = strtolower(end($filename_separate));
        echo "<br>";
        print_r($file_extension);
        
        $extension=array('jpeg', 'jpg', 'png');
        if (in_array($file_extension, $extension)) {
            $new_filename = $imagefilename;
            $i = 1;
            while (file_exists('../image/' . $new_filename)) {
                $new_filename = $filename_separate[0] . "_{$i}." . $file_extension;
                $i++;
            }

            $upload_image = 'image/' . $new_filename;
            move_uploaded_file($imagefiletemp, '../image/' . $new_filename);
            $sql = "INSERT INTO books (title, detail, category, image) values ('$title', '$detail', '$category', '$upload_image')";
            $result = mysqli_query($connect, $sql);

            if ($result) {
                header('location: ../index.php');
            } else {
                echo "Data inserted failed";
            }
        }  
    }
?>  -->
