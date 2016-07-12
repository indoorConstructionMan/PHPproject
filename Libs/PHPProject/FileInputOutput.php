<?php

class PHPProject_FileInputOutput {

    public static function save_file($file) {

        $return_message = new PHPProject_ReturnMessage(array(
            'success' => false,
            'message' => "",
            'data' => array()
        ));

        $target_dir = $GLOBALS['config']['target_dir'];
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image

        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $return_message['message'] = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $return_message['message'] = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($file["size"] > 5000000) {
            $return_message['message'] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "gif") {
            $return_message['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }


        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            $return_message['message'] = "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }

        if ($uploadOk) {
            $return_message['success'] = true;
        } else {
            $return_message['data'] = $file;
        }

        return $return_message;
    }

}
