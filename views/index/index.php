<?php include "views/header.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Home page</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <?php foreach ($this->products as $product) { ?>
                <div class="col-lg-3">
                    <h2><?php echo $product->title; ?></h2>
                    <img src="<?php echo URL . $product->image; ?>" class="img-responsive">
                    <p><?php echo mb_strimwidth($product->description, 0, 100, "..."); ?></p>
                    <a class="btn btn-default" href="<?php echo URL . "product/info/" . $product->id ?>">More info</a>
                </div>
            <?php } ?>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>