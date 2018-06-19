<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product list</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Product list
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->products as $product) { ?>
                                    <tr>
                                        <td><?php echo $product->id ?></td>
                                        <td><?php echo $product->title ?></td>
                                        <?php foreach ($this->categories as $category) {
                                            if ($category->id == $product->category_id) {
                                                echo "<td>" . $category->name . "</td>";
                                            }
                                        } ?>
                                        <td><?php echo $product->quantity ?></td>
                                        <td><?php echo $product->price ?></td>
                                        <td><a href="<?php echo URL . "product/show/" . $product->id ?>"><span
                                                        class="fa fa-search"></span></a> &nbsp; <a
                                                    href="<?php echo URL . "product/edit/" . $product->id ?>"><span
                                                        class="fa fa-edit"></span></a></td>
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