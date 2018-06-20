<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shopping cart list</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shopping cart list
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->items as $id => $item) { ?>
                                    <tr>
                                        <td><img src="<?php echo URL . $item['product']->image ?>" width="100"
                                                 class="img-responsive"/></td>
                                        <td><?php echo $item['product']->title ?></td>
                                        <td><?php echo $item['quantity'] ?></td>
                                        <td>$ <?php echo $item['product']->price ?></td>
                                        <td>$ <?php echo number_format((float)$item['price'], 2, '.', '') ?></td>
                                        <td><a href="<?php echo URL . "cart/edit/" . $id ?>"><span
                                                        class="fa fa-edit"></span></a> &nbsp; <a
                                                    href="<?php echo URL . "cart/delete/" . $id ?>"><span
                                                        class="fa fa-trash-o"></span></a></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>$ <?php echo number_format((float)$this->total, 2, '.', '') ?></td>
                                    <td></td>
                                </tr>
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