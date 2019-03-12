
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Practicles</title>
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Lobster|Pacifico');

    body{
        margin:0;
        padding:0;
        outline:none;
        /* background-color:<?php echo $ja;?> */
        background-color: #000;
    }

    .container{
        margin: 50px auto;
        max-width: 80%;
        padding:20px 50px;
        transition:all .3s ease-in-out;
        overflow:auto;
    }

    body hr{
        border-radius:100%;
        border-color:<?php echo "#".$ja; ?>;  
    } 

    a .practical{
        color:#fff;
        text-decoration:none;
        font-family: 'Pacifico', cursive;
        border-radius:5px;
    }

    @media(max-width: 768px) {
        a{
            width:100% !important;
        }
    }

    a{
        width:45%;
        text-decoration:none;
    }

    a:nth-child(even){
        float:left;
    }

    a:nth-child(odd){
        float:right;
    }


    .practical{
        margin:10px 0;
        padding:16px;
        text-align:center;
    }


}

</style>

</head>
<body >
    <div class="container">

    <?php

    $color = array(
        "F44336",
        "E91E63",
        "9C27B0",
        "673AB7",
        "3F51B5",
        "2196F3",
        "009688",
        "FF5722",
        "795548",
        "607D8B"
    );

    shuffle($color);

    $dir = "/var/www/html/php/";
    $files = array();
    $foname = array();
    $finame = array();
    $path = array();
    

    function print_file($arr)
    {
        $scanned_dir = scandir($arr);
        global $files;
        $new_path = array();
            foreach ($scanned_dir as $key => $value) {
                if ( strchr($value,'.php') || strchr($value,'.html') || strchr($value,'.txt')) {
                    array_push($files,$arr.'/'.$value);
                }
                if (!strchr($value,".")) {
                    $new_path[$key] = $arr."/".$value;
                    print_file($new_path[$key]);
                }
            }
        return($files);
    }
    
    $files = print_file($dir);
    foreach ($files as $key => $value) {
        $file_name = explode('/',$value);
        array_push($finame,$file_name[count($file_name)-1]);
        array_push($foname,$file_name[count($file_name)-2]);
        
        array_shift($file_name);
        array_shift($file_name);
        array_shift($file_name);
        array_shift($file_name);
        array_shift($file_name);
        $file_name = implode('/',$file_name);
        array_push($path,$file_name);
    }

    ?>
    
    <?php
    for ($i=0; $i < count($files); $i++) { 
            $color_var = $color[($i % 10)];
            if(!($foname[$i] == '')){
                echo "<a href=/php".$path[$i]."?color=".$color_var.">"
                ."<div class='practical' style='background-color:#$color_var ; box-shadow:0px 0px 15px #$color_var ;'>".$path[$i]."<hr>".$finame[$i]."</div></a>";
            }
    }
    ?>
    
</body>
</html>