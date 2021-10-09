<?php
date_default_timezone_set("PRC");
// $exist=$wpdb->get_results($wpdb->prepare("SELECT * FROM `clock_record` WHERE `start_date` BETWEEN DATE_FORMAT(NOW(),'Y-m-d 00:00:00') AND DATE_ADD(NOW(),INTERVAL -30 MINUTE)"));
// print_r($exist);
if(isset($_REQUEST["clock_id"])){
    $clock_id=$_REQUEST["clock_id"];
    $name=$wpdb->get_var($wpdb->prepare("SELECT e_name FROM `employee` WHERE `employee_id`=%s",$clock_id));
    if(isset($name)){
        $hour=date("H:i:s");
        if($hour>8&&$hour<=12){
            $c_msg="迟到";
        }else{
            if($hour>12&&$hour<18){
                $c_msg="早退";
            }else{
                $c_msg="正常";
            }
        }
        $exist=$wpdb->get_results($wpdb->prepare("SELECT * FROM `clock_record` WHERE `start_date` BETWEEN DATE_FORMAT(NOW(),'Y-m-d 00:00:00') AND DATE_ADD(NOW(),INTERVAL -1 MINUTE) AND `employee_id`=%s",$clock_id));
        if(date("H:i:s")<=12){
            if(empty($exist)){
                $wpdb->insert('clock_record',array(
                    'e_name'=>$name,
                    'employee_id'=>$clock_id,
                    'start_date'=>date("Y-m-d H:i:s"),
                    'situation'=>$c_msg
                ));
            }else{  
            }
            $rc=1;
            $msg="上午打卡成功";
        }else{
            if(empty($exist)){
                $wpdb->insert('clock_record',array(
                    'e_name'=>$name,
                    'employee_id'=>$clock_id,
                    'start_date'=>date("Y-m-d H:i:s"),
                ));
            }else{
                $wpdb->update('clock_record',array(
                    'end_date'=>date("Y-m-d H:i:s"),
                    'situation'=>$c_msg
                ),array(
                    'employee_id'=>$clock_id
                ));
            } 
        }
        $rc=1;
        $msg="下午打卡成功";
    }else{
        $rc=0;
        $msg="该员工不存在";
    }
}else{
    $rc=0;
    $msg="打卡失败";
}
$rv->rc=$rc;
$rv->msg=$msg;
exit(json_encode($rv));
?>