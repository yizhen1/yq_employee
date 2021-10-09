<?php
$arrs=["add_name","add_id","add_sex","add_card","add_birth",
"add_grade","add_hire","add_remarks"];
function read_args($key_array){
    $arr=array();
    foreach($key_array as $key){
        global $$key;
        if(isset($_REQUEST[$key])){
            $$key=$_REQUEST[$key];
        }else{
            $$key="";
        }
        $arr[$key]=$$key;
    }
    return $arr;
}
read_args($arrs);
if($add_name&&$add_id&&$add_sex&&$add_card&&$add_birth&&$add_grade
&&$add_hire&&$add_remarks){
    $a_permit=1;
}else{
    $a_permit=0;
}
if($a_permit==1){
    $exists=$wpdb->get_var($wpdb->prepare("SELECT employee_id FROM employee WHERE `employee_id`=%s",$add_id));
    if(isset($exists)){
        $rc=3;
        $msg="已经存在该员工编号";
    }else{
        $update_data=$wpdb->insert('employee',array(
            'e_name'=>$add_name,
            'employee_id'=>$add_id,
            'sex'=>$add_sex,
            'birthday'=>$add_birth,
            'id_card'=>$add_card,
            'e_grade'=>$add_grade,
            'hire_date'=>$add_hire,
            'remarks'=>$add_remarks
        ));
            $rc=1;
            $rv->rc=$rc;
            $msg="成功添加员工信息";
    }
}else{
    if($a_permit==0){
        $rc=0;
        $msg="添加员工信息不完整";
    }
}
$rv->rc=$rc;
$rv->msg=$msg;
$rv->data=$update_data;
exit(json_encode($rv));  
?>