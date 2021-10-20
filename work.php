<?php
/*Template Name: work */
    global $wpdb;   
    require 'function.php'; 
?>
<!doctype html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <!-- Bootstrap -->
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
        <?php
         echo css(1,3,6,12,'employee_name_i','姓名');
         echo css(2,3,6,12,'employee_id_i','员工编号'); 
         echo css(1,3,6,12,'employee_sex_i','性别');
         echo css(2,3,6,12,'employee_card_i','身份证');
         echo css(2,3,6,12,'employee_birth_i','出生日期');
         echo css(1,3,6,12,'employee_grade_i','等级');
         echo css(2,3,6,12,'employee_hire_i','入职时间');
         echo css(1,3,6,12,'employee_remark_i','备注');
        ?>
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
                <label>姓名:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" id="update_name" name="e_name" placeholder="姓名" autofocus="autofocus"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <label>员工编号:</label>&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" id="update_id" name="employee_id" placeholder="员工编号"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
                <label style="margin-right:15px;">性别:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                  <label>身份证:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="text" class="form-control" id="update_card" name="id_card" placeholder="身份证"  required="required">
                </div>  
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>出生日期:</label>&nbsp;&nbsp;&nbsp;
                  <input type="date" class="form-control" id="update_birth" name="birthday" placeholder="出生日期"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12"> 
                  <label>等级:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="number" class="form-control" id="update_grade" name="e_grade" placeholder="等级"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>入职时间:</label>&nbsp;&nbsp;&nbsp;
                  <input type="date" class="form-control" id="update_hire" name="hire_date" placeholder="入职时间"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                &nbsp;&nbsp;<label>备注:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                <label>姓名:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" id="add_name" name="e_name" placeholder="姓名" autofocus="autofocus"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <label>员工编号:</label>&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" id="add_id" name="employee_id" placeholder="员工编号"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
                <label style="margin-right:15px;">性别:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                  <label>身份证:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="text" class="form-control" id="add_card" name="id_card" placeholder="身份证"  required="required">
                </div>  
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>出生日期:</label>&nbsp;&nbsp;&nbsp;
                  <input type="date" class="form-control" id="add_birth" name="birthday" placeholder="出生日期"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12"> 
                  <label>等级:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="number" class="form-control" id="add_grade" name="e_grade" placeholder="等级"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <label>入职时间:</label>&nbsp;&nbsp;&nbsp;
                  <input type="date" class="form-control" id="add_hire" name="hire_date" placeholder="入职时间"  required="required">
                </div>
                <div class="form-group  e-msg col-lg-4 col-md-6 col-sm-12 col-xs-12">
                &nbsp;&nbsp;<label>备注:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
      <div class="col-md-offset-1 col-xs-offset-1 col-lg-offset-3">
        <?php
        echo b_css(2,3,6,6,'c_employee','添&nbsp;&nbsp;&nbsp;&nbsp;加','btn btn-info');
        echo b_css(2,3,6,6,'sign','打卡记录','btn btn-success');
        echo b_css(2,3,6,6,'sign_enter','打卡入口','btn btn-success');
        echo b_css(2,3,6,6,'r_show','显示/折叠列表','btn btn-default');
        ?>
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
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
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
  function read(){
    $.ajax({
        type:"POST",
        url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=r_employee',
        success:function(response){
          var Obj=JSON.parse(response);
          if(Obj.rc==0){
            for(var i=0; i<Obj.data.length;i++){
                var erdata=Obj.data[i];
              if(erdata.sex==1){
                var e_sex="男";
              }else{
                e_sex="女";
              }
              $("#table_select").append(
                "<tr>"+"<td>"+
                erdata.e_name+
                "</td><td>"+
                erdata.employee_id+
                "</td><td>"+      
                e_sex+
                "</td><td>"+
                erdata.id_card+
                "</td><td>"+
                erdata.birthday+
                "</td><td>"+
                erdata.e_grade+
                "</td><td>"+
                erdata.hire_date+
                "</td><td>"+
                erdata.remarks+
                "</td><td>"+
                "<button type='button' id='u_employees' name="+erdata.employee_id+">修改</button>"+
                "<button type='button' id='d_employees' name="+erdata.employee_id+">删除</button>"+
                "<button type='button' id='csign_id' name="+erdata.employee_id+">打卡</button>"+
                "</td></tr>")
              }
              $("#table_select #u_employees").bind("click",function(){
                var id=$(this).attr("name");
                if(id!=""){
                  console.log(id);
                  $.ajax({
                    type:"POST",
                    url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=r_employee',
                    data:{
                      employee_id:id
                    },
                    success:function(response){
                      var Obj=JSON.parse(response);
                      console.log(Obj);
                      if(Obj.rc==0){
                        var erdata=Obj.data[0];
                        $("#u_modal").modal('toggle');
                        $("#u_id").val(erdata.id);
                        $("#update_name").val(erdata.e_name);
                        $("#update_birth").val(erdata.birthday);
                        $("#update_grade").val(erdata.e_grade);
                        $("#update_hire").val(erdata.hire_date);
                        $("#update_remarks").val(erdata.remarks);
                        $("#update_card").val(erdata.id_card);
                        $("#update_id").val(erdata.employee_id);
                        $("#u_same").val(erdata.employee_id);
                        if($("#update_sex1").val()==erdata.sex){
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
              $("#table_select #csign_id").bind("click",function(){
                var id=$(this).attr("name");
                $(location).prop('href','<?php echo get_site_url() ?>/sign/?eid='+id);
              });
                //ajax异步请求.
          }
        }
      });
  }
    $(function(){
      $.ajax({
        type:"POST",
        url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=r_employee',
        success:function(response){
          var Obj=JSON.parse(response);
          if(Obj.rc==0){
            for(var i=0; i<Obj.data.length;i++){
              var erdata=Obj.data[i];
              if(erdata.sex==1){
                var e_sex="男";
              }else{
                e_sex="女";
              }
              $("#table_select").append(
                "<tr>"+"<td>"+
                erdata.e_name+
                "</td><td>"+
                erdata.employee_id+
                "</td><td>"+      
                e_sex+
                "</td><td>"+
                erdata.id_card+
                "</td><td>"+
                erdata.birthday+
                "</td><td>"+
                erdata.e_grade+
                "</td><td>"+
                erdata.hire_date+
                "</td><td>"+
                erdata.remarks+
                "</td><td>"+
                "<button type='button' id='u_employees' name="+erdata.employee_id+">修改</button>"+
                "<button type='button' id='d_employees' name="+erdata.employee_id+">删除</button>"+
                "<button type='button' id='csign_id' name="+erdata.employee_id+">打卡</button>"+
                "</td></tr>")
              }
              $("#table_select #u_employees").bind("click",function(){
                var id=$(this).attr("name");
                if(id!=""){
                  console.log(id);
                  $.ajax({
                    type:"POST",
                    url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=r_employee',
                    data:{
                      employee_id:id
                    },
                    success:function(response){
                      var Obj=JSON.parse(response);
                      console.log(Obj);
                      if(Obj.rc==0){
                        var erdata=Obj.data[0];
                        $("#u_modal").modal('toggle');
                        $("#u_id").val(erdata.id);
                        $("#update_name").val(erdata.e_name);
                        $("#update_birth").val(erdata.birthday);
                        $("#update_grade").val(erdata.e_grade);
                        $("#update_hire").val(erdata.hire_date);
                        $("#update_remarks").val(erdata.remarks);
                        $("#update_card").val(erdata.id_card);
                        $("#update_id").val(erdata.employee_id);
                        $("#u_same").val(erdata.employee_id);
                        if($("#update_sex1").val()==erdata.sex){
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
              $("#table_select #csign_id").bind("click",function(){
                var id=$(this).attr("name");
                $(location).prop('href','<?php echo get_site_url() ?>/sign/?eid='+id);
              });
                //ajax异步请求.
          }
        }
      });
      $("#u_form").submit(function(e){
        e.preventDefault();
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
            var Obj=JSON.parse(response);
            console.log(Obj);
            if(Obj.rc==0){
              $("#u_modal").modal("toggle");
              $("#table_select").empty();
              read();
            }else{
              alert(Obj.msg);
            }
          }
        });
      });
      $("#d_submit").click(function(e){
        e.preventDefault();
        if($("#d_employee_id").text()!=""){
          $.ajax({
            type:"POST",
            url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=d_employee',
            data:{
              d_id:$("#d_value").val()
            },
            success:function(response){
              var Obj = JSON.parse(response);
              console.log(Obj);
              if(Obj.rc==0){
                $("#d_modal").modal("toggle");
                $("#table_select").empty();
                read();
              }else{  
                alert(Obj.msg);
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
              action:"r_employee",
              employee_id:$("#select-input").val()
            },
            success:function(response){
              var Obj=JSON.parse(response);
              console.log(Obj);
              if(Obj.rc==0){
                var erdata=Obj.data[0];
                $(".table-style").css("display","none");
                if($("#index").text()==$("#select-input").val()){

                }else{
                  if($("#index").text()){
                    $(".e-msg p").remove();
                  }
                  $("#msg").css("visibility","initial");
                  $("#u_id").val(erdata.id);
                  $("#u_same").val(erdata.employee_id);
                  $("#employee_name_i").after('<p>'+erdata.e_name+'</p>');
                  $("#employee_id_i").after('<p id="index">'+erdata.employee_id+'</p>');
                  if(erdata.sex==1){
                    $("#employee_sex_i").after('<p>'+"男"+'</p>');
                  }else{
                    $("#employee_sex_i").after('<p>'+"女"+'</p>');
                  }
                  $("#employee_card_i").after('<p>'+erdata.id_card+'</p>');
                  $("#employee_birth_i").after('<p>'+erdata.birthday+'</p>');
                  $("#employee_grade_i").after('<p>'+erdata.e_grade+'</p');
                  $("#employee_hire_i").after('<p>'+erdata.hire_date+'</p>');
                  $("#employee_remark_i").after('<p>'+erdata.remarks+'</p>'); 
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
        e.preventDefault();
        $.ajax({
          type:"POST",
          url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=c_employee',
          data:$("#c_form").serialize(),
          success:function(response){
            var Obj=JSON.parse(response);
            console.log(Obj);
            if(Obj.rc==0){
              $("#c_modal").modal("toggle");
              $("#table_select").empty();
              read();
            }else{
              alert(Obj.msg);
            }
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
            url:'<?php echo get_site_url() ?>/api-data/?module=employee&action=r_employee',
            data:{
              employee_id:$("#u_same").val()
            },
            success:function(response){
              var Obj=JSON.parse(response);
              console.log(Obj);
              if(Obj.rc==0){
                var erdata=Obj.data[0];
                $("#s_action").modal('toggle');
                $("#u_modal").modal('toggle');
                $("#u_id").val(erdata.id);
                $("#update_name").val(erdata.e_name);
                $("#update_birth").val(erdata.birthday);
                $("#update_grade").val(erdata.e_grade);
                $("#update_hire").val(erdata.hire_date);
                $("#update_remarks").val(erdata.remarks);
                $("#update_card").val(erdata.id_card);
                $("#update_id").val(erdata.employee_id);
                $("#u_same").val(erdata.employee_id);
                if($("#update_sex1").val()==erdata.sex){
                    $("#update_sex1").prop("checked",true);
                }else{
                    $("#update_sex2").prop("checked",true);
                }
              }else{
                alert(Obj.meg);
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
          url:"<?php echo get_site_url() ?>/api-data/?module=clock&action=r_clock",
          data:{
            mode:$("#sign_mode").val()
          },
          success:function(response){
            var Obj=JSON.parse(response);
            if(Obj.rc==0){
              $("#sign_tbody").empty();
              $("#sign_table").css("display","block");
              console.log("查询成功");
              for(var i=0; i<Obj.data.length;i++){
                var crdata=Obj.data[i];
                if(crdata.end_date=="0000-00-00 00:00:00"){
                  crdata.end_date="未打卡";
                } 
                if(crdata.st<=0){
                  var cmg1='';
                }else{
                  if(crdata.st>=240){
                    var cmg1="上午请假";
                  }else{
                    var cmg1="迟到"+Math.round(crdata.st)+"分钟";
                  } 
                }
                if(crdata.et>0){
                  if(crdata.et>=300){
                    var cmg2="下午请假";
                  }else{
                    var cmg2="早退"+Math.round(crdata.et)+"分钟";
                  }
                }else{
                  var cmg2='';
                }
                if(cmg1==''&&cmg2==''){
                  cmg3="正常"
                }else{
                  cmg3='';
                }
                $("#sign_tbody").append(
                  "<tr>"+"<td>"+
                  crdata.e_name+
                  "</td><td>"+
                  crdata.employee_id+
                  "</td><td>"+
                  crdata.start_date+
                  "</td><td>"+
                  crdata.end_date+
                  "</td><td>"+
                  ctime(crdata.work_time)+
                  "</td><td>"+
                  cmg1+" "+cmg2+" "+cmg3+
                  "</td></tr>")
              }
            }
          }
        });
        $("#clock_sign").modal('toggle');
      });
      $("#sign_enter").click(function(){
        $(location).prop('href','<?php echo get_site_url() ?>/sign/')
      });
      $("#s_sign").click(function(){
        if($("#sign_name").val()==''&&$("#sign_id").val()==''){
          $("#sign_mode").val(1);
        }else{
          // alert("请填写信息");
          if($("#sign_name").val()!=''&&$("#sign_id").val()!=''){
            $("#sign_mode").val(2);
          }else{
            // alert("填写信息");
            $("#sign_mode").val(1);
          }
        }
        $.ajax({
          type:"POST",
          url:'<?php echo get_site_url() ?>/api-data/?module=clock&action=r_clock',
          data:{
            r_name:$("#sign_name").val(),
            r_id:$("#sign_id").val(),
            mode:$("#sign_mode").val()
          },
          success:function(response){
            var Obj=JSON.parse(response);
            if(Obj.rc==0){
              $("#sign_tbody").empty();
              $("#sign_table").css("display","block");
              for(var i=0; i<Obj.data.length;i++){
                var crdata=Obj.data[i];
                if(crdata.end_date=="0000-00-00 00:00:00"){
                  crdata.end_date="未打卡";
                }
                if(crdata.st<=0){
                  var cmg1='';
                }else{
                  if(crdata.st>=240){
                    var cmg1="上午请假";
                  }else{
                    var cmg1="迟到"+Math.round(crdata.st)+"分钟";
                  } 
                }
                if(crdata.et>0){
                  if(crdata.et>=300){
                    var cmg2="下午请假";
                  }else{
                    var cmg2="早退"+Math.round(crdata.et)+"分钟";
                  }
                }else{
                  var cmg2='';
                }
                if(cmg1==''&&cmg2==''){
                  cmg3="正常"
                }else{
                  cmg3='';
                }
                $("#sign_tbody").append(
                  "<tr>"+"<td>"+
                  crdata.e_name+
                  "</td><td>"+
                  crdata.employee_id+
                  "</td><td>"+
                  crdata.start_date+
                  "</td><td>"+
                  crdata.end_date+
                  "</td><td>"+
                  ctime(crdata.work_time)+
                  "</td><td>"+
                  cmg1+" "+cmg2+" "+cmg3+
                  "</td></tr>")
              }
            }
          }
        })
      });

    });
  </script>
  </body>
  <style>
    .e-msg{
      display:flex;
=     word-break:break-all;
      white-space:normal;
      margin-top:10px;
    }
    .e-msg label{
      word-break:keep-all;
      align-self:center;
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
    #sign_id{
      margin-left:4px;
    }
</style>
</html>
<?php
?>
