<?php
if(isset($_REQUEST['d_id'])){
    $delete_id=$_REQUEST['d_id'];
}else{
}
$exist=$wpdb->delete('employee',array(
    'employee_id'=>$delete_id
));
$t1=date("Y-m-d").' '.'00:00:00';
$t2=date("Y-m-d H:i:s",strtotime("-1 second"));
$exist2=$wpdb->get_var($wpdb->prepare("DELETE  FROM  `clock_record` WHERE `start_date` BETWEEN %s and %s  and `employee_id`=%s",$t1,$t2,$delete_id));
// echo $wpdb->last_query;
if($exist==true){
    $rc=0;
    $msg="删除成功";
}else{
    $rc=4;
    $msg="删除失败";
}
$rv->exist=$exist;
$rv->rc=$rc;
$rv->msg=$msg;
exit(json_encode($rv));
?>