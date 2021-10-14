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
      <h1 class="text-center">员工查询</h1>
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
      <div class="table-style" id="e_table">
        <table class="table table-hover ">
        <thead>
              <tr>
                <td>姓名</td>
                <td>员工编号</td>
                <td>性别</td>
                <td>身份证</td>
                <td>出生日期</td>
                <td>等级</td>
                <td>入职时间</td>
                <td>备注</td>
                <td>操作</td>
              </tr>
        </thead>
        <tbody id="table_select"></tbody>
        </table>
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
      <div class="modal fade" id="u_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="myModalLabel">
               修改员工信息
              </h4>
            </div>
            <div class="modal-body" style="padding:0px;">
              <form id="u_form">
                <input type="hidden" id="u_same" value="">
                <input type="hidden" name="u_id" id="u_id" value="">
                <input type="hidden" name="u_shape" id="u_shape" value="">
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <label>姓名:</label>
                <input type="text" class="form-control" id="update_name" name="e_name" placeholder="姓名" autofocus="autofocus"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <label>员工编号:</label>
                <input type="text" class="form-control" id="update_id" name="employee_id" placeholder="员工编号"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
                <label style="margin-right:15px;">性别:</label>
                <div style="display:flex;margin:0 auto; flex:1;">
                  <div class="radio" style="float:left; flex:1;">
                    <label>
                      <input type="radio" id="update_sex1" name="sex" value="1">男
                    </label>
                  </div>
                <div></div>
                <div class="radio"  style="float:right;flex:1;">
                  <label>
                    <input type="radio" id="update_sex2" name="sex" value="2">女
                  </label>
                </div>
                </div>
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>身份证:</label>
                  <input type="text" class="form-control" id="update_card" name="id_card" placeholder="身份证"  required="required">
                </div>  
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>出生日期:</label>
                  <input type="date" class="form-control" id="update_birth" name="birthday" placeholder="出生日期"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12"> 
                  <label>等级:</label>
                  <input type="number" class="form-control" id="update_grade" name="e_grade" placeholder="等级"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>入职时间:</label>
                  <input type="date" class="form-control" id="update_hire" name="hire_date" placeholder="入职时间"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>备注:</label>
                  <input type="text" class="form-control" id="update_remarks" name="remarks" placeholder="备注"  required="required">
                </div>
                <div style="float:right; margin-top:20px; margin-right:30px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-success" id="u_submit">提交</button>
                </div>
              </form>
            </div>
            <div class="modal-footer" style="border:0;">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="d_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="myModalLabel">
                删除员工信息
              </h4>
            </div>
            <div class="modal-body">
              <input type="hidden" id="d_value" value="">
              <div id="d_employee_id"></div> 是否删除该名员工信息？
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭
              </button>
              <button type="button" class="btn btn-danger" id="d_submit">
                删除
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="c_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="myModalLabel">
               新增员工
              </h4>
            </div>
            <div class="modal-body" style="padding:0px;">
              <form id="c_form">
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <label>姓名:</label>
                <input type="text" class="form-control" id="add_name" name="e_name" placeholder="姓名" autofocus="autofocus"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <label>员工编号:</label>
                <input type="text" class="form-control" id="add_id" name="employee_id" placeholder="员工编号"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
                <label style="margin-right:15px;">性别:</label>
                <div style="display:flex;margin:0 auto; flex:1;">
                  <div class="radio" style="float:left; flex:1;">
                    <label>
                      <input type="radio" id="add_sex1" name="sex" value="1"  required="required">男
                    </label>
                  </div>
                <div></div>
                <div class="radio"  style="float:right;flex:1;">
                  <label>
                    <input type="radio" id="add_sex2" name="sex" value="2"  required="required">女
                  </label>
                </div>
                </div>
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>身份证:</label>
                  <input type="text" class="form-control" id="add_card" name="id_card" placeholder="身份证"  required="required">
                </div>  
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>出生日期:</label>
                  <input type="date" class="form-control" id="add_birth" name="birthday" placeholder="出生日期"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12"> 
                  <label>等级:</label>
                  <input type="number" class="form-control" id="add_grade" name="e_grade" placeholder="等级"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>入职时间:</label>
                  <input type="date" class="form-control" id="add_hire" name="hire_date" placeholder="入职时间"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>备注:</label>
                  <input type="text" class="form-control" id="add_remarks" name="remarks" placeholder="备注"  required="required">
                </div>
                <div style="float:right; margin-top:20px; margin-right:30px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-success" id="c_submit">提交</button>
                </div>
              </form>
            </div>
            <div class="modal-footer" style="border:0;">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="s_action" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="myModalLabel">
                选择功能
              </h4>
            </div>
            <div class="modal-body">
              <div style="display:flex; justify-content:center;">
              <input type="hidden" id="goals" value="">
              <button type="button" class="btn btn-info" id="u_action">修改</button>
              <button type="button" class="btn btn-danger" style="margin-left:50px;" id="d_action">删除</button>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div style="display:flex; justify-content:center; margin-top:25px;">
          <button type="button" class="btn btn-info" id="c_employee" style="margin-right:20px;"><span class="glyphicon glyphicon-plus" style="margin-right:10px;"></span>添加</button>
          <button type="button" class="btn btn-success" id="sign" style="margin-left:20px;"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>打卡</button>
          <button type="button" class="btn btn-default" id="r_show" style="margin-left:20px;">显示</button>
        </div>
      <div class="modal fade" id="clock_sign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="myModalLabel">
                考勤情况
              </h4>
            </div>
            <div class="modal-body">
            <div id="">
              <form class="form-inline" id="">
                <input type="hidden" id="sign_mode" value="">
                <div class="form-group">
                  <label for="sign_name">Name</label>
                  <input type="text" class="form-control" id="sign_name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="sign_id">ID</label>
                  <input type="text" class="form-control" id="sign_id" placeholder="employee_id">
                </div>
                <button type="button" class="btn btn-default" id="s_sign">查询</button>
              </from>
            </div>
            <div class="table-responsive">
              <div class="table-style" id="sign_table">
                <table class="table table-hover ">
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
                  <tbody id="sign_tbody"></tbody>
                </table>
              </div>
            </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭
              </button>
              <button type="button" class="btn btn-primary">
                提交更改
              </button>
            </div> -->
          </div>
        </div>
    </div>
        <div id="s_clock" class="col-lg-5 col-md-3 col-sm-6 col-xs-12 col-xs-offset s_clock" style="padding:7px;margin-left:0;">
          <div class="table-responsive ">
            <!-- <h2>考勤情况</h2> -->
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
  function ctime(value){
    if(value>0){
      var s=parseInt(value);
      var m=0;
      var h=0;
      if(s>60){
        m=parseInt(s/60);
        s=parseInt(s%60);
        if(m>60){
          h=parseInt(m/60);
          m=parseInt(m%60);
        } 
      }
      var result=""+parseInt(s)+"秒";
      if(m>0){
        result=""+parseInt(m)+"分"+result;
      }
      if(h>0){
        result=""+parseInt(h)+"小时"+result;
      }
      return result;
    }else{
      return "-";
    }
  }
    $(function(){
      // document.ready()
      $.ajax({
        type:"POST",
        url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=s_employee',
        success:function(response){
          var responseObj=JSON.parse(response);
          if(responseObj.rc==0){
            for(var i=0; i<responseObj.data.length;i++){
              if(responseObj.data[i].sex==1){
                var e_sex="男";
              }else{
                e_sex="女";
              }
              $("#table_select").append(
                "<tr>"+"<td>"+
                responseObj.data[i].e_name+
                "</td><td>"+
                responseObj.data[i].employee_id+
                "</td><td>"+      
                e_sex+
                "</td><td>"+
                responseObj.data[i].id_card+
                "</td><td>"+
                responseObj.data[i].birthday+
                "</td><td>"+
                responseObj.data[i].e_grade+
                "</td><td>"+
                responseObj.data[i].hire_date+
                "</td><td>"+
                responseObj.data[i].remarks+
                "</td><td>"+
                "<button type='button' id='u_employees' name="+responseObj.data[i].employee_id+">修改</button>"+
                "<button type='button' id='d_employees' name="+responseObj.data[i].employee_id+">删除</button>"+
                "</td></tr>")
              }
              $("#table_select #u_employees").bind("click",function(){
                var id=$(this).attr("name");
                if(id!=""){
                  console.log(id);
                  $.ajax({
                    type:"POST",
                    url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=s_employee',
                    data:{
                      employee_id:id
                    },
                    success:function(response){
                      var responseObj=JSON.parse(response);
                      console.log(responseObj);
                      if(responseObj.rc==0){
                        $("#u_modal").modal('toggle');
                        $("#u_id").val(responseObj.data[0].id);
                        $("#update_name").val(responseObj.data[0].e_name);
                        $("#update_birth").val(responseObj.data[0].birthday);
                        $("#update_grade").val(responseObj.data[0].e_grade);
                        $("#update_hire").val(responseObj.data[0].hire_date);
                        $("#update_remarks").val(responseObj.data[0].remarks);
                        $("#update_card").val(responseObj.data[0].id_card);
                        $("#update_id").val(responseObj.data[0].employee_id);
                        $("#u_same").val(responseObj.data[0].employee_id);
                        if($("#update_sex1").val()==responseObj.data[0].sex){
                            $("#update_sex1").prop("checked",true);
                        }else{
                            $("#update_sex2").prop("checked",true);
                        }
                      }
                    }
                  })
                }
              });
              $("#table_select #d_employees").bind("click",function(){
                var id=$(this).attr("name");
                $("#d_modal").modal('toggle');
                $("#d_employee_id").text(id);
                $("#d_value").val(id);
              });
                //ajax异步请求.
          }
        }
      });
      $("#u_form").submit(function(e){
        // e.preventDefault();
        if($("#u_same").val()==$("#update_id").val()){
          $("#u_shape").val("1");
        }else{
          $("#u_shape").val("2");
        }
        $.ajax({
          type:"POST",
          url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=u_employee',
          data:$("#u_form").serialize(),
          success:function(response){
            var responseObj=JSON.parse(response);
            console.log(responseObj);
            if(responseObj.rc==0){
              console.log(responseObj.msg);
            }else{
              console.log(responseObj.msg);
            }
          }
        });
      });
      $("#d_submit").click(function(){
        if($("#d_employee_id").text()!=""){
          $.ajax({
            type:"POST",
            url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=d_employee',
            data:{
              d_id:$("#d_value").val()
            },
            success:function(response){
              var responseObj = JSON.parse(response);
              console.log(responseObj);
              if(responseObj.rc==0){
                location.reload();
              }
            }
          });
        }else{
          console.log("选择不能为空");
        }
        
      });
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
              var responseObj=JSON.parse(response);
              console.log(responseObj);
              if(responseObj.rc==0){
                $(".table-style").css("display","none");
                if($("#index").text()==$("#select-input").val()){

                }else{
                  if($("#index").text()){
                    $(".e-msg p").remove();
                  }
                  $("#msg").css("visibility","initial");
                  $("#u_id").val(responseObj.data[0].id);
                  $("#u_same").val(responseObj.data[0].employee_id);
                  $("#employee_name_i").after('<p>'+responseObj.data[0].e_name+'</p>');
                  $("#employee_id_i").after('<p id="index">'+responseObj.data[0].employee_id+'</p>');
                  if(responseObj.data[0].sex==1){
                    $("#employee_sex_i").after('<p>'+"男"+'</p>');
                  }else{
                    $("#employee_sex_i").after('<p>'+"女"+'</p>');
                  }
                  $("#employee_card_i").after('<p>'+responseObj.data[0].id_card+'</p>');
                  $("#employee_birth_i").after('<p>'+responseObj.data[0].birthday+'</p>');
                  $("#employee_grade_i").after('<p>'+responseObj.data[0].e_grade+'</p');
                  $("#employee_hire_i").after('<p>'+responseObj.data[0].hire_date+'</p>');
                  $("#employee_remark_i").after('<p>'+responseObj.data[0].remarks+'</p>'); 
                }
              }else{
                alert("查询为空");
              }
            }
          })
        }
      });
      $("#c_employee").click(function(){
        $("#c_modal").modal('toggle');
      })
      $("#c_form").submit(function(e){
        $.ajax({
          type:"POST",
          url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=a_employee',
          data:$("#c_form").serialize(),
          success:function(response){
            var responseObj=JSON.parse(response);
            console.log(responseObj);
          }
        });
      });
      $("#r_show").click(function(){
        $("#e_table").slideToggle(500);
      });
      $("#msg").click(function(){
        $("#s_action").modal('toggle');
        $("#goals").val($("#index").text());
      });
      $("#u_action").click(function(){
        if($("#u_same").val()==''){
          console.log("查询参数为空");
        }else{
          $.ajax({
            type:"POST",
            url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=s_employee',
            data:{
              employee_id:$("#u_same").val()
            },
            success:function(response){
              var responseObj=JSON.parse(response);
              console.log(responseObj);
              if(responseObj.rc==0){
                $("#s_action").modal('toggle');
                $("#u_modal").modal('toggle');
                $("#u_id").val(responseObj.data[0].id);
                $("#update_name").val(responseObj.data[0].e_name);
                $("#update_birth").val(responseObj.data[0].birthday);
                $("#update_grade").val(responseObj.data[0].e_grade);
                $("#update_hire").val(responseObj.data[0].hire_date);
                $("#update_remarks").val(responseObj.data[0].remarks);
                $("#update_card").val(responseObj.data[0].id_card);
                $("#update_id").val(responseObj.data[0].employee_id);
                $("#u_same").val(responseObj.data[0].employee_id);
                if($("#update_sex1").val()==responseObj.data[0].sex){
                    $("#update_sex1").prop("checked",true);
                }else{
                    $("#update_sex2").prop("checked",true);
                }
              }else{
                alert(responseObj.meg);
              }
            }
          });
        }
      });
      $("#d_action").click(function(){
        $("#s_action").modal('toggle');
        $("#d_employee_id").text($("#goals").val())
        $("#d_value").val($("#goals").val());
        $("#d_modal").modal('toggle');
      });
      $("#sign").click(function(){
        if($("#sign_name").val()==''&&$("#sign_id").val()==''){
          $("#sign_mode").val(1);
        }
        $.ajax({
          type:"POST",
          url:"<?php echo get_site_url() ?>/api-data/?module=clock&action=s_clock",
          data:{
            mode:$("#sign_mode").val()
          },
          success:function(response){
            var responseObj=JSON.parse(response);
            console.log(responseObj);
            if(responseObj.rc==0){
              $("#sign_tbody").empty();
              $("#sign_table").css("display","block");
              console.log("查询成功");
              for(var i=0; i<responseObj.data.length;i++){
                if(responseObj.data[i].end_date=="0000-00-00 00:00:00"){
                  responseObj.data[i].end_date="未打卡";
                }
                $("#sign_tbody").append(
                  "<tr>"+"<td>"+
                  responseObj.data[i].e_name+
                  "</td><td>"+
                  responseObj.data[i].employee_id+
                  "</td><td>"+
                  responseObj.data[i].start_date+
                  "</td><td>"+
                  responseObj.data[i].end_date+
                  "</td><td>"+
                  ctime(responseObj.data[i].work_time)+
                  "</td><td>"+
                  responseObj.data[i].situation+
                  "</td></tr>")
              }
            }
          }
        });
        $("#clock_sign").modal('toggle');
      });
      $("#s_sign").click(function(){
        if($("#sign_name").val()!=''&&$("#sign_id").val()!=''){
          $("#sign_mode").val(2);
        }else{
          if($("#sign_name").val()==''&&$("#sign_id").val()==''){
          $("#sign_mode").val(1);
          }else{
            alert("请填写信息");
          }
        }
        $.ajax({
          type:"POST",
          url:'<?php echo get_site_url() ?>/api-data/?module=clock&action=s_clock',
          data:{
            r_name:$("#sign_name").val(),
            r_id:$("#sign_id").val(),
            mode:$("#sign_mode").val()
          },
          success:function(response){
            var responseObj=JSON.parse(response);
            console.log(responseObj);
            if(responseObj.rc==0){
              $("#sign_tbody").empty();
              $("#sign_table").css("display","block");
              for(var i=0; i<responseObj.data.length;i++){
                if(responseObj.data[i].end_date=="0000-00-00 00:00:00"){
                  responseObj.data[i].end_date="未打卡";
                }
                $("#sign_tbody").append(
                  "<tr>"+"<td>"+
                  responseObj.data[i].e_name+
                  "</td><td>"+
                  responseObj.data[i].employee_id+
                  "</td><td>"+
                  responseObj.data[i].start_date+
                  "</td><td>"+
                  responseObj.data[i].end_date+
                  "</td><td>"+
                  ctime(responseObj.data[i].work_time)+
                  "</td><td>"+
                  responseObj.data[i].situation+
                  "</td></tr>")
              }
            }
          }
        })
      });
      // $("#u_employee").click(function(){
      //   if($("#index").text()){
      //     $.ajax({
      //       type:"POST",
      //       url:'/api-data/?',
      //       data:{
      //         module:"employee",
      //         action:"s_employee",
      //         employee_id:$("#select-input").val()
      //       },
      //       success:function(response){
      //         $("#forms").dialog("open");
      //         var responseObj=JSON.parse(response);
      //         $("#update_name").val(responseObj.content.e_name);
      //         $("#update_birth").val(responseObj.content.birthday);
      //         $("#update_grade").val(responseObj.content.e_grade);
      //         $("#update_hire").val(responseObj.content.hire_date);
      //         $("#update_remarks").val(responseObj.content.remarks);
      //         $("#update_card").val(responseObj.content.id_card);
      //         $("#update_id").val(responseObj.content.employee_id);
      //         if($("#update_sex1").val()==responseObj.content.sex){
      //             $("#update_sex1").prop("checked",true);
      //         }else{
      //             $("#update_sex2").prop("checked",true);
      //         }
      //       }
      //     })
      //   }else{
      //     alert('员工信息不能为空');
      //   }
      // });
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
                  ctime(responseObj.data[i].clock)+
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
  </script>
  </body>
  <style>
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
      margin-top:20px;
      height:300px;
      overflow-y: scroll;
    }
    #u_employees{
      margin-right:4px;
    }
    .u_modal{
      white-space:pre;
      display:flex;
      word-break:break-all;
    }
</style>
</html>
<?php
?>
