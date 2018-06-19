<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Show</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Product
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" class="form-control" disabled
                                       value="<?php if (isset($this->product)) {
                                           echo $this->product->id;
                                       } ?>">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" disabled
                                       value="<?php if (isset($this->product)) {
                                           echo $this->product->title;
                                       } ?>">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <?php foreach ($this->categories as $category) {
                                    if ($category->id == $this->product->category_id) {
                                        echo "<input type='text' class='form-control' disabled
                                       value='$category->name'>";
                                    }
                                } ?>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="editor1" rows="5" disabled class="form-control"
                                ><?php if (isset($this->product)) {
                                        echo $this->product->description;
                                    } ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" disabled
                                       value="<?php if (isset($this->product)) {
                                           echo $this->product->quantity;
                                       } ?>">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" disabled
                                       value="<?php if (isset($this->product)) {
                                           echo $this->product->price;
                                       } ?>">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" disabled
                                       value="<?php if (isset($this->product)) {
                                           echo $this->product->image;
                                       } ?>">
                            </div>
                            <a href="<?php echo URL . "product" ?>" class="btn btn-default">Back</a>
                            <a href="<?php echo URL . "product/delete/" . $this->product->id ?>"
                               class="btn btn-danger pull-right">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>