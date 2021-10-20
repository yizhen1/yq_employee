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
        <input type='hidden' value='' id='id'>
        <div class="col-lg-6 col-lg-offset-3 col-md-12 col-sm-12 col-xs-12">
          <div class="input-group">
            <input type="text" id="sign_id" class="form-control" placeholder="请输入员工编号">
            <span class="input-group-btn">
            <button class="btn btn-success" type="button" id="c_sign"><span class="glyphicon glyphicon-search" style="margin-right:10px;"></span>签到</button>
            </span>
          </div>
        <div style="position:absolute; right:0; left:0; margin:0 auto; margin-top:25px;">
                <button type="button" class="btn btn-default" id="backbtn">返回</button>
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
        }
    }else{
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
            }
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
                        var Obj=JSON.parse(response);
                        if(Obj.rc==0){
                            alert(Obj.msg);
                        }else{
                            alert(Obj.msg);
                        }
                       }
                    });
                }
            });
            $("#backbtn").click(function(){
                history.back(-1);
            });
        });
    </script>
  </body>
</html>