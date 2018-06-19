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
            <?php foreach ($this->articles as $article) { ?>
                <div class="col-lg-12">
                    <h2><?php echo $article->title; ?></h2>
                    <p><?php echo $article->content; ?></p>
                </div>
            <?php } ?>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>