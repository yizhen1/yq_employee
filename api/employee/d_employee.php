<?php
if(isset($_REQUEST['d_id'])){
    $delete_id=$_REQUEST['d_id'];
}else{
}
$wpdb->delete('employee',array(
    'id'=>$delete_id
));
$select_data=$wpdb->get_var($wpdb->prepare("SELECT employee_id FROM `employee` WHERE `id`=%d",$delete_id));
if($select_data==""){
    $rc=1;
}else{
    $rc=0;
}
$rv->rc=$rc;
exit(json_encode($rv));
?>