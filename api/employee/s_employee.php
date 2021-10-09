<?php
if(isset($_REQUEST['employee_id'])){
    $employee_id=$_REQUEST['employee_id'];
    $result=$wpdb->get_results($wpdb->prepare("SELECT * FROM `employee` WHERE `employee_id`=%s",$employee_id));
}else{
    echo "missing employee_id";
}
// $rv->mes=$mes;
// $rv->rc=$rc;
$rv->content=$result[0];
exit(json_encode($rv));
?>