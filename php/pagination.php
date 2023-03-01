<?php

if (isset($_GET['page']) && isset($_GET['name']) && isset($_GET['count']) && isset($_GET['type'])) {
    // Get variables
    $name = $_GET['name'];
    $count = $_GET['count'];
    $type = $_GET['type'];
    $page = $_GET['page'];
    $nameDirectory = "../pagination-items/$name";
    $DataFiles = [];
    if ($type == 'multiple') {
        // open dir and get all files
        $dir = opendir($nameDirectory);
        while (($file = readdir($dir)) !== false) {
            if ($file != '.' && $file != '..') {
                $DataFiles[] = $file;
            }
        }
        if($page == 0){
            echo count($DataFiles);
        }
        closedir($dir);
        $file = file($nameDirectory . '/' . $DataFiles[$page]);
        array_shift($file);
        $content = implode("", $file);
        echo $content;
        
    } else if($type == 'single') {
        $file_array = file("../pagination-items/$name.html");
        array_shift($file_array);
        $str = implode("", $file_array);
        for ($i = 0; $i < $count; $i++) {
            $out .= $str;
        }
        echo $out;
    }
}
?>