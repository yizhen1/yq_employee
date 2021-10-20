<?php
if(isset($_REQUEST["mode"])){
    $mode=$_REQUEST["mode"];
    if($mode==1){
        $arr=$wpdb->get_results($wpdb->prepare("SELECT *, TIMESTAMPDIFF(SECOND,`start_date`,`end_date`) as work_time FROM clock_record ORDER BY `start_date` DESC"));
        if(isset($arr)){
            if(empty($arr)){
                $msg="查询结果为空";
                $rc=4;
            }else{
                for($i=0;$i<count($arr);$i++){
                    //判断操作，判断$arr[$i]的值，如果为空，则‘’ 不是则$arr[$i];
                    $rv->data[$i]=$arr[$i] == null ? '':$arr[$i];
                    $rv->data[$i]->stime=date($rv->data[$i]->start_date);
                    $date=date_create(date($rv->data[$i]->start_date));
                    $rv->data[$i]->stime2=date_format($date,"Y-m-d 8:00:00");
                    $rv->data[$i]->st=(strtotime($rv->data[$i]->stime)-strtotime($rv->data[$i]->stime2))/60;
                    //下班时间。
                    $rv->data[$i]->etime=date($rv->data[$i]->end_date);
                    if($rv->data[$i]->etime=="0000-00-00 00:00:00"){
                        continue;
                    }
                    $date2=date_create(date($rv->data[$i]->end_date));
                    $rv->data[$i]->etime2=date_format($date,"Y-m-d 18:00:00");
                    $rv->data[$i]->et=(strtotime($rv->data[$i]->etime2)-strtotime($rv->data[$i]->etime))/60;

                }
                $msg="成功查询";
                $rc=0;
            }
        }else{
            $msg="查询失败";
            $rc=4;
        }
    }
    if($rc!=0){
        return false;
    }
    if($mode==2){
        if(isset($_REQUEST["r_name"])&&isset($_REQUEST["r_id"])){
            $r_name=$_REQUEST["r_name"];
            $r_id=$_REQUEST["r_id"];
            $arr=$wpdb->get_results($wpdb->prepare("SELECT *, TIMESTAMPDIFF(SECOND,`start_date`,`end_date`) as work_time FROM clock_record WHERE `e_name`=%s and `employee_id`=%s",$r_name,$r_id));
            //获取那天的8点
            if(isset($arr)){
                if(empty($arr)){
                    $msg="查询结果为空";
                    $rc=4;
                }else{
                    for($i=0;$i<count($arr);$i++){
                        $rv->data[$i]=$arr[$i]== null ? '' : $arr[$i];
                        $rv->data[$i]->stime=date($rv->data[$i]->start_date);
                        $date=date_create(date($rv->data[$i]->start_date));
                        $rv->data[$i]->stime2=date_format($date,"Y-m-d 8:00:00");
                        $rv->data[$i]->st=(strtotime($rv->data[$i]->stime)-strtotime($rv->data[$i]->stime2))/60;
                        //下班时间。
                        $rv->data[$i]->etime=date($rv->data[$i]->end_date);
                        if($rv->data[$i]->etime=="0000-00-00 00:00:00"){
                            continue;
                        }
                        $date2=date_create(date($rv->data[$i]->end_date));
                        $rv->data[$i]->etime2=date_format($date,"Y-m-d 18:00:00");
                        $rv->data[$i]->et=(strtotime($rv->data[$i]->etime2)-strtotime($rv->data[$i]->etime))/60;
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