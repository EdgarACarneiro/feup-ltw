<?php

    include_once('includes/init.php');

    $currUser = $_SESSION['username'];

    // Move the uploaded file to its final destination
    //move_uploaded_file($_FILES['image'], $mediumFileName);

    // Create an image representation of the original image
    //$original = imagecreatefromjpeg($_FILES['image']);

    //If an image was uploaded
    if($_FILES['image']['name'])
    {
        //No errors detected
        if((!$_FILES['image']['error']) && ($_FILES['image']['size'] != FALSE))
        {
            // Generate filenames for original, small and medium files
            $profileFileName = "images/user/profile/$currUser.jpg";
            $smallFileName = "images/user/thumbs_small/$currUser.jpg";

            //move it to where we want it to be
            move_uploaded_file($_FILES['image']['tmp_name'], $profileFileName);
            $message = 'Congratulations!  Your file was accepted.';
        }
        //Errors detected   
        else {
            //Send message indicating bad file or some shit
        }
    }

/*
    $width = imagesx($original);     // width of the original image
    $height = imagesy($original);    // height of the original image
    $square = min($width, $height);  // size length of the maximum square

    //Create and save the profile square thumbnail -> TODO METER ISTO COMO FUNCAO GENERICA QUE RECEBE O TAMANHO e o file name
    $profile = imagecreatetruecolor(300, 300);
    imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 300, 300, $square, $square);
    imagejpeg($small, $smallFileName);

    // Create and save a small square thumbnail
    /*$small = imagecreatetruecolor(100, 100);
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

?>
