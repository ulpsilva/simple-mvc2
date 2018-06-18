<?php if (!Session::isLogin()) { Helper::redirect(); } ?>
<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category Creation</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Category list
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->categories as $category) { ?>
                                    <tr>
                                        <td><?php echo $category->id ?></td>
                                        <td><?php echo $category->name ?></td>
                                        <td><a href="<?php echo URL . "category/show/" . $category->id ?>"><span class="fa fa-search"></span></a> &nbsp; <a href="<?php echo URL . "category/edit/" . $category->id ?>"><span class="fa fa-edit"></span></a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>