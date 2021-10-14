<?php
$arrs=["e_name","employee_id","sex","id_card","birthday",
"e_grade","hire_date","remarks"];
$array=["u_id","u_shape"];
function read_args($key_array){
    $arr=array();
    foreach($key_array as $key){
        global $$key;
        if(isset($_REQUEST[$key])){
            $$key=$_REQUEST[$key];
        }else{
            $rc=4;
            $msg="参数不存在";
        }
        $arr[$key]=$$key;
    }
    return $arr;
}
$data=read_args($arrs);
read_args($array);
if($u_shape==1){
    $update_data=$wpdb->update('employee',$data,array(
        'id'=>$u_id
    ));
    $rc=0;
    $msg="修改个人信息完成";
}elseif($u_shape==2){
    $exist=$wpdb->get_var($wpdb->prepare("SELECT employee_id FROM employee WHERE `employee_id`=%s",$employee_id));
    if(empty($exist)){
        $update_data=$wpdb->update('employee',$data,array(
            'id'=>$u_id
        ));
        $rc=0;
        $msg="修改为:".$employee_id;
    }else{
        $rc=4;
        $msg="已经存在该员工编号";
    }
}
$rv->exist=$exist;
$rv->rc=$rc;
$rv->msg=$msg;
$rv->data=$data;
exit(json_encode($rv));
?>