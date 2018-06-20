<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shopping cart Update</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shopping cart update form
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" class="form-control"
                                   value="<?php if (isset($this->item)) {
                                       echo $this->item['product']->id;
                                   } ?>">
                            <div class="form-group">
                                <label>Product</label>
                                <input type="text" class="form-control"
                                       required disabled value="<?php if (isset($this->item)) {
                                    echo $this->item['product']->title;
                                } ?>">
                            </div>
                            <div class="form-group">
                                <label>Product</label>
                                <img src="<?php if (isset($this->item)) {
                                    echo URL . $this->item['product']->image;
                                } ?>" class="img-responsive" width="250">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" min="0" class="form-control" name="quantity"
                                       required value="<?php if (isset($_POST['quantity'])) {
                                    echo $_POST['quantity'];
                                } else {
                                    echo $this->item['quantity'];
                                } ?>">
                            </div>
                            <a href="<?php echo URL . "cart" ?>" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo URL . "cart/delete/" . $this->item['product']->id ?>"
                               class="btn btn-danger pull-right">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>