<?php
    $full_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url .= "://".$_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);


    $data['base_url']  = $base_url;

    $link = str_replace($base_url, "", "$full_url");

    $url = explode('/', $link);
    $segmento = (isset($url[0])) ? $url[0] : $url[1];


    $slug01 = (isset($url[1])) ? $url[1] : '';
    $slug02 = (isset($url[2])) ? $url[2] : '';
?>
