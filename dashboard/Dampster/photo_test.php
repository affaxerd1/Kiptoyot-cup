<?php
  // Database configuration
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "photo";

  // Create a database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the database connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if a file was uploaded successfully
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
        $fileName = $_FILES["fileToUpload"]["name"];
        $fileTmpName=$_FILES["fileToUpload"]["tmp_name"];
        $fileError = $_FILES["fileToUpload"]["error"];
        $fileSize=$_FILES["fileToUpload"]["size"];
        $fileType=$_FILES["fileToUpload"]["type"];

//get the extension of the file
        $fileExt=explode('.', $fileName);
        //convert to lowercase
        $fileActualExt=strtolower(end($fileExt));

        //list down the extensions that will be accepted in the upload
        $allowed= array('jpg','jpeg','png');

        //Accept only the file in the array
        if(in_array($fileActualExt, $allowed)){

            //check if there is an error uploading the file
            if($fileError===0){

                //check for the filesize
                if( $fileSize<1000000000){

                    //create a unique name for the file in the uploads folder
                    $fileNewName=uniqid('img-',true).'.'.$fileActualExt;
                    print_r($fileNewName);

                    //show file destination
                    $fileDestination="images/".$fileNewName;



                    //move file to a root folder
                    move_uploaded_file($fileTmpName, $fileDestination);

                    //insert filename into the database
                    
                    $sql= "INSERT INTO photos (name) values ('$fileNewName');";
                    
                    mysqli_query($conn, $sql);
                    header("Location: phototest.html?success");

                    

        


                }else{
                    echo "File is too big";
                    header("Location: phototest.html?filetoobig");
                }

            }else{
                echo "There was an error upoading your file";
                header("Location: phototest.html?erroruploadingyourfile");
            }

        }else{
            echo "Sorry only JPG, JPEG and PNG files allowed";
            header("Location: phototest.html?unacceptablefiles");

        }

    }

}




      
       