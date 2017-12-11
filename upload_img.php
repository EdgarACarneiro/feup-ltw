<?php

    include_once('includes/init.php');
    $currUser = $_SESSION['username'];

    function addThumbnail($original, $newFileName, $newSize, $width, $height, $square) {
        
        $thumbnail = imagecreatetruecolor($newSize, $newSize);
        imagecopyresized($thumbnail, $original, 0, 0,
                        ($width > $square)? ($width - $square)/2 : 0,
                        ($height > $square)? ($height - $square)/2 : 0,
                        $newSize, $newSize, $square, $square);
        imagejpeg($thumbnail, $newFileName);
    }

    function createImageFromType($image) {
        switch ($image['type']) {
            case 'image/jpg':
            case 'image/jpeg':
                return imagecreatefromjpeg($image['tmp_name']);
            case 'image/png':
                return imagecreatefrompng($image['tmp_name']);
            default:
                return FALSE;
        }
    }

    //If an image was uploaded
    if($_FILES['image']['name'])
    {
        //No errors detected
        if((!$_FILES['image']['error']) && ($_FILES['image']['size'] != FALSE))
        {
            // Generate filenames for original, small and medium files
            $profileFileName = "images/user/profile/$currUser.jpg";
            $smallFileName = "images/user/thumbnails/$currUser.jpg";

            // Create an image representation of the original image
            if ( !($original = createImageFromType($_FILES['image'])) ) {
                //Error message here and go on - $message = 'Received wrong file type. Please use jpeg or png'
                return FALSE;
            }
            $width = imagesx($original);     // width of the original image
            $height = imagesy($original);    // height of the original image
            $square = min($width, $height);  // size length of the maximum square

            addThumbnail($original, $profileFileName, 300, $width, $height, $square);
            addThumbnail($original, $smallFileName, 100, $width, $height, $square);

            //$message = 'File succesfully loaded';
        }
        //Errors detected   
        else {
            //Send message indicating bad file or some shit
        }
    }

    header("Location: profile.php"); //-> meter em ajax sem redericeionamento, SOMEHOW
?>
