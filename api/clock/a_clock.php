<?php
date_default_timezone_set("PRC");
if(isset($_REQUEST["sign_id"])){
    if(empty($_REQUEST["sign_id"])){
        $rc=4;
        $msg="参数为空";
    }else{
        $sign_id=$_REQUEST["sign_id"];
        $name=$wpdb->get_var($wpdb->prepare("SELECT e_name FROM `employee` WHERE `employee_id` = %s",$sign_id));
        if(isset($name)){
            $hour=date("H:i:s");
            if($hour>8&&$hour<=12){
                $a = date("8:00:00");
                $b = date("H:i:s");
                $diff = strtotime($b)-strtotime($a);
                if(($diff/60)>1){
                    $c_msg="迟到".intval($diff/60)."分钟";
                }else{
                    $c_msg='';
                }
            }else{
                if($hour>12&&$hour<18){
                    $a =date("18:00:00");
                    $b=date("H:i:s");
                    $diff=strtotime($a)-strtotime($b);
                    if(($diff/60)>1){
                        $c_msg=" "."早退".intval($diff/60)."分钟";
                    }else{
                        $c_msg='';
                    }
                }
            }
            $pm1=date("Y-m-d").' '.'00:00:00';
            $pm2= date("Y-m-d H:i:s",strtotime( "-1 minute" ));
            $exist=$wpdb->get_results($wpdb->prepare("SELECT * FROM `clock_record` WHERE `start_date` BETWEEN %s AND %s  AND `employee_id`= %s",$pm1,$pm2,$sign_id));
            if(isset($exist)){
                if(empty($exist)){
                    if(date("H:i:s")<=12){ //上午打卡
                        if(empty($exist)){
                            $wpdb->insert('clock_record',array(
                                'e_name'=>$name,
                                'employee_id'=>$sign_id,
                                'start_date'=>date("Y-m-d H:i:s"),
                                'situation'=>$c_msg
                            ));
                        }else{
    
                        }
                        $rc=0;
                        $msg="上午打卡成功";
                    }else{ //下午打卡
                        if(empty($exist)){
                            $wpdb->insert('clock_record',array(
                                'e_name'=>$name,
                                'employee_id'=>$sign_id,
                                'start_date'=>date("Y-m-d H:i:s"),
                                'situation'=>"上午请假"
                            ));
                            $rc=4;
                            $msg="补签上午打卡";
                        }else{//查询有没有下午打卡时间
                                    
                        }      
                    }
                }else{
                    $pm=$wpdb->get_var($wpdb->prepare("SELECT `end_date` FROM `clock_record`  WHERE `start_date` BETWEEN %s and %s and `employee_id` = %s",$pm1,$pm2,$sign_id));
                    // print_r($pm);
                    if(empty($pm)){
                        $rc=4;
                        $msg="查询结果错误";
                    }else{
                        if($pm=="0000-00-00 00:00:00"){//如果pm的结果为0000,则代表着还没有签到下午打卡
                            $res=$wpdb->get_var($wpdb->prepare("UPDATE `clock_record` SET `situation`=CONCAT(`situation`,%s) WHERE `employee_id`=%s",$c_msg,$sign_id));
                            // print_r($res);
                            $wpdb->update('clock_record',array(
                                'end_date'=>date("Y-m-d H:i:s")
                            ),array(
                                'employee_id'=>$sign_id
                            ));
                            $rc=0;
                            $msg="下午打卡成功";      
                        }else{
                            $rc=4;
                            $msg="请不要多次打卡";
                        }
                    } 
                }
                
            }else{
                $rc=4;
                $msg="查询失败";
            }
        }else{
            $rc=0;
            $msg="该员工不存在";
        }
    }
}else{
    $rc=0;
    $msg="打卡失败";
}
$rv->rc=$rc;
$rv->msg=$msg;
exit(json_encode($rv));
?>