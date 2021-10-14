<?php
$arrs=["e_name","employee_id","sex","id_card","birthday",
"e_grade","hire_date","remarks"];
function read_args($key_array){
    $arr=array();
    foreach($key_array as $key){
        global $$key;
        if(isset($_REQUEST[$key])){
            if($_REQUEST[$key]==''){
                $rc=4;
                $msg="参数为空";
            }else{
                $$key=$_REQUEST[$key];
            }
        }else{
            $rc=4;
            $msg="参数不存在";
        }
        $arr[$key]=$$key;
    }
    return $arr;
}
$data=read_args($arrs);
$exists=$wpdb->get_var($wpdb->prepare("SELECT employee_id FROM employee WHERE `employee_id`=%s",$add_id));
if(isset($exists)){
    $rc=4;
    $msg="已经存在该员工编号";
}else{
    if(empty($exists)){
        $update_data=$wpdb->insert('employee',$data);
        $rc=0;  
        $msg="添加员工成功";
    }else{
        $rc=4;
        $msg="添加员工失败";
    }
}
$rv->rc=$rc;
$rv->msg=$msg;
$rv->data=$update_data;
exit(json_encode($rv));  
?>