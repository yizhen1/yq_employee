<?php
if(isset($_REQUEST["mode"])){
    $mode=$_REQUEST["mode"];
    if($mode==1){
        $arr=$wpdb->get_results($wpdb->prepare("SELECT *,time(`start_date`) as start_work,time(`end_date`) as end_work, TIMESTAMPDIFF(HOUR,`start_date`,`end_date`) as clock FROM clock_record ORDER BY `start_date` DESC"));
        if(isset($arr)){
            for($i=0;$i<=count($arr);$i++){
                $rv->data[$i]=$arr[$i];
            }
        $msg="成功查询";
        $rc=1;
        }else{
            echo "error";
            $msg="查询失败";
            $rc=0;
        }
    }
    if($mode==2){
        if(isset($_REQUEST["select_name"])&&isset($_REQUEST["select_id"])){
            $select_name=$_REQUEST["select_name"];
            $select_id=$_REQUEST["select_id"];
            $arr=$wpdb->get_results($wpdb->prepare("SELECT *,time(`start_date`) as start_work,time(`end_date`) as end_work, TIMESTAMPDIFF(HOUR,`start_date`,`end_date`) as clock FROM clock_record WHERE `e_name`=%s and `employee_id`=%s",$select_name,$select_id));
            if(isset($arr)){
                for($i=0;$i<=count($arr);$i++){
                    $rv->data[$i]=$arr[$i];
                }
                $msg="成功查询";
                $rc=1;
            }else{
                $msg="查询为空";
                $rc=0;
            } 
        }else{
            $msg="查询错误";
            $rc=0;
        }
    }
}else{
    $msg="信息有误";
    $rc=0;
}

$rv->rc=$rc;
$rv->msg=$msg;
exit(json_encode($rv));
?>