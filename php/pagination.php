<?php

if (isset($_GET['page']) && isset($_GET['name']) && isset($_GET['count'])) {
    // Get variables
    $name = $_GET['name'];
    $count = $_GET['count'];
    $page = $_GET['page'];

    $file_array = file("../pagination-items/$name.html");
    array_shift($file_array);
    $str = implode("", $file_array);
    for ($i = 0; $i < $count; $i++) {
        $out .= $str;
    }
    echo $out;
}
?>