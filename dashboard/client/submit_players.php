<?php

include_once 'db_connect.php';
// Step 1: Connect to the database (Assuming you have a valid database connection)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
    
        


    $full_name=$_POST['full_name'];
    $id=$_POST['id_no'];
    $photoName = $_FILES["photo"]["name"];
    $photoTmpName=$_FILES["photo"]["tmp_name"];
    $photoError = $_FILES["photo"]["error"];
    $photoSize=$_FILES["photo"]["size"];
    $photoType=$_FILES["photo"]["type"];

    //check if id is empty
    if(empty($id)){
        $id_error="Please enter id number";
        header("Location: add team members.html?error=emptyid");
        exit();
       
        
    }

    //check if name is empty
   if(empty($full_name)){
        $full_name_error="Please enter player name";
        header("Location: add team members.html?error=emptyname");
        exit();
      
    }

    if(empty($photoName)){
        $photo_name_error="Please select a file";
        header("Location: add team members.html?error=empty");
        exit();
      
    }
    if (ctype_digit($id)) {
        $valid_id = intval($id);
        if (strlen($user_input) > 8) {
            $id_error="Id number is invalid";
            header("Location: add_team_members.php?error=invalidid");
        exit();
    }
    
    echo "Invalid input. Please enter a number.\n";
}




        $stmt=$conn->prepare("SELECT * from players where id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result=$stmt->get_result();

        //if id number already exists, display an error message
        if($result->num_rows > 0){
           
            header("Location: add_team_members.php?error=idexists");
            exit();
            
        }

    //get the extension of the photo
    $photoExt=explode('.', $photoName);


    //convert to lowercase
    $photoActualExt=strtolower(end($photoExt));
    print_r($photoActualExt);

    //list down the extensions that will be accepted in the upload
    $allowed= array('jpg','jpeg','png');


    //Accept only the photo in the array
    if(in_array($photoActualExt, $allowed)){

        //check if there is an error uploading the photo
        if($photoError===0){

            //check for the photosize
            if( $photoSize<1000000000){

                //create a unique name for the photo in the uploads folder
                $photoNewName=uniqid('img-',true).'.'.$photoActualExt;
                print_r($photoNewName);

                //show photo destination
                $photoDestination="images/".$photoNewName;



                //move photo to a root folder
                move_uploaded_file($photoTmpName, $photoDestination);

                //insert photoname into the database
                
                $sql="INSERT INTO players(id, fullname, photo) VALUES('$id','$full_name','$photoNewName');";
                
                mysqli_query($conn, $sql);
                header("Location: add team members.html?success");

                

    


            }else{
                header("Location: add team members.html?error=idalreadyexists");
            }

        }else{
            header("Location: add team members.html?error=phototoobig");
        }

    }else{
        header("Location: add team members.html?error=onlyphotosallowed");


     

    }

}
else{
    echo "error";
}
