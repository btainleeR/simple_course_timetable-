<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>课程管理后台</title>
    <link rel="stylesheet" href="/Public/css/bootstrap.css">
    <link href="/Public/admin/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/admin/css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="/Public/admin/css/admin.css" rel="stylesheet">
    <script src="/Public/admin/css/vendor/jquery/jquery.min.js"></script>
    <script src="/Public/admin/css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="fixed-nav sticky-footer " id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">课程信息管理系统</a>
    <small>欢迎你，管理员。</small>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="index.html">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li> -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo U('/Admin/Subject/index');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">专业管理</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo U('/Admin/Myclass/index');;?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">班级管理</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#student" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">学生信息管理</span>
                </a>
                <ul class="sidenav-second-level collapse" id="student">
                    <li>
                        <a href="<?php echo U('/Admin/Student/add');?>">新增学生信息</a>
                    </li>
                    <li>
                        <a href="<?php echo U('/Admin/Student/index');?>">查找&&修改学生信息</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#teacher" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">教师信息管理</span>
                </a>
                <ul class="sidenav-second-level collapse" id="teacher">
                    <li>
                        <a href="<?php echo U('/Admin/Teacher/add');?>">添加老师信息</a>
                    </li>
                    <li>
                        <a href="<?php echo U('/Admin/Teacher/index');?>">查询&&修改老师信息</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#lesson" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">课程信息管理</span>
                </a>
                <ul class="sidenav-second-level collapse" id="lesson">
                    <li>
                        <a href="<?php echo U('/Admin/Lesson/index');?>">查看&&编辑班级课表</a>
                    </li>
                    <li>
                        <a href="<?php echo U('/Admin/Lesson/teacher');?>">查看老师课表</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-link"></i>
                    <span class="nav-link-text">Link</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="<?php echo loginOut();;?>">
                    <i class="fa fa-fw fa-sign-out"></i>安全退出</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="content-wrapper">
        <div class="container">
            <div class="page-header">
                <h1>教师信息管理</h1>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <table class="table table-bordered table hover text-center">
                        <tr>
                            <th>姓名</th>
                            <th>教工号</th>
                            <th>性别</th>
                            <th>职称</th>
                            <th>职务</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($teacherinfo)): foreach($teacherinfo as $key=>$vo): ?><tr id="tr<?php echo ($vo["id"]); ?>">
                                <td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["number"]); ?></td>
                                <td><?php echo (getSexButtonByVal($vo["sex"])); ?></td>
                                <td>
                                    <?php echo (getZhichengButton($vo["zhicheng"])); ?>
                                </td>
                                <td><?php echo ($vo["job"]); ?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="javascript:modify(<?php echo ($vo["id"]); ?>)"><span class="glyphicon glyphicon-pencil"></span>修改</button>
                                    <button class="btn btn-danger" onclick="javascript:idelete(<?php echo ($vo["id"]); ?>)"><span class="glyphicon glyphicon-trash"></span>删除</button>
                                </td>
                            </tr><?php endforeach; endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        //ajax 删除老师信息
        function idelete(id){
            $.ajax({
                type: "POST",
                data: {
                    id:id,
                },
                url: "/Admin/Teacher/ajax_deleteTeacher",
                success: function (data) {
                    if(data.error == 0){
                        $('#tr'+id).fadeOut('slow');
                    }else {
                        alert(data.msg);
                    }
                }
            });
        }

        //修改按钮
        function modify(id) {
            window.location = "/Admin/Teacher/edit/id/"+id;
        }
    </script>

</body>
</html>