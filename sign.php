<?php
/*Template Name: sign */
    global $wpdb;
?>
<!doctype html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  </head>
  <body>
    <h1 class='text-center'>考勤签到</h1>
    <div class='text-center'>
        <input type='hidden' value='' id='s_id'>
        <button type='button' class='btn btn-success btn-lg' id='s_btn'>签到</button>
    </div>
    <div class="modal fade" id="sign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="myModalLabel">
                员工打卡
              </h4>
            </div>
            <div class="modal-body">
                <div style="display:flex;">
                    <label>ID：</label>
                    <input id="sign_id" type="text" value="" class="form-control">
                </div>
                <div style="display:flex; justify-content:center; margin-top:20px;">
                    <input type="hidden" id="id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-success" id="c_sign" style="margin-left:12px;">提交</button>
                </div>
            </div>
          </div>
        </div>
    </div>
  <?php

    if(isset($_REQUEST['eid'])){
        if(empty($_REQUEST['eid'])){
        }else{
            $eid=$_REQUEST['eid'];
            $results=preg_filter("/^[A-Za-z]{4}\-[0-9]{4}|[A-Za-z]{3}\-[0-9]{4}/",'true',$eid);
            if($results=='true'){
                $error=0;
            }else{
                $error=5;
            }
            // if($results=='true'){
            //     $exist=$wpdb->get_results($wpdb->prepare("SELECT * FROM employee WHERE `employee_id` like %s",$eid));
            //     if(isset($exist)){
            //         if(empty($exist)){
            //             echo "<h1>查询结果为空</h1>";
            //             exit();
            //         }else{
                        
            //         }
            //     }else{
            //         echo "<h1>该员工不存在</h1>";
            //     }
            //     echo "
            //     <h1 class='text-center'>考勤签到</h1>
            //     <div class='text-center'>
            //         <input type='hidden' value='' id='s_id'>
            //         <button type='button' class='btn btn-success btn-lg' id='s_btn'>签到</button>
            //     </div>";
            // }else{
            //     echo "<h1>传参失败</h1>";
            // }
        }
    }else{
        // echo "<h1>出现错误</h1>";
        $error=4;
    }
?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $("#id").val("<?php echo $error ?>");
            if($("#id").val()==0){
                $("#sign_id").val("<?php echo $eid ?>");
                $("#sign").modal('toggle');
            }
            $("#s_btn").click(function(){
                // $("#s_id").val("<?php echo $eid ?>");
                // if($("#s_id").val()==''){
                //     alert("打卡失败");
                // }else{
                //     $.ajax({
                //        tpye:"POST",
                //        url:'<?php echo get_site_url() ?>/api-data/?module=clock&action=c_clock',
                //        data:{
                //            sign_id:$("#s_id").val()
                //        },
                //        success:function(response){
                //         var responseObj=JSON.parse(response);
                //         if(responseObj.rc==0){
                //             alert(responseObj.msg);
                //         }else{
                //             alert(responseObj.msg);
                //         }
                //        }
                //     });
                // }
                $("#sign").modal('toggle');
            });
            $("#c_sign").click(function(){
                if($("#sign_id").val()==''){
                    alert("打卡失败");
                }else{
                    $.ajax({
                       tpye:"POST",
                       url:'<?php echo get_site_url() ?>/api-data/?module=clock&action=c_clock',
                       data:{
                           sign_id:$("#sign_id").val()
                       },
                       success:function(response){
                        var responseObj=JSON.parse(response);
                        if(responseObj.rc==0){
                            alert(responseObj.msg);
                        }else{
                            alert(responseObj.msg);
                        }
                       }
                    });
                }
            });
        });
    </script>
  </body>
</html>