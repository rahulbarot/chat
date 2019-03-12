<?php
ini_set("display_errors", 1);	
/* Getting file name */
$filename = $_FILES['file']['name'];

/* Location */
$location = "images/".$filename;

/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
    echo $location;
}else{
    echo 0;
}
