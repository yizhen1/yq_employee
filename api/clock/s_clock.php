<?php
if(isset($_REQUEST["mode"])){
    $mode=$_REQUEST["mode"];
    if($mode==1){
        $arr=$wpdb->get_results($wpdb->prepare("SELECT *,time(`start_date`) as sign_start,time(`end_date`) as sign_end, TIMESTAMPDIFF(SECOND,`start_date`,`end_date`) as work_time FROM clock_record ORDER BY `start_date` DESC"));
        if(isset($arr)){
            if(empty($arr)){
                $msg="查询结果为空";
                $rc=4;
            }else{
                for($i=0;$i<count($arr);$i++){
                    //判断操作，判断$arr[$i]的值，如果为空，则‘’ 不是则$arr[$i];
                    $rv->data[$i]=$arr[$i] == null ? '':$arr[$i];
                }
                $msg="成功查询";
                $rc=0;
            }
        }else{
            $msg="查询失败";
            $rc=4;
        }
    }
    if($mode==2){
        if(isset($_REQUEST["r_name"])&&isset($_REQUEST["r_id"])){
            $r_name=$_REQUEST["r_name"];
            $r_id=$_REQUEST["r_id"];
            $arr=$wpdb->get_results($wpdb->prepare("SELECT *,time(`start_date`) as sign_start,time(`end_date`) as sign_end, TIMESTAMPDIFF(SECOND,`start_date`,`end_date`) as work_time FROM clock_record WHERE `e_name`=%s and `employee_id`=%s",$r_name,$r_id));
            if(isset($arr)){
                if(empty($arr)){
                    $msg="查询结果为空";
                    $rc=4;
                }else{
                    for($i=0;$i<count($arr);$i++){
                        $rv->data[$i]=$arr[$i]== null ? '' : $arr[$i];
                    }
                    $msg="成功查询";
                    $rc=0;
                }
            }else{
                $msg="查询错误";
                $rc=4;
            } 
        }else{
            $msg="参数传输失败";
            $rc=4;
        }
    }
}else{
    $msg="信息有误";
    $rc=4;
}
$rv->rc=$rc;
$rv->msg=$msg;
exit(json_encode($rv));
?>