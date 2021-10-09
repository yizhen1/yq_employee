<?php
//Template Name: work-api-data
ini_set('display_errors',1);            //错误信息
header('Access-Control-Allow-Origin: *');
$rc=0;
$res="";
$headers=getallheaders();
if(!isset($_REQUEST['module'])){
    $action=explode("_",$_REQUEST['action']);
    $a=$action[1];
    $c=$action[0];
}else{
    $a=$_REQUEST['action'];
    $c=$_REQUEST['module'];
}
$rv=new stdClass();
// echo $a." ".$c;
if($rc==0){
    $dir =get_template_directory();
    $file_path=$dir.'/api/'.$c.'/'.$a.'.php';
    if(file_exists($file_path)){
        global $wpdb;
        include $file_path;
    }else{
        echo "missing PHP";
    }
}
?>