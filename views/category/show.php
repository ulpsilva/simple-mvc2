<?php if (!Session::isLogin()) { Helper::redirect(); } ?>
<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category Show</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Category
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" class="form-control" disabled value="<?php if (isset($this->category)) {echo $this->category->id;} ?>">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" disabled value="<?php if (isset($this->category)) {echo $this->category->name;} ?>">
                            </div>
                            <a href="<?php echo URL . "category" ?>" class="btn btn-default">Back</a>
                            <a href="<?php echo URL . "category/delete/". $this->category->id  ?>" class="btn btn-danger pull-right">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>