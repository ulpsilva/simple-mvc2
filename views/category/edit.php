<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category Update</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Category update form
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <input type="hidden" name="id" class="form-control"
                                   value="<?php if (isset($this->category)) {
                                       echo $this->category->id;
                                   } ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter category name"
                                       required value="<?php if (isset($this->category)) {
                                    echo $this->category->name;
                                } ?>">
                            </div>
                            <a href="<?php echo URL . "category" ?>" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo URL . "category/delete/" . $this->category->id ?>"
                               class="btn btn-danger pull-right">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>