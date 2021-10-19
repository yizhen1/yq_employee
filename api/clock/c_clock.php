<?php
date_default_timezone_set("PRC");
if(isset($_REQUEST["sign_id"])){
    if(empty($_REQUEST["sign_id"])){
        $rc=4;
        $msg="参数为空";
    }else{
        $sign_id=$_REQUEST["sign_id"];
        $name=$wpdb->get_var($wpdb->prepare("SELECT e_name FROM `employee` WHERE `employee_id` = %s",$sign_id));
        if(isset($name)){//查询该员工存不存在。
            if(empty($name)){
                $rc=4;
                $msg="该员工名称为空";
            }else{
                $hour=date("H:i:s");
                //查询从该天的0点开始到此时时刻的前一秒钟，是否存在该员工的打卡时间，如果有则变为结束打卡，如果没有，则开始打卡
                $pm1=date("Y-m-d").' '.'00:00:00';
                $pm2= date("Y-m-d H:i:s",strtotime( "-1 second" ));
                $exist=$wpdb->get_results($wpdb->prepare("SELECT * FROM `clock_record` WHERE `start_date` BETWEEN %s AND %s  AND `employee_id`= %s",$pm1,$pm2,$sign_id));
                if(isset($exist)){
                    if(empty($exist)){//第一次打卡
                        if(date("H:i:s")<=12&&date("H:i:s")>0){ //上午打卡
                                $result=$wpdb->insert('clock_record',array(
                                    'e_name'=>$name,
                                    'employee_id'=>$sign_id,
                                    'start_date'=>date("Y-m-d H:i:s")
                                ));
                                if($result==true){
                                    $rc=0;
                                    $msg="上班打卡成功";
                                }else{
                                    $rc=4;
                                    $msg="上班打卡失败";
                                }
                        }elseif(date("H:i:s")>12&&date("H:i:s")<=18){ //下午打卡
                                $result=$wpdb->insert('clock_record',array(
                                    'e_name'=>$name,
                                    'employee_id'=>$sign_id,
                                    'start_date'=>date("Y-m-d H:i:s")
                                ));
                                if($result==true){
                                    $rc=0;
                                    $msg="补签上班打卡";
                                }else{
                                    $rc=4;
                                    $msg="补签上班打卡失败";
                                }
                        }else{//大于18点后，则不进行打卡。
                            $rc=4;
                            $msg="无法进行打卡";
                        }
                    }else{ 
                        //第二次打卡
                        //如果有打卡时间，则进行下午打卡，即为下班打卡，查询有没有下午打卡时间
                        //查询有没有进行过下班打卡，如果有则不录入，没则更新。
                        $pm=$wpdb->get_var($wpdb->prepare("SELECT `end_date` FROM `clock_record`  WHERE `start_date` BETWEEN %s and %s and `employee_id` = %s",$pm1,$pm2,$sign_id));
                        if(isset($pm)){
                            if(empty($pm)){
                                $rc=4;
                                $msg="查询结果错误";
                            }else{
                                if($pm=="0000-00-00 00:00:00"){//如果pm的结果为0000,则代表着还没有签到下午打卡
                                    //更新下班打卡时间。从0000变成当前打卡的时间点。
                                    $now=date("Y-m-d H:i:s");
                                    $res2=$wpdb->get_var($wpdb->prepare("UPDATE `clock_record` SET `end_date`=%s WHERE `employee_id`=%s and `start_date` BETWEEN %s and %s",$now,$sign_id,$pm1,$pm2));
                                    $rc=0;
                                    $msg="下班打卡成功";
                                }else{
                                    $rc=4;
                                    $msg="请不要多次下班打卡";
                                }
                            } 
                        }else{
                            $rc=4;
                            $msg="系统查询失败";
                        }

                    }
                }else{
                    $rc=4;
                    $msg="查询失败";
                }
            }    
        }else{
            $rc=4;
            $msg="查询姓名失败";
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