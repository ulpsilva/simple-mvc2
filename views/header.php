<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL . "public/vendor/bootstrap/css/bootstrap.min.css" ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL . "public/vendor/metisMenu/metisMenu.min.css" ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL . "public/dist/css/sb-admin-2.css" ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo URL . "public/vendor/morrisjs/morris.css" ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo URL . "public/vendor/font-awesome/css/font-awesome.min.css" ?>" rel="stylesheet"
          type="text/css">

    <!-- Custom CSS -->
    <link href="<?php echo URL . "public/dist/css/custom.css" ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL ?>">SB Admin v2.0</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->

            <?php if (Session::isLogin()) { ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo URL . "user/logout" ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            <?php } else { ?>
            <li><a href="<?php echo URL . "user/register" ?>"><i class="fa fa-user-plus fa-fw"></i> Register</a>
            <li><a href="<?php echo URL . "user/login" ?>"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                <?php } ?>
                <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo URL ?>"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <?php if (Session::isLogin()) { ?>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                <li>
                                    <a href="<?php echo URL . "category" ?>">Category list</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL . "category/new" ?>">New category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i> Article<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                <li>
                                    <a href="<?php echo URL . "article" ?>">Article list</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL . "article/new" ?>">New article</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>