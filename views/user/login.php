
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
    <link href="<?php echo URL . "public/dist/css/sb-admin-2.css"?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo URL . "public/vendor/morrisjs/morris.css"?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo URL . "public/vendor/font-awesome/css/font-awesome.min.css"?>" rel="stylesheet" type="text/css">

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

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?php if (isset($this->error)) {?>
                        <div class="alert alert-danger">
                            <?php echo $this->error ?>
                        </div>
                    <?php } ?>
                    <?php if (Session::checkFlash("success")) {?>
                        <div class="alert alert-success">
                            <?php echo Session::getFlash("success") ?>
                        </div>
                    <?php } ?>
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus required value="<?php if (isset($_POST['username'])) {echo $_POST['username'];} ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo URL . "public/vendor/jquery/jquery.min.js"?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo URL . "public/vendor/bootstrap/js/bootstrap.min.js"?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo URL . "public/vendor/metisMenu/metisMenu.min.js"?>"></script>

<!-- jQuery validation Plugin -->
<script src="<?php echo URL . "public/vendor/jquery-validation/jquery.validate.min.js"?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo URL . "public/dist/js/sb-admin-2.js"?>"></script>

<!-- Custom JavaScript -->
<script src="<?php echo URL . "public/dist/js/custom.js"?>"></script>

</body>

</html>
