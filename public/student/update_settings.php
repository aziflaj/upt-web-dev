<?php
var_dump($_POST);
if(isset($_FILES['curriculum'])){
     $errors= array();
     $file_name = $_FILES['curriculum']['name'];
     $file_size =$_FILES['curriculum']['size'];
     $file_tmp =$_FILES['curriculum']['tmp_name'];
     $file_type=$_FILES['curriculum']['type'];
     $file_ext=strtolower(end(explode('.',$_FILES['curriculum']['name'])));

     $expensions= array("jpeg","jpg","png", "pdf");

     if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
     }

     if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
     }

     if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../uploads/".$file_name);
        echo "Success";
     }else{
        print_r($errors);
     }
  }

?>
