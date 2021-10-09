<?php
/*Template Name: work */
    global $wpdb;    
?>
<!doctype html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="employee-title">员工查询</h1>
      <div class="row" style="margin:0px; margin-top:25px;">
        <div class="col-lg-6 col-lg-offset-3 col-md-12 col-sm-12 col-xs-12">
          <div class="input-group">
            <input type="text" id="select-input" class="form-control" placeholder="请输入员工编号">
            <span class="input-group-btn">
            <button class="btn btn-info" type="button" id="s_employee"><span class="glyphicon glyphicon-search" style="margin-right:10px;"></span>查询</button>
            </span>
          </div><!-- /input-group -->
        </div>
      </div>
      <div  class="row" style="margin:0px; margin-top:25px; visibility:hidden;" id="msg">
        <div class="col-lg-1 col-md-3 col-sm-6 col-xs-12 e-msg"><div id="employee_name_i"><span class="glyphicon glyphicon-user" style="margin-right:4px;"></span>姓名:</div></div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 e-msg"><div id="employee_id_i"><span class="glyphicon glyphicon-font" style="margin-right:4px;"></span>员工编号:</div></div>
        <div class="col-lg-1 col-md-3 col-sm-6 col-xs-12 e-msg"><div id="employee_sex_i"><span class="glyphicon glyphicon-refresh" style="margin-right:4px;"></span>性别:</div></div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 e-msg"><div id="employee_card_i"><span class="glyphicon glyphicon-credit-card" style="margin-right:4px;"></span>身份证:</div></div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 e-msg"><div id="employee_birth_i"><span class="glyphicon glyphicon-calendar" style="margin-right:4px;"></span>出生日期:</div></div>
        <div class="col-lg-1 col-md-3 col-sm-6 col-xs-12 e-msg"><div id="employee_grade_i"><span class="glyphicon glyphicon-king" style="margin-right:4px;"></span>等级:</div></div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 e-msg"><div id="employee_hire_i"><span class="glyphicon glyphicon-calendar" style="margin-right:4px;"></span>入职时间:</div></div>
        <div class="col-lg-1 col-md-3 col-sm-6 col-xs-12 e-msg"><div id="employee_remark_i"><span class="glyphicon glyphicon-info-sign" style="margin-right:4px;"></span>备注:</div></div>
      </div>
      <div id="forms" class="forms  col-lg-3 col-md-4 col-sm-4 col-xs-7">
        <form id="u_form">
          <input type="hidden" name="e_id" id="e_id" value="">
          <input type="hidden" name="u_shape" id="u_shape" value="">
          <div style="border-bottom:2px solid" id="forms-title"><h2>修改员工信息</h2></div>
          <div class="form-group  e-msg">
            <label>姓名:</label>
            <input type="text" class="form-control" id="update_name" name="update_name" placeholder="姓名" autofocus="autofocus">
          </div>
          <div class="form-group  e-msg">
            <label>员工编号:</label>
            <input type="text" class="form-control" id="update_id" name="update_id" placeholder="员工编号">
          </div>
          <div class="form-group  e-msg ">
            <label style="margin-right:15px;">性别:</label>
              <div style="display:flex;margin:0 auto; flex:1;">
                <div class="radio" style="float:left; flex:1;">
                  <label>
                    <input type="radio" id="update_sex1" name="update_sex" value="1">男
                  </label>
                </div>
                <div></div>
                <div class="radio"  style="float:right;flex:1;">
                  <label>
                    <input type="radio" id="update_sex2" name="update_sex" value="2">女
                  </label>
                </div>
              </div>
          </div>
          <div class="form-group  e-msg">
            <label>身份证:</label>
            <input type="text" class="form-control" id="update_card" name="update_card" placeholder="身份证">
          </div>  
          <div class="form-group  e-msg">
            <label>出生日期:</label>
            <input type="date" class="form-control" id="update_birth" name="update_birth" placeholder="出生日期">
          </div>
          <div class="form-group  e-msg"> 
            <label>等级:</label>
            <input type="number" class="form-control" id="update_grade" name="update_grade" placeholder="等级">
          </div>
          <div class="form-group  e-msg">
            <label>入职时间:</label>
            <input type="date" class="form-control" id="update_hire" name="update_hire" placeholder="入职时间">
          </div>
          <div class="form-group  e-msg">
            <label>备注:</label>
            <input type="text" class="form-control" id="update_remarks" name="update_remarks" placeholder="备注">
          </div>
        </form>
          <div>
          <button type="button" class="btn btn-default active btn-cancel" id="u-btn-cancel">cancel</button>
          <button type="button" class="btn btn-success btn-submit" id="u-btn-submit">submit</button>
          </div>
        </div>

        <div id="forms2" class="forms  col-lg-3 col-md-4 col-sm-4 col-xs-7">
        <form id="a_form">
          <input type="hidden" name="e_id" id="e_id" value="">
          <div style="border-bottom:2px solid" id="forms-title"><h2>添加员工信息</h2></div>
          <div class="form-group  e-msg">
            <label>姓名:</label>
            <input type="text" class="form-control" id="add_name" name="add_name" placeholder="姓名" autofocus="autofocus">
          </div>
          <div class="form-group  e-msg">
            <label>员工编号:</label>
            <input type="text" class="form-control" id="add_id" name="add_id" placeholder="员工编号">
          </div>
          <div class="form-group  e-msg ">
            <label style="margin-right:15px;">性别:</label>
              <div style="display:flex;margin:0 auto; flex:1;">
                <div class="radio" style="float:left; flex:1;">
                  <label>
                    <input type="radio" id="add_sex1" name="add_sex" value="1">男
                  </label>
                </div>
                <div></div>
                <div class="radio"  style="float:right;flex:1;">
                  <label>
                    <input type="radio" id="add_sex2" name="add_sex" value="2">女
                  </label>
                </div>
              </div>
          </div>
          <div class="form-group  e-msg">
            <label>身份证:</label>
            <input type="text" class="form-control" id="add_card" name="add_card" placeholder="身份证">
          </div>  
          <div class="form-group  e-msg">
            <label>出生日期:</label>
            <input type="date" class="form-control" id="add_birth" name="add_birth" placeholder="出生日期">
          </div>
          <div class="form-group  e-msg"> 
            <label>等级:</label>
            <input type="number" class="form-control" id="add_grade" name="add_grade" placeholder="等级">
          </div>
          <div class="form-group  e-msg">
            <label>入职时间:</label>
            <input type="date" class="form-control" id="add_hire" name="add_hire" placeholder="入职时间">
          </div>
          <div class="form-group  e-msg">
            <label>备注:</label>
            <input type="text" class="form-control" id="add_remarks" name="add_remarks" placeholder="备注">
          </div>
        </form>
          <div>
          <button type="button" class="btn btn-default active btn-cancel" id="a-btn-cancel">cancel</button>
          <button type="button" class="btn btn-success btn-submit" id="a-btn-submit">submit</button>
          </div>
        </div>
        <div style="display:flex; justify-content:center; margin-top:25px;">
          <button type="button" class="btn btn-info" id="a_employee" style="margin-right:20px;"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>添加</button>
          <button type="button" class="btn btn-success" id="u_employee"><span class="glyphicon glyphicon-ok" style="margin-right:10px;"></span>修改</button>
          <button type="button" class="btn btn-danger" id="d_employee" style="margin-left:20px;"><span class="glyphicon glyphicon-remove" style="margin-right:10px;"></span>删除</button>
          <button type="button" class="btn btn-success" id="clock" style="margin-left:20px;"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>打卡</button>
        </div>
        <div id="d_form" title="删除员工信息">
        <h3>是否删除该条员工信息?</h3>
        <div>
          <button type="button" class="btn btn-default active btn-cancel" id="btn-d-cancel">cancel</button>
          <button type="button" class="btn btn-success btn-submit" id="btn-d-submit">submit</button>
          </div>
        </div>
        <div id="s_clock" class="col-lg-5 col-md-3 col-sm-6 col-xs-12 col-xs-offset s_clock" style="padding:7px;margin-left;">
          <div class="table-responsive ">
            <h2>考勤情况</h2>
            <div id="select_table_clock">
            <form class="form-inline" id="clock_form">
              <div class="form-group">
                <label for="select_employee_name">Name</label>
                <input type="text" class="form-control" id="select_employee_name" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="select_employee_id">ID</label>
                <input type="text" class="form-control" id="select_employee_id" placeholder="employee_id">
              </div>
              <button type="button" class="btn btn-default" id="select_clock">查询</button>
            </from>
          </div>
          <div class="table-style">
            <table class="table table-hover">
              <thead>
              <tr>
              <td>姓名</td>
                <td>员工编号</td>
                <td>上班时间</td>
                <td>下班时间</td>
                <td>工作时间</td>
                <td>考勤情况</td>
              </tr>
              </thead>
              <tbody id="table_clock"></tbody>
            </table>
            </div>
          </div>
          <div style="margin-top:15px;">
          <button type="button" class="btn btn-default"style="float:left;" id="situation-cancel">cancel</button>
          <button type="button" class="btn btn-success" style="float:right;" id="situation-success">前去打卡</button>
          </div>
        </div>
        <div class="col-lg-3 col-lg-offset-4 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2" 
        style="background:#ffffff; border:1px solid rgba(0,0,0,.2); 
        padding:5px; position:absolute; left:0; right:0; margin:0 auto; top:30px; z-index:999;
        display:none;" id="clock-box">
        <h3>员工打卡</h3>
        <form class="form-inline">
          <div class="form-group">
            <label for="clock-id">ID</label>
            <input type="text" class="form-control" id="clock-id" placeholder="请输入员工编号">
          </div>
          <button type="button" class="btn btn-success" style="float:right;" id="clock-success">打卡</button>
          <button type="button" class="btn btn-default" style="float:left;" id="clock-cancel">cancel</button>
        </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
      <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script>
    $(function(){
      $("#s_employee").click(function(){
        console.log($("#select-input").val());
        if(!$("#select-input").val()){
          alert('请输入员工编号');
        }else{
          $.ajax({
            type:'POST',
            url:'<?php echo get_site_url()?>/api-data/?',
            data:{
              module:"employee",
              action:"s_employee",
              employee_id:$("#select-input").val()
            },
            success:function(response){
              // console.log(response);
              var responseObj=JSON.parse(response);
              if(jQuery.isEmptyObject(responseObj.content)){
                $("#msg").css("visibility","hidden");
                alert("沒有搜索结果");
              }else{
                if($("#select-input").val()==$("#index").text()){

                }else{
                  // $("#msg").slideDown("slow");
                  if($("#index").text()!=""){
                    $(".e-msg p").remove(); 
                  }
                  $("#msg").css("visibility","initial");
                  $("#e_id").val(responseObj.content.id);
                  $("#employee_name_i").after('<p>'+responseObj.content.e_name+'</p>');
                  $("#employee_id_i").after('<p id="index">'+responseObj.content.employee_id+'</p>');
                  if(responseObj.content.sex==1){
                    $("#employee_sex_i").after('<p>'+"男"+'</p>');
                  }else{
                    $("#employee_sex_i").after('<p>'+"女"+'</p>');
                  }
                  $("#employee_card_i").after('<p>'+responseObj.content.id_card+'</p>');
                  $("#employee_birth_i").after('<p>'+responseObj.content.birthday+'</p>');
                  $("#employee_grade_i").after('<p>'+responseObj.content.e_grade+'</p');
                  $("#employee_hire_i").after('<p>'+responseObj.content.hire_date+'</p>');
                  $("#employee_remark_i").after('<p>'+responseObj.content.remarks+'</p>');
                }
              }
            }
          })
        }
      });
      $("#forms").dialog({
        modal:true,
        autoOpen: false
      });
      $("#d_form").dialog({
        modal:true,
        autoOpen:false
      });
      $("#forms2").dialog({
        modal:true,
        autoOpen:false
      });
      $("#d_form").dialog({
        modal:true,
        autoOpen:false
      });
      $("#u_employee").click(function(){
        if($("#index").text()){
          $.ajax({
            type:"POST",
            url:'<?php echo get_site_url()?>/api-data/?',
            data:{
              module:"employee",
              action:"s_employee",
              employee_id:$("#select-input").val()
            },
            success:function(response){
              $("#forms").dialog("open");
              var responseObj=JSON.parse(response);
              $("#update_name").val(responseObj.content.e_name);
              $("#update_birth").val(responseObj.content.birthday);
              $("#update_grade").val(responseObj.content.e_grade);
              $("#update_hire").val(responseObj.content.hire_date);
              $("#update_remarks").val(responseObj.content.remarks);
              $("#update_card").val(responseObj.content.id_card);
              $("#update_id").val(responseObj.content.employee_id);
              if($("#update_sex1").val()==responseObj.content.sex){
                  $("#update_sex1").prop("checked",true);
              }else{
                  $("#update_sex2").prop("checked",true);
              }
            }
          })
        }else{
          alert('员工信息不能为空');
        }
      });
      $("#u-btn-submit").click(function(){
        if($("#update_name").val()&&$("#update_birth").val()&&$("#update_grade").val()&&$("#update_hire").val()&&
          $("#update_remarks").val()&&$("#update_card").val()&&$("#update_id").val()&&$("input:radio:checked").val()){
            if($("#index").text()==$("#update_id").val()){
              $("#u_shape").val("1");
            }else{
              $("#u_shape").val("2");
            }
            $.ajax({
              type:"POST",
              url:'<?php echo get_site_url()?>/api-data/?module=employee&action=u_employee',
              data:$("#u_form").serialize(),
              success:function(response){
                var responseObj=JSON.parse(response);
                console.log(responseObj);
                if(responseObj.rc==1||responseObj.rc==2){
                  alert("修改成功");
                  $("#forms").dialog("close");
                  location.reload();
                }else{
                  alert("修改失败");
                }
              }
            })
        }else{
            alert("请输入完整信息");
          }
      });
      $("#u-btn-cancel").click(function(){
          $("#forms").dialog("close");
        });
      $("#a_employee").click(function(){
        $("#forms2").dialog("open"); 
      });
      $("#a-btn-submit").click(function(){
        if($("#add_name").val()&&$("#add_birth").val()&&$("#add_grade").val()&&$("#add_hire").val()&&
          $("#add_remarks").val()&&$("#add_card").val()&&$("#add_id").val()&&$("input:radio:checked").val()){
          $.ajax({
            type:"POST",
            url:'<?php echo get_site_url()?>/api-data/?module=employee&action=a_employee',
            data:$("#a_form").serialize(),
            success:function(response){
              var responseObj=JSON.parse(response);
              console.log(responseObj);
              if(responseObj.rc==1){
                  alert("添加成功");
                  $("#forms2").dialog("close");
                  location.reload();
              }else{
                alert("添加失败");
              }
            }
          }) 
        }
      });
      $("#a-btn-cancel").click(function(){
        $("#forms2").dialog("close");
      });
      $("#d_employee").click(function(){
        if($("#index").text()){
          $("#d_form").dialog("open");
        }else{
          alert("员工编号为空");
        }
      });
      $("#btn-d-submit").click(function(){
        $.ajax({
          type:"POST",
          url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=d_employee',
          data:{
            d_id:$("#e_id").val()
          },
          success:function(response){
            var responseObj=JSON.parse(response);
            if(responseObj.rc==1){
              alert("删除成功");
              $("#d_form").dialog("close");
              location.reload();
            }else{
              alert("删除失败");
            }
          }
        });
      });
      $("#btn-d-cancel").click(function(){
        $("#d_form").dialog("close");
      });
      $("#clock").click(function(){
        if($("#table_clock").text()==""){
          $.ajax({
          type:"POST",
          url:'<?php echo get_site_url() ?>/api-data/?module=clock&action=s_clock&mode=1',
          success:function(response){
            var responseObj=JSON.parse(response);
            console.log(responseObj);
            if(responseObj.rc==1){
              console.log("查询成功");
              for(var i=0; i<responseObj.data.length;i++){
                $("#table_clock").append(
                  "<tr>"+"<td>"+
                  responseObj.data[i].e_name+
                  "</td><td>"+
                  responseObj.data[i].employee_id+
                  "</td><td>"+
                  responseObj.data[i].start_date+
                  "</td><td>"+
                  responseObj.data[i].end_date+
                  "</td><td>"+
                  responseObj.data[i].clock+
                  "</td><td>"+
                  responseObj.data[i].situation+
                  "</td></tr>")
              }
            }
          }
        })
        }else{
        }
        $("#s_clock").css("display","block");
      });
      $("#situation-cancel").click(function(){
        $("#s_clock").css("display","none");
      });
      $("#situation-success").click(function(){
        $("#clock-box").css("display","block");
        $("#s_clock").css("display","none");
      });
      $("#select_clock").click(function(){
        if($("#select_employee_name").val()!=""&&$("#select_employee_id").val()!=""){
          $.ajax({
          type:"POST",
          url:'<?php echo get_site_url() ?>/api-data/?module=clock&action=s_clock&mode=2',
          data:{
            select_name:$("#select_employee_name").val(),
            select_id:$("#select_employee_id").val()
          },
          success:function(response){
            var responseObj=JSON.parse(response);
            console.log(responseObj);
            if(responseObj.rc==1){
              console.log("查询成功");
              $("#table_clock").empty();
              for(var i=0; i<responseObj.data.length;i++){
                $("#table_clock").append(
                  "<tr>"+"<td>"+
                  responseObj.data[i].e_name+
                  "</td><td>"+
                  responseObj.data[i].employee_id+
                  "</td><td>"+
                  responseObj.data[i].start_date+
                  "</td><td>"+
                  responseObj.data[i].end_date+
                  "</td><td>"+
                  responseObj.data[i].clock+
                  "</td><td>"+
                  responseObj.data[i].situation+
                  "</td></tr>")
              }
            }else{
              console.log("查询失败");
            }
          }
          });
        }else{
          alert("请输入完整信息");
        }
      });
      $("#clock-cancel").click(function(){
        $("#clock-box").css("display","none");
      });
      $("#clock-success").click(function(){
        if($("#clock-id").val()){
          $.ajax({
            type:"POST",
            url:"<?php echo get_site_url() ?>/api-data/?module=clock&action=a_clock",
            data:{
              clock_id:$("#clock-id").val()
            },
            success:function(response){
              console.log(response);
              var responseObj=JSON.parse(response);
              console.log(responseObj);
              if(responseObj.rc==1){
                alert("打卡成功");
                location.reload();
              }else{
                alert("打卡失败");
                location.reload();
              }
            }
          })
        }else{
          alert("请输入打卡员工编号");
        }
      });
    });
    document.onkeydown=function(e){
      var theEvent=window.event||e;
      var code=theEvent.keyCode||theEvent.which;
      if(code==13){
        $("#s_employee").click();
      }
    }
  </script>
  </body>
  <style>
    .employee-title{
        display:flex;
        justify-content:center;
    }
    .title-row{
      margin-left:0px;
      margin-right:0px;
      display:flex;
      justify-content:center;
      margin-top:45px;
    }
    .e-msg{
      display:flex;
=     word-break:break-all;
      white-space:normal;
      margin-top:10px;
    }
    .forms{
      margin:0 auto;
      position:absolute;
      left:0;
      right:0;
      background:white;
      border:1px solid rgba(0,0,0,0.2);
      border-radius:15px;
=     z-index:999;
      display:none;
    }
    .e-msg label{
      word-break:keep-all;
      align-self:center;
    }
    .btn-cancel{
      float:left;
    }
    .btn-submit{
      float:right;
      margin-bottom:10px;
    }
    .ui-dialog-titlebar{
      display:none;
    }
    .ui-dialog{
      border-radius:15px;
      border:1px solid rgba(0,0,0,.2);
      background:white;
    }
    .s_clock{
      position:absolute;
      left:0;
      right:0;
      margin:0 auto;
      z-index:999;
      display:none;
      background:#ffffff;
      border:1px solid rgba(0,0,0,.2);
      top:30px;
    }
    .table-style{
      height:300px;
      overflow-y: scroll;
    }
</style>
</html>
<?php
?>
