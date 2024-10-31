<?php
/*
This is a simple script made by MJDawon to corectly set your website to use the dorrect donain with an nginx reverse porxy. It will also most likly work on other proxies.

Wigtout this script, any php code that gets the site domain will incorrectly get it. It will also most likly ping http even if your site is https, meaning its blocked by cores.

This sceipt also makes it so if anyone visits yoir site directly not through your proxy then it just gets redirected to the proxy.

This script requires that you set your acryal sites ngonz config, so not the proxy to inclide this script to be rna automatically. When added, restart nginx for the website!

Set you varaibles bellow
*/
    
$HTTPS = true; // Set to 'true' or 'false'
$DOMAIN = 'example.com'; // Set to your domain name. Do NOT include https or the port

/*
Stop editing variables here
*/
if($HTTPS == true){
    $_SERVER['HTTPS'] = 'on';
    $startShow = "https";
} else{
    $_SERVER['HTTPS'] = 'off';
    $startShow = "http";
}
$_SERVER['HTTP_HOST'] = $DOMAIN;
$URI = $_SERVER['REQUEST_URI'];

if(!$_SERVER['HTTP_X_FORWARDED_FOR']){
    header("location: $startShow://$DOMAIN$URI");
    exit();
} else{
    $_SERVER['REMOTE_ADDR'] =  $_SERVER['HTTP_X_FORWARDED_FOR'];
}
if($_SERVER['HTTP_HOST'] != $DOMAIN){
    header("location: $startShow://$DOMAIN$URI");
    exit();
}
