<?php
    include_once('database/database.php');
    echo('UUBUBUBUUBUUBBUUB');

    // Generate filenames for original, small and medium files
    $originalFileName = "images/user/profile/$id.jpg";
    $smallFileName = "images/user/thumbs_small/$id.jpg";

    // Move the uploaded file to its final destination
    move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

    // Crete an image representation of the original image
    $original = imagecreatefromjpeg($originalFileName);

    $width = imagesx($original);     // width of the original image
    $height = imagesy($original);    // height of the original image
    $square = min($width, $height);  // size length of the maximum square

    //Create and save the profile square thumbnail
    $profile = imagecreatetruecolor(300, 300);
    imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 300, 300, $square, $square);
    imagejpeg($small, $smallFileName);

    // Create and save a small square thumbnail
    $small = imagecreatetruecolor(100, 100);
    imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 100, 100, $square, $square);
    imagejpeg($small, $smallFileName);

    // Calculate width and height of medium sized image (max width: 400)
    /*$mediumwidth = $width;
    $mediumheight = $height;
    if ($mediumwidth > 400) {
    $mediumwidth = 400;
    $mediumheight = $mediumheight * ( $mediumwidth / $width );
    }

    // Create and save a medium image
    $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
    imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
    imagejpeg($medium, $mediumFileName);*/

    header("Location: index.php");
?>
