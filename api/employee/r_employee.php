<?php
//存在两种方案，一个是没有传入参数的时候，用方案1，
//如果有传数，则用方案2
if(isset($_REQUEST['employee_id'])){
    $employee_id=$_REQUEST['employee_id'];
    $result=$wpdb->get_results($wpdb->prepare("SELECT * FROM `employee` WHERE `employee_id`=%s",$employee_id));
    if(empty($result)){
        $msg="查询结果为空";
        $rc=4;
    }else{
        for($i=0;$i<count($result);$i++){
            $rv->data[$i]=$result[$i]; 
        }
        $msg="查询结果为".$result;
        $rc=0;
    }
}else{
    // echo "missing employee_id";
    $arr=$wpdb->get_results($wpdb->prepare("SELECT * FROM `employee`"));
    if(empty($arr)){
        $msg="查询结果失败";
        $rc=4;
    }else{
        for($i=0;$i<count($arr);$i++){
            $rv->data[$i]=$arr[$i];
        }
        $msg="查询结果成功";
        $rc=0;
    }
}
$rv->rc=$rc;
$rv->msg=$msg;
// $rv->content=$result[0];
exit(json_encode($rv));
?>