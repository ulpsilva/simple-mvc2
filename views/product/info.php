<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $this->product->title; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-5">
                <img src="<?php echo URL . $this->product->image; ?>" class="img-responsive">
            </div>
            <div class="col-lg-7">
                <h4>Description</h4>
                <p><?php echo $this->product->description ?></p>
                <br>
                <h4>Price $ <?php echo $this->product->price ?></h4>
                <p><?php echo $this->product->quantity ?> item(s) available</p>
                <br>
                <form role="form" method="post">
                    <h4>Order</h4>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="hidden" name="id" value="<?php echo $this->product->id ?>">
                            <input type="number" name="quantity" class="form-control" placeholder="Enter quantity"
                                   min="1"
                                   required value="<?php if (isset($_POST['quantity'])) {
                                echo $_POST['quantity'];
                            } else {
                                echo "1";
                            } ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>